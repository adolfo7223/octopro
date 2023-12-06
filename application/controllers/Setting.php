<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('setting_model');
        $this->load->model('email_model');
        $this->load->helper('site');
        require_once('vendor/autoload.php');
    }

    public function edit_settings() {
        $id = 1;

        $email = $this->input->post('default_email');
        $email_api_key = $this->input->post('email_api_key');
        $sms = $this->input->post('default_phone');
        $sms_api_key = $this->input->post('phone_api_key');

        $settings_data = array(
            'default_email' => $email,
            'email_api_key' => $email_api_key,
            'default_sms' => $sms,
            'sms_api_key' => $sms_api_key,
        );

        $check_settings = $this->setting_model->check_settings_by_id($id);

        if (!empty($check_settings)) {
            $this->setting_model->update_settings($id, $settings_data);
        } else {
            $this->setting_model->insert_settings($settings_data);
        }
        
        redirect('setting');
    }

    public function index() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $data['settings'] = $this->setting_model->get_settings();

        $this->load->view('layouts/header');
        $this->load->view('settings/index', $data);
    }

}
