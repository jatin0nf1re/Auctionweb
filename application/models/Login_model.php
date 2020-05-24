<?php
class Login_model extends CI_Model{

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
      }

    function getNum($memb_ID){
        $this->db->where($memb_ID);
        $query = $this->db->get('PhoneNumbers');
        $phoneNumbers = array();
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                array_push($phoneNumbers, $row->Number);
            }
            return $phoneNumbers;
        }else{
            return 'No Number ';
        }
    }

    function can_login($email, $password){

        $this->db->where('email',$email);
        $query = $this->db->get('members');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                // if(password_verify($password,$row->password)){
                if(sha1($password) == $row->password){
                    $login_session = array(
                        'memb_ID' => $row->memb_ID,
                        'email' => $row->email,
                        'f_name' => $row->f_name,
                        'l_name' => $row->l_name,
                        'address' => $row->address
                    );
                    $data = $this->session->all_userdata();
                    foreach($data as $row => $rows_value){
                        $this->session->unset_userdata($row);
                    }
                    $this->session->set_userdata($login_session);
                    $this->getNum($this->session->userdata('memb_ID'));
                    return "";
                }else{
                    return 'Wrong Password';
                }
            }
        }else{
            return 'Wrong School Code';
        }
    }

    

    // function is_registered($code){
    //     $this->db->where('school_code',$code);
    //     $query = $this->db->get('register');
    //     if($query->num_rows()>0){
    //         foreach($query->result() as $row){
    //             return $row->mobnumber;
    //         }
    //     }else{
    //         return FALSE;
    //     }
    // }

    // function update_password($school_code,$password){
    //     $this->db->where('school_code',$code);
    //     $this->db->update('register', array('password' => $password));
    // }

    
}