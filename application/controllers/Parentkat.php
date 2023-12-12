<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParentKat extends CI_Controller {

   public function index() {

       $this->load->model('M_parent');
       $id = $this->session->userdata('id');
       $parent = $this->M_parent->get_data_user();

       $data = [
        'kategoriPar' => $parent
       ];

       $this->load->view('templates/header');
       $this->load->view('templates/sidebar');
       $this->load->view('v_parent',$data);
       $this->load->view('templates/footer');
   }
   public function tambah(){
    $this->load->model('M_parent');
    $id_user = $this->input->post('id_user');
    $parket = $this->input->post('kategoriParent');
    $persen = $this->input->post('persentase');
    $data = [
        'id_user' => $id_user,
        'kategori_parent' => $parket,
        'persentase' => $persen
    ];
    $this->M_parent->insert($data,'kategori_parent');
    redirect('parentkat/index');
   }

   public function logout(){
       $this->simple_login->logout();
   }        
}