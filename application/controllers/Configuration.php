<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('configuration_model');
        $this->load->model('email_model');
        $this->load->helper('site');
        $this->load->library('parser');
        require_once('vendor/autoload.php');
    }

    public function email_configuration() {
        // $email_config = $this->configuration_model->configure_auto_email_by_id(1);
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $data['email_templates'] = $this->configuration_model->get_email_templates();

        // $data_to_be_parse = array(
        //     'email' => 'sample@mailinator.com',
        //     'id' => '5',
        //     'review_link' => base_url('page/rating'),
        // );

        // $email_message_parsed = $this->parser->parse_string($email_config->message, $data_to_be_parse);

        $this->load->view('layouts/header');
        $this->load->view('configuration/email_configuration', $data);
    }

    public function sms_configuration() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $data['sms_templates'] = $this->configuration_model->get_sms_templates();

        $this->load->view('layouts/header');
        $this->load->view('configuration/sms_configuration', $data);
    }

    public function add_rating_template() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $description = $this->input->post('description');

        $data = array(
            'description' => $description
        );

        $this->configuration_model->insert_rating_template($data);

        redirect('configuration/rating_list');
    }

    public function add_email_template() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $id = $this->input->post('id');
        $message = $this->input->post('message');

        $data = array(
            'message' => $message
        );

        $this->configuration_model->insert_email_template($data, $id);

        redirect('configuration/email_configuration');
    }

    public function add_sms_template() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $id = $this->input->post('id');
        $message = $this->input->post('message');

        $data = array(
            'message' => $message
        );

        $this->configuration_model->insert_sms_template($data, $id);

        redirect('configuration/sms_configuration');
    }

    public function update_email_template() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $id = $this->input->post('id');
        $message = $this->input->post('message');

        $data = array(
            'message' => $message
        );

        $result = $this->configuration_model->update_email_template($data, $id);

        redirect('configuration/email_configuration');
    }

    public function update_sms_template() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $id = $this->input->post('id');
        $message = $this->input->post('message');

        $data = array(
            'message' => $message
        );

        $result = $this->configuration_model->update_sms_template($data, $id);

        redirect('configuration/sms_configuration');
    }

    public function delete_email_process() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $id = $this->input->get('id');

        $this->configuration_model->delete_email_configuration($id);

        redirect('configuration/email_configuration');
    }

    public function delete_sms_process() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $id = $this->input->get('id');

        $this->configuration_model->delete_sms_configuration($id);

        redirect('configuration/sms_configuration');
    }

    public function delete_customer() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $id = $this->input->get('id');

        $this->configuration_model->delete_customer($id);

        redirect('configuration/customer_list');
    }

    public function delete_referred_customer() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $id = $this->input->get('id');

        $this->configuration_model->delete_referred_customer($id);

        redirect('page/list_of_refer');
    }

    public function delete_rating() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $id = $this->input->get('id');

        $this->configuration_model->delete_rating($id);

        redirect('configuration/rating_list');
    }

    public function update_rating_template() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $id = $this->input->post('id');
        $description = $this->input->post('description');

        $data = array(
            'description' => $description
        );

        $result = $this->configuration_model->update_rating_template($data, $id);

        redirect('configuration/rating_list');
    }

    public function customer_list() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $data['customer_lists'] = $this->email_model->get_customer_list();

        $this->load->view('layouts/header');
        $this->load->view('configuration/customer_list', $data);
    }

    public function rating_list() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $data['rating_lists'] = $this->configuration_model->get_rating_list();

        $this->load->view('layouts/header');
        $this->load->view('configuration/rating_list', $data);
    }

    public function get_email_configuration_by_id() {
        $id = $this->input->get('id');
        $email_template = $this->configuration_model->get_email_template_by_id($id);

        echo json_encode($email_template);
    }

    public function get_sms_configuration_by_id() {
        $id = $this->input->get('id');
        $sms_template = $this->configuration_model->get_sms_template_by_id($id);

        echo json_encode($sms_template);
    }

    public function get_customer_details() {
        $id = $this->input->get('id');

        $customer_details = $this->email_model->get_customer_details_by_id($id);

        echo json_encode($customer_details);
    }

    public function get_rating_configuration_by_id() {
        $id = $this->input->get('id');
        $rating_template = $this->configuration_model->get_rating_template_by_id($id);

        echo json_encode($rating_template);
    }
}
