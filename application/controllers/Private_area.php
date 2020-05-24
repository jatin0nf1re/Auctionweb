<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Private_area extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('school_code')){
            redirect(login);
        }
        $this->load->model('consent_model');
        $this->load->model('register_model');
    }

    function index(){
        if($this->session->userdata('filled_details')==FALSE && $this->session->userdata('has_agreed')==TRUE){
            $this->load->view('templates/header');
            $this->load->view('school_details');
            $this->load->view('templates/footer');
        }elseif($this->session->userdata('has_agreed')==FALSE){
            $this->load->view('templates/header');
            $this->load->view('consent');
            $this->load->view('templates/footer');
        }else{
            $data['schoolname'] = $this->consent_model->fetch_name($this->session->userdata('school_code'));
            $this->load->view('templates/header');
            $this->load->view('report', $data);
            $this->load->view('templates/footer');
        }
    }

    function hasAgreed(){
        $this->consent_model->hasagreed($this->session->userdata('school_code'));
        $this->register_model->create_school_table($this->session->userdata('school_code'));
        $this->register_model->create_state_table('gujrat');
        $this->load->view('templates/header');
        $this->load->view('school_details');
        $this->load->view('templates/footer');
    }

    function insert_school_details(){
        $this->register_model->create_district_table($this->input->post('school_district'));
        $this->register_model->insert_school_to_district($this->input->post('school_district'), $this->session->userdata('school_code'));
        $data = array(
            'filled_details' => TRUE,
            'school_name' => $this->input->post('school_name'),
            'teacher_strength' => $this->input->post('teacher-strength'),
            'school_district' => $this->input->post('school_district'),
            'school_town' => $this->input->post('school_town'),
            'gender' => $this->input->post('gender'),
            'caste' => $this->input->post('caste'),
            'religion' => $this->input->post('religion'),
            'teaching_experience' => $this->input->post('teaching_experience'),
            'principal_age' => $this->input->post('principal_age')
        );
        $this->consent_model->insertschooldetails($this->session->userdata('school_code'), $data);
        $mobnumber['last_four'] = substr($this->send_sms(),6);
        $this->load->view('templates/header');
        $this->load->view('sms_sent', $mobnumber);
        $this->load->view('templates/footer');
    }

    function send_sms(){
    //post
    $mobnumber = $this->consent_model->fetch_mobnumber($this->session->userdata('school_code'));
    $url="http://pointsms.in/API/sms.php";
    $message = urlencode("You have successfully completed the registration process. We have provided you with the link to be distributed to teachers below - https://iima.au1.qualtrics.com/jfe/form/SV_9TRSDCck4uA6GVf?sc=".$this->session->userdata('code'));// urlencode your message
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
    curl_setopt($curl, CURLOPT_POSTFIELDS, "username=iimtat&password=iim1234&from=IIMAHD&to=$mobnumber&msg=$message&type=1&dnd_check=0");// post data
    // query parameter values must be given without squarebrackets.
    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    return $mobnumber;
    // echo $result;
    }

    function logout(){
        $data = $this->session->all_userdata();
        foreach($data as $row => $rows_value){
            $this->session->unset_userdata($row);
        }
        redirect('login');
    }
}