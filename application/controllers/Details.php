<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('item_model');
    }

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
      }

    function index(){
        if($this->session->userdata('memb_ID')){
            $this->session->set_userdata('itemID', $this->input->get('item'));
            $data['item'] = $this->item_model->getItem($this->input->get('item'));
            $data['currentBid']=$this->item_model->getCurrentBid($data['item']->currentBidder, $this->input->get('item'));
            $data['reviews'] = $this->item_model->getreviews($this->input->get('item'));
            $this->console_log($data['reviews']);
            date_default_timezone_set("Asia/Calcutta");
            $this->load->view('templates/header');
            $this->load->view('details',$data);
            $this->load->view('templates/footer');
        }else{
            redirect('');   
        }
        
    }



    function validation(){
        $this->form_validation->set_rules('rating', 'Rating', 'required');

        if($this->form_validation->run()){
            $review = array(
                'rating' => $this->input->post('rating'),
                'comment' => $this->input->post('comment'),
                'memb_ID' => $this->session->userdata('memb_ID'),
                'itemID' => $this->input->get('item')
            );
            $this->item_model->addreview($review);
            //$this->console_log($review);
            redirect(base_url()."details?item=".$this->session->userdata('itemID'));
        }else{
         $this->index();
        }
    }

    function placeBid(){
        $this->form_validation->set_rules('bidAmount', 'Bid Amount', 'required');
        date_default_timezone_set("Asia/Calcutta");
        if($this->form_validation->run()){
            if($this->input->post('bidAmount')>=$this->input->get('startPrice') && $this->input->post('bidAmount')>$this->input->get('currentBid')){
                $bid = array(
                    'itemID' => $this->input->get('item'),
                    'memb_ID' => $this->session->userdata('memb_ID'),
                    'BidTime' => date("Y-m-d H:i:s"),
                    'price' => $this->input->post('bidAmount')
                );
                $this->item_model->placeBid($bid, $this->input->get('currentBidder'));
            }else{
                $this->session->set_flashdata('message', 'Enter correct Amount');
            }
            //$this->console_log($review);
            redirect(base_url()."details?item=".$this->session->userdata('itemID'));
        }else{
         $this->index();
        }
    }

}
?>