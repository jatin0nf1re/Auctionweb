<?php
    class Register_model extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->dbforge();
        }

        function insert($data){
            return $this->db->insert('members', $data) ? $this->db->insert_id() : false;
            $this->db->insert_id();
        }

        function insertnumber($data){
            $this->db->insert('PhoneNumbers', $data);
        }

    //     function if_eligible($school_code,$teacher_code){
    //         $this->db->where('school_code',$school_code);
    //         $query = $this->db->get('school_principal');
    //         if($query->num_rows()>0){
    //             foreach($query->result() as $row){
    //                 if($row->teacher_code == $teacher_code){
    //                     return "";
    //                 }else{
    //                     return 'ERROR: Teacher code not found';
    //                 }
    //             }
    //         }else{
    //             return 'ERROR: School code not found' ;
    //         }
    //     }

    //     function create_school_table($code){
    //         $fields = array(
    //             'school_code' => array(
    //                     'type' => 'VARCHAR',
    //                     'constraint' => '15',
    //                     'null' => TRUE,
    //             )
    //     );

    //     for($i=1; $i<=107; $i++){
    //         $fields['q'.$i] = array(
    //             'type' => 'VARCHAR',
    //             'constraint' => '1',
    //             'null' => TRUE,
    //         );
    //     };

    //     $this->dbforge->add_field($fields);
    //     $this->dbforge->create_table('s_'.$code, TRUE);

    //     }

    //     function create_district_table($district){
    //         $fields = array(
    //             'district' => array(
    //                     'type' => 'VARCHAR',
    //                     'constraint' => '15',
    //                     'null' => TRUE,
    //             ),
    //             'school_code' => array(
    //                 'type' => 'VARCHAR',
    //                 'constraint' => '15',
    //                 'null' => TRUE,
    //             ),
    //             'sec1_mean' => array(
    //                 'type' => 'VARCHAR',
    //                 'constraint' => '15',
    //                 'null' => TRUE,
    //             )
    //     );

    //     $this->dbforge->add_field($fields);
    //     $this->dbforge->create_table('d_'.$district, TRUE);
    //     }
        
    //     function create_state_table($state){
    //         $fields = array(
    //             'district' => array(
    //                     'type' => 'VARCHAR',
    //                     'constraint' => '15',
    //                     'null' => TRUE,
    //             ),
    //             'school_code' => array(
    //                 'type' => 'VARCHAR',
    //                 'constraint' => '15',
    //                 'null' => TRUE,
    //             ),
    //             'sec1_mean' => array(
    //                 'type' => 'VARCHAR',
    //                 'constraint' => '15',
    //                 'null' => TRUE,
    //             )
    //     );

    //     $this->dbforge->add_field($fields);
    //     $this->dbforge->create_table($state, TRUE);
    //     }

    //     function insert_school_to_district($district, $code){
    //         $data = array(
    //             'district' => $district,
    //             'school_code' => $code
    //         );

    //         $this->db->insert('d_'.$district, $data);

    //     }
    }
    
?>