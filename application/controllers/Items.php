<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('item_model');
    }

    function index(){
        if($this->session->userdata('memb_ID')){
            $data['categories'] = $this->item_model->getAllCategory();
            $data['items'] = $this->item_model->getAllItems();
            $this->load->view('templates/header');
            $this->load->view('items',$data);
            $this->load->view('templates/footer');
        }else{
            redirect('');   
        }
        
    }

}