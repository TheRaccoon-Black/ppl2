<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property M_kategori $M_kategori
 */
class Kategori extends CI_Controller {

    public function index() {
        $this->load->model('M_kategori');
        $id = $this->session->userdata('id');
        $user = $this->M_kategori->get_data_user($id);
        $keluar = $this->M_kategori->get_data_pengeluaran($id);
        $masuk = $this->M_kategori->get_data_pemasukkan($id);
        $data = [
            "kategori"=>$user,
            "keluar"=>$keluar,
            "masuk"=>$masuk
        ];
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_kategori', $data);
        $this->load->view('templates/footer');
    }
    
    function tambah(){
        $this->load->model('M_kategori');
        $id_user = $this->input->post('id_user');
        $kategori = $this->input->post('namaKategori');
        $ket = $this->input->post('Deskripsi');
 
        $data = array(
            'id_user' => $id_user,
            'namaKategori' => $kategori,
            'Deskripsi' => $ket,
            );
        $this->M_kategori->insert($data,'kategori_transaksi');
        redirect('kategori/index');
    }
    public function delete($id){
        $this->load->model("M_kategori");
    
        try {
            $result = $this->M_kategori->delete($id);
    
            if($result) {
                redirect("kategori/index");
            } else {
                $data['error_message'] = "Failed to delete the category.";
                $this->load->view('kategori/index', $data);
            }
        } catch (Exception $e) {
            $data['error_message'] = "Error: Cannot delete a category that is in use.";
            $this->load->view('kategori/index', $data);
        }
    }
    
}
