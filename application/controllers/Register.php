<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('encrypt');
        $this->load->model('register_model');
    }

    function index(){
        $this->load->view('templates/header'); 
        $this->load->view('register'); 
        $this->load->view('templates/footer'); 
    }

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
      }

    function validation(){
        //  $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
         $this->form_validation->set_rules('f_name', 'First Name', 'required');
         $this->form_validation->set_rules('l_name', 'Last Name', 'required|trim');
         $this->form_validation->set_rules('email','Email Address','required|trim|valid_email|is_unique[members.email]');
         $this->form_validation->set_rules('password', 'Password', 'required');
         $this->form_validation->set_rules('mobnumber', 'Mobile Number', 'required|min_length[10]|max_length[10]');
         $this->form_validation->set_rules('altmobnumber', 'Alternate Mobile Number', 'min_length[10]|max_length[10]');
         $this->form_validation->set_rules('address', 'Address', 'required');

         if($this->form_validation->run()){
                $register_data = array(
                    'f_name' => $this->input->post('f_name'),
                    'l_name' => $this->input->post('l_name'),
                    'email' => $this->input->post('email'),
                    'password' => sha1($this->input->post('password')),
                    'address' => $this->input->post('address'),
                );
                $phone_register = array('mobnumber','altmobnumber');
                $memb_ID = $this->register_model->insert($register_data);
                if($memb_ID!=false){
                    for($i=0; $i<2; $i++){
                        if($this->input->post($phone_register[$i])!=NULL){
                            $this->register_model->insertnumber(array('memb_ID'=>$memb_ID, 'Number'=>$this->input->post($phone_register[$i])));
                        }
                    }
                }
                redirect('login');
            }else{
             $this->index();
            }
    }

    
    
    // function otp(){
    //     $this->load->view('templates/header'); 
    //     $this->load->view('otp');
    //     $this->load->view('templates/footer');
    // }

    // function send_otp(){
    //     $otp = rand(1000, 9999);
    //     $this->session->set_userdata('otp', $otp);
    //     $mobnumber = $this->session->userdata('mobnumber');
    //     $url="http://pointsms.in/API/sms.php";
    //     $message = urlencode("Your OTP for school climate research is :".$otp);// urlencode your message
    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, "username=iimtat&password=iim1234&from=IIMAHD&to=$mobnumber&msg=$message&type=1&dnd_check=0");// post data
    //     // query parameter values must be given without squarebrackets.
    //     // Optional Authentication:
    //     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //     curl_setopt($curl, CURLOPT_URL, $url);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //     $result = curl_exec($curl);
    //     curl_close($curl);
    //     return $mobnumber;
    // }

    // function verify_otp(){
    //     if($this->input->post('otp')==$this->session->userdata('otp')){
    //             redirect('register/password');
    //     }else{
    //         $this->session->set_flashdata('message', 'Wrong OTP');
    //         $this->load->view('templates/header'); 
    //         $this->load->view('otp');
    //         $this->load->view('templates/footer'); 
    //     }
    // }

    // function password(){
    //     $this->load->view('templates/header'); 
    //     $this->load->view('password');
    //     $this->load->view('templates/footer'); 
    // }

    // function set_password(){
    //     $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    //     if($this->form_validation->run()){
    //         if($this->input->post('password') == $this->input->post('con_password')){
    //            // $encrypted_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    //             $data = array(
    //                  'school_code' =>$this->session->userdata('school_code'),
    //                  'teacher_code' =>$this->session->userdata('teacher_code'),
    //                  'mobnumber' => $this->session->userdata('mobnumber'),
    //                  'password' => $this->input->post('password')
    //              );
    
    //              $this->register_model->insert($data);
    //              $this->session->sess_destroy();
    //              redirect('login');
    //         }else{
    //             $this->session->set_flashdata('password', 'Passwords do not match. Enter again');
    //             redirect('register/password');
    //         }
    //     }else{
    //         $this->password();
    //     }
        
    // }

}