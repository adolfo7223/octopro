<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reward extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('reward_model');
        $this->load->model('email_model');
        $this->load->helper('site');
        require_once('vendor/autoload.php');
    }

    public function index() {
        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $data['client_rewards'] = $this->reward_model->get_client_rewards();

        $this->load->view('layouts/header');
        $this->load->view('reward/clients_reward_list', $data);
    }

    public function add_new() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $client = $this->input->post('client');
        $code = $this->input->post('code');
        $status = $this->input->post('status');

        $reward_creation_data = array(
            'name' => $name,
            'code' => $code,
            'client_id' => $client,
            'status' => $status
        );

        if (empty($id)) {
            $this->reward_model->insert_reward($reward_creation_data);
        } else {
            $this->reward_model->update_reward($id, $reward_creation_data);
        }

        redirect('reward');
    }

    public function delete() {
        $id = $this->input->get('id');

        if (!$this->ion_auth->logged_in()) {
            redirect('page/restricted');
        }

        $this->reward_model->delete_reward($id);

        redirect('reward');

    }

    public function get_reward_details_by_id() {
        $id = $this->input->get('id');

        $client_reward_details = $this->reward_model->get_client_rewards_by_id($id);

        echo json_encode($client_reward_details);
    }

}
