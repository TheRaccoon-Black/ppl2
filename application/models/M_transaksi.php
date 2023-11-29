<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_transaksi extends CI_Model{
        public function __construct()
        {
            parent::__construct();
            $this->table = "transaksi_keuangan";

            $this->post = $this->input->post();
        }    
         public function insert($data){
            $this->db->insert($this->table, $data);
         }
        
         function get_transaksi_all($id = 0){
            $this->db->select("*");
            $this->db->from($this->table);
            $this->db->join('kategori_transaksi','transaksi_keuangan.id_user=kategori_transaksi.id_user');
            if($id != 0){
                $this->db->where("id_user",$id);
            }
            return $this->db->get()->result_array();
        }
        public function get_data_pengeluaran($id = 0){
            $this->db->select("*");
            $this->db->from("kategori_transaksi");
            
            if($id != 0){
                $this->db->where("id_user", $id);
                $this->db->where("Deskripsi", "pengeluaran");
            }
        
            return $this->db->get()->result_array();
        }
        public function get_data_pemasukkan($id = 0){
            $this->db->select("*");
            $this->db->from("kategori_transaksi");
            
            if($id != 0){
                $this->db->where("id_user", $id);
                $this->db->where("Deskripsi", "pemasukkan");
            }
        
            return $this->db->get()->result_array();
        }
        function delete($id){
            $this->db->where("id_kategori",$id);
            $this->db->delete("kategori_transaksi");
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        

       
        
        
    }