<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_admin extends CI_Model{
        function get_data_user($id = 0){
            $this->db->select("*");
            $this->db->from("users");
            if($id != 0){
                $this->db->where("id_user",$id);
            }
            return $this->db->get()->result_array();
        }
        public function jumlah_pengeluaran() {

            $this->db->select('SUM(jumlah) as uangK');
            $this->db->join('kategori_transaksi', 'transaksi_keuangan.id_kategori = kategori_transaksi.id_kategori');
            $this->db->where('kategori_transaksi.Deskripsi', 'Pengeluaran');
            $query = $this->db->get('transaksi_keuangan');
    
            return $query->row()->uangK;
        }
        public function jumlah_user() {
         
            $this->db->select('count(id_user) as jumlah');
            $query = $this->db->get('users');
    
            return $query->row()->jumlah;
        }
        public function jumlah_masuk() {

            $this->db->select('SUM(jumlah) as uangM');
            $this->db->join('kategori_transaksi', 'transaksi_keuangan.id_kategori = kategori_transaksi.id_kategori');
            $this->db->where('kategori_transaksi.Deskripsi', 'Pemasukkan');
            $query = $this->db->get('transaksi_keuangan');
    
            return $query->row()->uangM;
        }
        function hapus_data_user($id){
            $this->db->where("id_user",$id);
            $this->db->delete("users");
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        // function update_data_user($id,$nama,$username,$email=null){
            function update_data_user($id,$nama,$username,$email){
            $data = array(
                "nama"=>$nama,
                "username"=>$username,
                "email"=>$email
            );
            $this->db->where("id_user",$id);
            $this->db->update("users",$data);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        
        public function cek_login($email, $password) {
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $query = $this->db->get('admin');
            return $query->row(); // Mengembalikan satu baris hasil query
        }
    }