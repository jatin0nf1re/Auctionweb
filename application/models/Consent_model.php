<?php
class Consent_model extends CI_Model{

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    function not_yet_agreed($code){
        $this->db->where('school_code',$code);
        $query = $this->db->get('register');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                if($row->has_agreed == FALSE){
                    return TRUE;
                }else{
                    return FALSE;
                }
            }
        }else{
            return 'ERROR : School dont exist in Database';
        }
    }

    function insertschooldetails($code,$data){
        $this->db->where('school_code',$code);
        $this->db->update('register', $data);
    }

    function hasagreed($code){

        $this->db->where('school_code',$code);
        $this->db->update('register', array('has_agreed' => TRUE));
        return true;
    }

    function fetch_mobnumber($code){
        $this->db->where('school_code',$code);
        $query = $this->db->get('register');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                return $row->mobnumber;
            }
        }else{
            return 'ERROR : School dont exist in Database';
        }
    }

    function fetch_name($code){
        $this->db->where('school_code',$code);
        $query = $this->db->get('register');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                return $row->name;
            }
        }else{
            return 'ERROR : School dont exist in Database';
        }
    }
    
    function fetch_district($code){
        $this->db->where('school_code',$code);
        $query = $this->db->get('register');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                return $row->district;
            }
        }else{
            return 'ERROR : School dont exist in Database';
        }
    }
    
    
    function post_id($data){
        $this->db->insert('responseId', $data);
    }

    function post_response($data){
        $this->db->insert('response_data', $data);
        $this->db->insert('s_'.$data['school_code'], $data);
    }

    function should_post_response($code){
        $this->db->where('school_code',$code);
        $query = $this->db->get('register');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                if($row->responses < $row->teacher_strength + 5){
                    $this->db->where('code',$code);
                    $this->db->update('register', array('responses' => (int)($row->responses + 1)));
                    return true;
                }else{
                    return false;
                }
            }
        }else{
            return 'ERROR : School dont exist in Database';
        }
    }
}