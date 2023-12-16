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
    $kategori = $this->input->post('kategoriParent');
    $persentase = $this->input->post('persentase');

    // Menghitung total persentase yang sudah ada
    $totalPersentase = $this->M_parent->getTotalPersentase($id_user);

    // Memeriksa apakah total persentase setelah tambahan akan melebihi 100%
    if ($totalPersentase + $persentase > 100) {
        // Jika melebihi, tampilkan pesan kesalahan atau lakukan tindakan yang sesuai
        $error_message = "Total persentase kategori_parent melebihi 100%";
        // Tampilkan pesan kesalahan ke view atau lakukan redirect
        redirect('parentkat/index/error/' . $error_message);
    } else {
        $data = [
            'id_user' => $id_user,
            'kategori_parent' => $kategori,
            'persentase' => $persentase
        ];
        $this->M_parent->insert($data);
        redirect('parentkat/index');
    }
}    
}