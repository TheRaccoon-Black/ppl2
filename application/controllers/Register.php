<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

   function __construct(){
       parent::__construct();
       $this->load->library(array('form_validation'));
       $this->load->helper(array('url','form'));
       $this->load->model('m_login'); 
       $this->load->model('M_parent');
   }

   public function index() {

       $this->form_validation->set_rules('name', 'NAME','required');
       $this->form_validation->set_rules('username', 'USERNAME','required');
       $this->form_validation->set_rules('email','EMAIL','required|valid_email');
       $this->form_validation->set_rules('password','PASSWORD','required');
       $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password]');
       if($this->form_validation->run() == FALSE) {
           $this->load->view('login/v_register');
       }else{

           $data['nama']   =    $this->input->post('name');
           $data['username'] =    $this->input->post('username');
           $data['email']  =    $this->input->post('email');
           $data['password'] =    md5($this->input->post('password'));

           $this->m_login->daftar($data);
           $id_user = $this->db->insert_id();
           $kategori = [
            'id_user' => $id_user,
            'kategori_parent'=> "pemasukkan",
            'persentase' => 0,
        ];
            $this->M_parent->insert($kategori,"kategori_parent");

           $pesan['message'] =    "Pendaftaran berhasil";

           $this->load->view('login/v_login',$pesan);
       }
   }
}