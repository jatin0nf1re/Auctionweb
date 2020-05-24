<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
    }

    function index(){
            $this->load->view('templates/header');
            $this->load->view('home');
            $this->load->view('templates/footer');
    }

}