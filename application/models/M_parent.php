<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_parent extends CI_Model{
        public function __construct()
        {
            parent::__construct();
            $this->table = "kategori_parent";
            $this->post = $this->input->post();
        }    
         public function insert($data){
            $this->db->insert($this->table, $data);
         }
        
         function get_data_user($id = 0){
            $this->db->select("*");
            $this->db->from("kategori_parent");
           
            if($id != 0){
                $this->db->where("id_user",$id);
            }
            return $this->db->get()->result_array();
        }
        public function getTotalPersentase($id_user) {
            $this->db->select_sum('persentase');
            $this->db->where('id_user', $id_user);
            $query = $this->db->get($this->table);
            return $query->row()->persentase;
        }
        
    }
    