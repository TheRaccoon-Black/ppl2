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
        // function input_data_user($nama, $pass,$foto=null){
        //     $data = [
        //         "nama_user"=>$nama,
        //         "pw"=>$pass,
        //         "foto"=>$foto
                
        //     ];
        //     if($this->db->insert("user",$data)){
        //         $id_user = $this->db->insert_id();
        //         return $id_user;
        //     }else{
        //         return 0;
        //     }
        // }
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