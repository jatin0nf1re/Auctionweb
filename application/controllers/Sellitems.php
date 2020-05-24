<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sellitems extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('member_model');
        $this->load->model('item_model');
    }

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
      }

    function index(){
        if($this->session->userdata('memb_ID')){
            $this->member_model->getSellerBankAcc($this->session->userdata('memb_ID'));
            $data['categories'] = $this->item_model->getAllCategory();
            $this->console_log($data['categories']);
            $this->load->view('templates/header');
            $this->load->view('sellitems', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('');
        }
        
    }

    function validation(){
        $this->form_validation->set_rules('acc_no', 'Account Number', 'required|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('ImagePath', 'Image Path', 'required');
        $this->form_validation->set_rules('description', 'description');
        $this->form_validation->set_rules('start_time', 'Start Time', 'required');
        $this->form_validation->set_rules('end_time', 'End Time', 'required');
        $this->form_validation->set_rules('start_price', 'Start Price', 'required');


        if($this->form_validation->run()){
            $seller_data = array(
                'BankNo'=>$this->input->post('acc_no')
            );
            $this->member_model->insertAccNo($seller_data);
            $item_data = array(
                'title' => $this->input->post('title'),
                'Description' => $this->input->post('description'),
                'ImagePath' => $this->input->post('ImagePath'),
                'StartTime' => date("Y-m-d H:i:s", strtotime($this->input->post('start_time'))),
                'EndTime' => date("Y-m-d H:i:s", strtotime($this->input->post('end_time'))),
                'StartPrice'=>$this->input->post('start_price'),
                'SellerID'=>$this->session->userdata('memb_ID'),
                'categID'=>$this->input->post('category')
            );
            $this->item_model->createItem($item_data);
            redirect('dashboard');
        }else{
         $this->index();
        }
    }

}