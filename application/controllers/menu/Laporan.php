<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property M_transaksi $M_transaksi
 */
class Laporan extends CI_Controller
{
    
    public function index()
    {
        $this->load->model('M_transaksi');
        $id = $this->session->userdata('id');
        $transaksi = $this->M_transaksi->get_transaksi_all($id);
        $data = [
            "transaksi" => $transaksi,
        ];
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('lapor', $data);
        $this->load->view('templates/footer');
    }
    // public function tambah(){

    //     $this->load->model("M_transaksi");
    //     $post = $this->input->post();
    //     $id = $this->session->userdata('id');
    //     $kategori = $this->M_transaksi->get_kategori($id);
    //     if(empty($post)){

    //         $relasi = array(
    //             "kategori"=>$kategori
    //         );
    //         $this->load->view('templates/header');
    //         $this->load->view('templates/sidebar');
    //         $this->load->view("v_tambahTransaksi",$relasi);
    //         $this->load->view('templates/footer');
    //     }else{
    //         $id_user = $this->input->post("id_user");
    //         $data = [
    //             "id_user"=>$id_user,
    //         ];
    //         $this->M_transaksi->insert($data,'transaksi_keuangan');
    //         redirect("menu/laporan");
    //     }    
    // }
    public function tambah()
    {
        $this->load->model("M_transaksi");
        $post = $this->input->post();

        if (empty($post)) {
            $id_user = $this->session->userdata('id');
            // $kategori = $this->M_transaksi->get_kategori($id_user);
            $kategori = $this->M_transaksi->get_kategori($id_user);
            // var_dump($kategori);
            $relasi = array(
                "kategori" => $kategori
            );
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view("v_tambahTransaksi", $relasi);
            $this->load->view('templates/footer');
        } else {
            $id_user = $this->input->post("id_user");
            $id_kat = $this->input->post("kategori");
            $nama = $this->input->post("nama_transaksi");
            $tanggal = $this->input->post("tanggal");
            $jumlah = $this->input->post("jumlah");
            $data = array(
                "id_user" => $id_user,
                "id_kategori"=> $id_kat,
                "keterangan"=> $nama,
                "tanggal"=>$tanggal,
                "jumlah"=>$jumlah
            );
            $this->M_transaksi->insert($data, 'transaksi_keuangan');
            redirect("menu/laporan");
        }
    }

    function tambah2()
    {
        $this->load->model('M_transaksi');
        $id_user = $this->input->post('id_user');
        $kategori = $this->input->post('namaKategori');
        $ket = $this->input->post('Deskripsi');

        $data = array(
            'id_user' => $id_user,
            'namaKategori' => $kategori,
            'Deskripsi' => $ket,
        );
        $this->M_transaksi->insert($data, 'kategori_transaksi');
        redirect('kategori/index');
    }
    public function delete($id)
    {
        $this->load->model("M_kategori");
        $result = $this->M_kategori->delete($id);
        if ($result) {
            redirect("kategori/index");
        } else {
            echo "gagal menghapus data";
        }
    }
}
