<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->helper('site');
        require_once('vendor/autoload.php');
    }

    public function index() {
        
    }
}
