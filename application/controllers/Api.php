<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('consent_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
        //$reponseId = $_GET['responseId'];
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        var_dump(json_decode($json)); 
        // $data = array(
        //     'response_id' => $reponseId
        // );
        if($this->consent_model->should_post_response($data['school_code'])){
                $this->consent_model->post_response($data);
        }
                
        //echo $data;

	}
}