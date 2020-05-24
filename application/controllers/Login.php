<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('login_model');
    }

    function index(){
        if($this->session->userdata('memb_ID')){
            redirect('dashboard');
        }else{
            $this->load->view('templates/header');
            $this->load->view('login');
            $this->load->view('templates/footer');
        }
        
    }

    function validation(){
        $this->form_validation->set_rules('email', 'Email Address', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run()){
            $result = $this->login_model->can_login($this->input->post('email'), $this->input->post('password'));
            if($result == ''){
                redirect('private_area');
            }else{
                $this->session->set_flashdata('message', $result);
                redirect('login');
            }
        }else{
            $this->index();
        }
    }

    function otp(){
        $otp = rand(1000, 9999);
        $forgot_data = array(
            'mobnumber' => $this->consent_model->fetch_mobnumber($this->session->userdata('school_code_forgot')),
            'otp' => $otp
        );
        $this->session->set_userdata($forgot_data);
        
        $this->send_otp($otp);
        $this->load->view('templates/header'); 
        $this->load->view('otp');
        $this->load->view('templates/footer');
    }

    function verify_otp(){
        if($this->input->post('otp') == $this->session->userdata('otp')){
            redirect('login/password');
        }else{
            $this->session->set_flashdata('message', 'Wrong OTP entered');
            redirect('login/otp');
        }
    }

    function password(){
        $this->load->view('templates/header'); 
        $this->load->view('password');
        $this->load->view('templates/footer'); 
    }

    function send_otp($otp){
        $mobnumber = $this->session->userdata('mobnumber');
        $url="http://pointsms.in/API/sms.php";
        $message = urlencode("Your OTP for school climate research is :".$otp);// urlencode your message
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
    }

    function forgot_password(){
        $this->load->view('templates/header');
        $this->load->view('forgot_password');
        $this->load->view('templates/footer');
    }

    function forgot_validation(){
            $is_registered = $this->login_model->is_registered($this->input->post('school_code'));
            if($is_registered){
                $this->session->set_userdata('school_code_forgot', $this->input->post('school_code'));
                redirect('login/otp');
            }else{
                $this->session->set_flashdata('registered','School Code Not Registered');
            }
        
    }

    function set_password(){
        var_dump($this->input->post());
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        if($this->form_validation->run()){
            if($this->input->post('password') == $this->input->post('con_password')){
               // $encrypted_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                 $this->login_model->update_password($this->session->userdata('school_code'),$this->input->post('password'));
                 $this->session->sess_destroy();
                 redirect('login');
            }else{
                $this->session->set_flashdata('password', 'Passwords do not match. Enter again');
                redirect('login/password');
            }
        }else{
            redirect('login/password');
        }
        
    }


}