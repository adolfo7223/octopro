<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('email_model');
        $this->load->model('referral_model');
        $this->load->model('configuration_model');
        $this->load->model('reward_model');
        $this->load->helper('site');
        $this->load->library('parser');
        require_once('vendor/autoload.php');
    }

    public function index() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        $data['total_customer'] = $this->email_model->count_customer();
        $data['total_referrals'] = $this->referral_model->count_referrals();
        $data['total_customer_responded'] = $this->email_model->count_customer_responded();

        $this->load->view('layouts/header');
		$this->load->view('page/index', $data);
    }

    public function restricted() {
        $this->load->view('layouts/header');
		$this->load->view('page/restricted');
    }

    public function rating() {
        $data['id'] = $this->input->get('id');
        
        $this->load->view('layouts/header');
		$this->load->view('page/rating', $data);
    }

    public function report() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $this->load->view('layouts/header');
		$this->load->view('page/report');
    }

    public function redirects() {
        $this->load->view('layouts/header');
		$this->load->view('page/redirects');
    }

    public function mailing() {
        $data['id'] = $this->input->get('id');

        $data['customer_details'] = $this->email_model->get_customer_details_by_id($data['id']);
        $data['rating_lists'] = $this->configuration_model->get_rating_list();

        if (!empty($data['customer_details'])) {
            if ($data['customer_details']->response_status === '1') {
                show_404();
            } else {
                $this->load->view('layouts/header');
                $this->load->view('page/mailing', $data);
            }
        } else {
            show_404();
        }
    }

    public function update_customer_response_status() {
        $id = $this->input->post('id');

        $data = array(
            'response_status' => 1
        );

        $update = $this->email_model->update_email_response_status($id, $data);

        if ($update) {
            $data['redirect'] = 'page/thank_you?id='.$id;
        } else {
            $data['redirect'] = '';
        }

        echo json_encode($data);
    }

    public function thank_you() {
        $data['id'] = $this->input->get('id');

        $this->load->view('layouts/header');
		$this->load->view('page/thank_you', $data);
    }

    public function refer() {
        $data['id'] = $this->input->get('id');

        $this->load->view('layouts/header');
		$this->load->view('page/refer', $data);
    }

    public function send_follow_up_email_view() {
        $this->load->view('layouts/header');
        $this->load->view('page/send_follow_up_email');
    }

    public function list_of_refer() {
        $data['refers'] = $this->referral_model->get_referral_details();

        $this->load->view('layouts/header');
        $this->load->view('page/referred_list', $data);
    }

    public function send_request_for_referral_and_reward_view() {
        $this->load->view('layouts/header');
        $this->load->view('page/referral_reward_request');
    }

    public function my_referral_and_reward_view() {
        $email = $this->input->get('email');
        $phone = str_replace(" ", "+", $this->input->get('phone'));

        $phone = str_replace("*", " ", $phone);
        
        if (!empty($email)) {
            $client_detail = $this->email_model->get_customer_details_by_email($email);
        } elseif(!empty($phone)) {
            $client_detail = $this->email_model->get_customer_details_by_phone($phone);
        } else {
            redirect('page/restricted');
        }

        $data['referral_lists'] = $this->referral_model->get_referral_by_reffered_by($client_detail->id);
        $data['client_rewards'] = $this->reward_model->get_client_rewards_by_client_id($client_detail->id);

        $this->load->view('layouts/header');
        $this->load->view('page/referral_reward_list', $data);
    }

    public function send_request_for_referral_and_reward() {
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');

        if (!empty($email)) {
            $check_client_exist = $this->email_model->get_customer_details_by_email($email);
            
            if (!empty($check_client_exist)) {
                $data['code'] = random_int(100000, 999999);
                $data['success'] = 'success';

                $messageprint = 'Verification Code: '.$data['code'];

                $subject = 'request verification code';

                $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

                $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
                $sendSmtpEmail['to'] = array(array('email'=>$email, 'name'=>$check_client_exist->name));
                $sendSmtpEmail['sender'] = array('email' => 'hello@octoprocoatings.com');
                $sendSmtpEmail['textContent'] = $messageprint;
                $sendSmtpEmail['subject'] = $subject;
                $sendSmtpEmail['params'] = array('name'=>'John', 'surname'=>'Doe');
                $sendSmtpEmail['headers'] = array('X-Mailin-custom'=>'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

                try {
                    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
                    $this->session->set_flashdata('verification_code', $data['code']);
                    $data['verification_code'] = $data['code'];
                } catch (Exception $e) {
                    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
                }

            } else {
                $data['error'] = 'error';
            }
        } elseif(!empty($phone)) {
            $check_client_exist = $this->email_model->get_customer_details_by_phone($phone);

            if (!empty($check_client_exist)) {
                $code = random_int(100000, 999999);
                $data['success'] = 'success';

                $messageprint = 'Verification Code: '.$code;

                $subject = 'request verification code';

                $api_token = '8cf35847444eca621d89df36e878a1a3';
                $api_url = 'https://api.callrail.com/v3/a/ACCddce8f46feb745cebf6148deef553f78/text-messages.json';

                $data = array(
                    'customer_phone_number' => $check_client_exist->phone,
                    'tracking_number' => '+19498764881',
                    'content' => $messageprint,
                    'company_id' => 'COMff0733d1250f4da197a6a2d3019b7240',
                );

                $data_string = json_encode($data);

                $ch = curl_init($api_url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization: Token token=' . $api_token,
                    'Content-Type: application/json',
                ));
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $response = curl_exec($ch);

                if (curl_errno($ch)) {
                    $sms_status = 'cURL error: ' . curl_error($ch);
                } else {
                    $data['verification_code'] = $code;
                    $sms_status = $response;
                }

                curl_close($ch);
                $data['success'] = 'success';
            } else {
                $data['error'] = 'error';
            }
        }

        echo json_encode($data);
    }

    public function validate_verification_code() {
        $data['code'] = $this->input->get('code');

        if ($data['code'] == $this->session->userdata('verification_code')) {
            $data['status'] = 'success';
        } else {
            $data['status'] = 'failed';
        }

        echo json_encode($data);
    }

    public function add_customer_email() {
        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $id = $this->input->post('id');

        if (empty($id)) {
            $data = array(
                'name' => $name,
                'email_address' => $email,
                'phone' => $phone,
                'response_status' => null,
                'review_link' => base_url('page/rating'),
                'tries' => 0
            );

            $inserted_id = $this->email_model->add_review_email($data);

            if ($inserted_id) {

                $customer_detail = $this->email_model->get_customer_details_by_id($inserted_id);

                // $email = email_sms_follow_up($customer_detail->tries, $customer_detail->email_address, $customer_detail->review_link, $customer_detail->id);

                $email_template = $this->configuration_model->get_email_template_by_steps($customer_detail->tries);

                // $this->send_sms_message($phone, null, $name);

                $message = '
                    <html>
                        <style>
                            body {
                                font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
                            }

                            * {
                                margin: 0; 
                                padding: 0;
                            }
                        
                            div#banner { 
                                position: absolute; 
                                top: 0; 
                                left: 0; 
                                width: 100%; 
                            }
                            div#banner-content { 
                                width: 800px; 
                                margin: 0 auto; 
                                padding: 10px; 
                                border: 1px solid #000;
                                text-align: center;
                            }

                            .fcc-btn {
                                background-color: #009CAD !important;
                                color: white !important;
                                padding: 15px 25px !important;
                                text-decoration: none !important;
                            }
                        </style>

                        <body style="font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif !important;">
                            <div id="banner" style="background-color: #009CAD !important;">
                                <div id="banner-content">
                                    <center><img src="https://octopro.reservethisnow.com/uploads/octopro.png" alt="Card image" width="auto" height="auto"alt="image-1"style="max-width:350px;max-height:350px"></center>
                                </div>
                            </div>

                            '. $email_template->message .'

                        </body>
                    </html>
                ';

                // $message = $message_banner . $email_template->message;
                // $message = "Leave Your Review [Review Link]";

                $admin_emain = 'hello@octoprocoatings.com';
                $site_title = 'sample title';
                $subject = $email_template->title;

                $data1 = array(
                    'email' => $customer_detail->email_address,
                    'name' => $customer_detail->name,
                    'review_link' => "<a style='background-color: #009CAD !important; color: white !important; padding: 15px 25px !important; text-decoration: none !important;' href='".base_url('page/rating')."?id=".$inserted_id."'>Octopro</a>"
                );

                $messageprint = $this->parser->parse_string($message, $data1, TRUE);

                $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

                $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
                $sendSmtpEmail['to'] = array(array('email'=>$customer_detail->email_address, 'name'=>$customer_detail->name));
                $sendSmtpEmail['sender'] = array('email' => $admin_emain);
                $sendSmtpEmail['textContent'] = $messageprint;
                $sendSmtpEmail['subject'] = $subject;
                $sendSmtpEmail['params'] = array('name'=>'John', 'surname'=>'Doe');
                $sendSmtpEmail['headers'] = array('X-Mailin-custom'=>'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

                try {
                    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);

                    $this->email_model->update_email_response_status($customer_detail->id, array('tries' => $customer_detail->tries+1));
                } catch (Exception $e) {
                    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
                }

                // $this->session->set_flashdata('success', 'Data Inserted Successfully');
                $data['success'] = 'Data Inserted Successfully';
            } else {
                // $this->session->set_flashdata('error', 'Data Insertion Failed');
                $data['error'] = 'Data Insertion Failed';
            }

            // header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            $data = array(
                'name' => $name,
                'email_address' => $email
            );

            $inserted_id = $this->email_model->update_email($data, $id);

            if ($inserted_id) {
                // $this->session->set_flashdata('success', 'Data Inserted Successfully');
                $data['success'] = 'Data Inserted Successfully';
            } else {
                // $this->session->set_flashdata('error', 'Data Insertion Failed');
                $data['error'] = 'Data Insertion Failed';
            }

            redirect('configuration/customer_list');
        }
    }

    public function get_client_details() {
        $searchTerm = $this->input->post('searchTerm');

        $response = $this->email_model->get_client_details_select_option($searchTerm);

        echo json_encode($response);
    }

    public function send_sms_message($phone, $message, $name) {
        $ch = curl_init();
        $parameters = array(
            'apikey' => 'a03b8e60866d200b88f700560e6c86f0', //Your API KEY
            'number' => $phone,
            'message' => 'I just sent my first message with Semaphore',
        );
        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );

        //Send the parameters set above with the request
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

        // Receive response from server
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);
    }

    public function send_mail_automatically() {
        $get_customer_email_to_be_follow_up = $this->email_model->to_be_send_email_follow_up();

        foreach($get_customer_email_to_be_follow_up as $customer_detail) {

            if ($customer_detail->tries <= 3) {
                $email = email_sms_follow_up($customer_detail->tries, $customer_detail->email_address, $customer_detail->review_link, $customer_detail->id);

                $message = $email[0];
                // $message = "Leave Your Review [Review Link]";

                $admin_emain = 'hello@octoprocoatings.com';
                $site_title = 'sample title';
                $subject = $email[1];

                $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

                $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
                $sendSmtpEmail['to'] = array(array('email'=>$customer_detail->email_address, 'name'=>$customer_detail->name));
                $sendSmtpEmail['sender'] = array('email' => $admin_emain);
                $sendSmtpEmail['textContent'] = $message;
                $sendSmtpEmail['subject'] = $subject;
                $sendSmtpEmail['params'] = array('name'=>'John', 'surname'=>'Doe');
                $sendSmtpEmail['headers'] = array('X-Mailin-custom'=>'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

                try {
                    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);

                    $this->email_model->update_email_response_status($customer_detail->id, array('tries' => $customer_detail->tries+1));
                } catch (Exception $e) {
                    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
                }
            }
        }
    }

    public function send_referral_email() {
        $id = $this->input->post('id');
        $email = $this->input->post('email');
    }

    public function send_referral_customer() {
        $id = $this->input->post('id');
        $referred_email = $this->input->post('email');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        
        $customer_details = $this->email_model->get_customer_details_by_id($id);

        foreach ($referred_email as $key => $value) {
            $str= rand();
            $ref_code = md5($str);

            $data = array(
                'referred_by' => $id,
                'referral_code' => $ref_code,
                'email_address' => $value,
                'name' => $name[$key],
                'phone' => $phone[$key]
            );

            $inserted_id = $this->referral_model->insert_referral($data);

            if (!empty($inserted_id)) {
                $url = base_url('page/validating_referral_code?code='.$ref_code);
                // $message = "Sample Customer invites you to checkout our service. Click this link: <a href='".$url."'>octopro</a>";
                $message = "Customer ".$name[$key]." with an email address of ".$value." and a phone number of ".$phone[$key]." is being referred by ".$customer_details->name."";
                // $message = "Leave Your Review [Review Link]";

                $receiver = 'hello@octoprocoatings.com';
                $subject = 'Referral';

                // $this->send_sms_message($phone, null, $name);

                $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

                $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
                    new GuzzleHttp\Client(),
                    $config
                );
                $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
                $sendSmtpEmail['to'] = array(array('email'=>$receiver, 'name'=>'Octopro Coating'));
                $sendSmtpEmail['sender'] = array('email' => $customer_details->email_address);
                $sendSmtpEmail['textContent'] = $message;
                $sendSmtpEmail['subject'] = $subject;
                $sendSmtpEmail['params'] = array('name'=>'John', 'surname'=>'Doe');
                $sendSmtpEmail['headers'] = array('X-Mailin-custom'=>'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

                try {
                    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
                    $data['id'] = $id;
                } catch (Exception $e) {
                    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
                }
            }

        }

        $data['result'] = $result?'success':'';

        echo json_encode($data);
    }

    public function validating_referral_code() {
        $code = $this->input->get('code');

        $this->referral_model->update_refferal_status_is_used_by_code($code);

        redirect('https://octoprocoatings.com/');
    }

    public function service_revenue() {
        $services = json_decode($this->input->post('service'), true);

        $services_name_duplicate = array_values(array_unique(array_column($services, 7)));

        $service_revenue = [];
        foreach($services_name_duplicate as $service_name_key => $service_name_value) {
            $service_revenue_amount = 0;
            foreach($services as $service_key => $service_value) {
                if (!empty($service_value[7] && !empty($service_value[10]))) {
                    if ($service_value[7] == $service_name_value) {
                        $service_value_explode = explode('$', $service_value[10]);
                        $service_value_remove_special_char = floatval(str_replace(',', '', $service_value_explode[1]));
                        $service_revenue_amount += $service_value_remove_special_char;
                    }
                }
            }
            $service_revenue[$service_name_key] = $service_revenue_amount;
        }

        // $service_revenue = [];
        // $service_key = [];
        // foreach($services as $service) {
        //     $service_price_explode = explode('$', $service[10]);
        //     if (!empty($service[7]) && !empty($service[10])) {
        //         $service_key[] = $service[7];

        //         $service_revenue[$service[7]] = floatval(str_replace(',', '', $service_price_explode[1])) + $service_revenue[$service[7]];
        //     }
        // }

        // $data['services_result'] = array_keys($services_name_duplicate);
        // $data['revenue_result'] = array_values($service_revenue);

        echo json_encode($data);
    }

    public function chart_filter() {
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $date_submitted = $this->input->post('date_submitted');
        $total_min_est = $this->input->post('total_min_est');
        $total_max_est = $this->input->post('total_max_est');
        $total_amount_sales = $this->input->post('total_amount_sales');
        $total_commission_amount = $this->input->post('total_commission_amount');
        $email = $this->input->post('email');
        $lead_stage = $this->input->post('lead_stage');

        $from_converted = strtotime($from);
        $to_converted = strtotime($to);

        //Number of Est Sched Start
            $estimate_scheduled = 0;
            $on_hold = 0;
            $job_completed = 0;
            foreach($lead_stage as $lead) {
                if ($lead == 'Estimate Scheduled') {
                    $estimate_scheduled += 1;
                }

                if ($lead == 'On Hold') {
                    $on_hold += 1;
                }

                if ($lead == 'Job Completed') {
                    $job_completed += 1;
                }
            }
        //Number of Est Sched End

        //Total Min Estimated Start
            $total_min_est_exploded = array_map(function($total_min_est) {
                $exploded_min_est = explode('$', $total_min_est);
                if (!empty($exploded_min_est[1])) {
                    $converted_value = $exploded_min_est[1];
                } else {
                    $converted_value = 0.00;
                }
                return $converted_value;
            }, $total_min_est);

            $total_min_est_exploded = array_filter($total_min_est_exploded);
        //Total Min Estimated End

        //Total Max Estimated Start
            $total_max_est_exploded = array_map(function($total_max_est) {
                $exploded_max_est = explode('$', $total_max_est);
                if (!empty($exploded_max_est[1])) {
                    $converted_value = $exploded_max_est[1];
                } else {
                    $converted_value = 0.00;
                }
                return $converted_value;
            }, $total_max_est);

            $total_max_est_exploded = array_filter($total_max_est_exploded);
        //Total Max Estimated End

        //Total Amount Sales Start
            $total_amount_sales_exploded = array_map(function($total_amount_sales) {
                $exploded_total_amount_sales = explode('$', $total_amount_sales);
                if (!empty($exploded_total_amount_sales[1])) {
                    $converted_value = $exploded_total_amount_sales[1];
                } else {
                    $converted_value = 0.00;
                }
                return $converted_value;
            }, $total_amount_sales);

            $total_amount_sales_exploded = array_filter($total_amount_sales_exploded);
        //Total Amount Sales End

        //Total Commission Start
            $total_commission_amount_exploded = array_map(function($total_commission_amount) {
                $exploded_total_commission_amount = explode('$', $total_commission_amount);
                if (!empty($exploded_total_commission_amount[1])) {
                    $converted_value = $exploded_total_commission_amount[1];
                } else {
                    $converted_value = 0.00;
                }
                return $converted_value;
            }, $total_commission_amount);

            $total_commission_amount_exploded = array_filter($total_commission_amount_exploded);
        //Total Commission End

        //Total Leads Start
            $total_leads = array_map(function($email) {
                $exploded_total_leads = $email;
                if (!empty($exploded_total_leads)) {
                    $converted_value = $exploded_total_leads;
                } else {
                    $converted_value = null;
                }
                return $converted_value;
            }, $email);

            $total_leads = array_filter($total_leads);
        //Total Leads End

        $filteredDates = array_filter($date_submitted, function ($dateString) use ($from_converted, $to_converted) {
            $timestamp = strtotime($dateString);
            return $timestamp >= $from_converted && $timestamp <= $to_converted;
        });

        $date_keys = array_keys($filteredDates);

        //Total Min Estimated Start
            $grand_total_min_est = 0;
            foreach($total_min_est_exploded as $total_min_est_key => $total_min_est_val) {
                if (in_array($total_min_est_key, $date_keys)) {
                    $grand_total_min_est += floatval(str_replace(',', '', $total_min_est_val));
                }
            }
        //Total Min Estimated End

        //Total Max Estimated Start
            $grand_total_max_est = 0;
            foreach($total_max_est_exploded as $total_max_est_key => $total_max_est_val) {
                if (in_array($total_max_est_key, $date_keys)) {
                    $grand_total_max_est += floatval(str_replace(',', '', $total_max_est_val));
                }
            }
        //Total Max Estimated End

        //Total Amount Sales Start
            $grand_total_amount_sales = 0;
            foreach($total_amount_sales_exploded as $total_amount_sales_key => $total_amount_sales_val) {
                if (in_array($total_amount_sales_key, $date_keys)) {
                    $grand_total_amount_sales += floatval(str_replace(',', '', $total_amount_sales_val));
                }
            }
        //Total Amount Sales End.

        //Total Commission Amount Start
            $grand_total_commission_amount = 0;
            foreach($total_commission_amount_exploded as $total_commission_amount_key => $total_commission_amount_val) {
                if (in_array($total_commission_amount_key, $date_keys)) {
                    $grand_total_commission_amount += floatval(str_replace(',', '', $total_commission_amount_val));
                }
            }
        //Total Commission Amount End

        //Total Commission Amount Start
            $grand_total_leads = 0;
            foreach($total_leads as $total_leads_key => $total_leads_val) {
                if (in_array($total_leads_key, $date_keys)) {
                    $grand_total_leads += 1;
                }
            }
        //Total Commission Amount End

        $data['total_min_est'] = $grand_total_min_est;
        $data['total_max_est'] = $grand_total_max_est;
        $data['total_amount_sales'] = $grand_total_amount_sales;
        $data['total_commission_amount'] = $grand_total_commission_amount;
        // $data['total_number_of_clients'] = count($email);
        $data['total_number_of_clients'] = $grand_total_leads;

        $data['estimate_scheduled'] = $estimate_scheduled;
        $data['on_hold'] = $on_hold;
        $data['job_completed'] = $job_completed;

        echo json_encode($data);
    }
}
