<?php
class Member_model extends CI_Model{

    function getNum($memb_ID){
        $this->db->where('memb_ID',$memb_ID);
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

    function getSellerBankAcc($memb_ID){
        $this->db->where('memb_ID', $memb_ID);
        $query = $this->db->get('Seller');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $this->session->set_userdata('bank_acc', $row->BankNo);
            }
        }else{
            return false;
        }
    }

    function insertAccNo($seller_data){
        $this->db->where('memb_ID', $this->session->userdata('memb_ID'));
        $query = $this->db->get('Seller');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $this->db->where('memb_ID', $this->session->userdata('memb_ID'));
                $this->db->update('Seller',$seller_data);
            }
        }else{
           $seller_data['memb_ID']=$this->session->userdata('memb_ID');
            $this->db->insert('Seller', $seller_data);
        }
    }


}
?>