<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('member_model');
        $this->load->model('item_model');
    }

    function index(){
        if($this->session->userdata('memb_ID')){
            $phoneNumbers = $this->member_model->getNum($this->session->userdata('memb_ID'));
            $data['phone_number'] = $phoneNumbers;
            $data['sellItems']= $this->item_model->getItemBySeller($this->session->userdata('memb_ID'));
            $data['bids'] = $this->item_model->getBidsBySeller($this->session->userdata('memb_ID'));
            $this->load->view('templates/header');
            $this->load->view('private',$data);
            $this->load->view('templates/footer');  
        }else{
            redirect('login');
        }
    }

    function logout(){
        $data = $this->session->all_userdata();
        foreach($data as $row => $rows_value){
            $this->session->unset_userdata($row);
        }
        redirect('login');
    }

    function pay(){
        $this->item_model->setPayStatus($this->input->get('item'));
        $this->index();
    }

}