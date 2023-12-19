<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property M_anggaran $M_anggaran
 */
class Rencana extends CI_Controller
{

    public function index()
    {
        $this->load->model('M_transaksi');
        $id = $this->session->userdata('id');
        $keluar = $this->M_transaksi->get_sum_keluar($id);
        $masuk = $this->M_transaksi->get_sum_masuk($id);
        $par = $this->M_transaksi->parentt($id);
        $katP = $this->M_transaksi->count_catP($id);
        $katM = $this->M_transaksi->count_catM($id);
        $per = $this->M_transaksi->per_kategori($id);
        $pie_masuk = $this->M_transaksi->get_total_uang_pemasukkan_per_kategori($id);
        $pie_keluar = $this->M_transaksi->get_total_uang_pengeluaran_per_kategori($id);
        $total_k = isset($keluar['total_pengeluaran']) ? $keluar['total_pengeluaran'] : 0;
        $total_m = isset($masuk['total_pemasukkan']) ? $masuk['total_pemasukkan'] : 0;
        $data = [
            'masukBulan' => $this->M_transaksi->get_masuk_bulan($id),
            'keluarBulan' => $this->M_transaksi->get_keluar_bulan($id),
            'per' => $per,
            'sumK'  => $this->M_transaksi->sum_keluar($id),
            'katP' => $katP,
            'katM' => $katM,
            'parP' => $this->M_transaksi->count_parP($id),
            "par" => $par,
            "total_k" => $total_k,
            "total_m" => $total_m,
            "pemasukkan_kategori" => $pie_masuk,
            "pengeluaran_kategori" => $pie_keluar
        ];
        // echo var_dump($data);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('rencana', $data);
        $this->load->view('templates/footer');
    }


    public function tambah()
    {
        $this->load->model('M_tujuan');
        $this->load->model('M_transaksi');
        $this->load->model('M_kategori');
        $post = $this->input->post();

        if (empty($post)) {
            $id_user = $this->session->userdata('id');
            //untuk id kategori
            $kategori = $this->M_transaksi->get_kategori($id_user);
            // var_dump($kategori);
            $relasi = array(
                "kategori" => $kategori
            );
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view("v_tambahtujuan", $relasi);
            $this->load->view('templates/footer');
        } else {
            $id_user = $this->input->post('id_user');
            $jumlah = $this->input->post('jumlah');
            $sekarang = $this->input->post('tgl_sekarang');
            $target = $this->input->post('tanggal');
            $set = $this->input->post('jumlah_sekarang');
            $goal = $this->input->post('nama_goal');
            $kategori = [
                'id_user' => $id_user,
                'namaKategori' => $goal,
                'Deskripsi' => 'pengeluaran',
            ];

            $this->M_kategori->insert($kategori, 'kategori_transaksi');
            $id_kategori = $this->db->insert_id();
            $data = [
                'id_user' => $id_user,
                'jumlah_dibutuhkan' => $jumlah,
                'id_kategori' => $id_kategori,
                'tujuan_keuangan' => $goal,
                'uang_sekarang' => $set,
                'tanggal_buat' => $sekarang,
                'tanggal_target' => $target,
            ];
            $this->M_tujuan->insert($data, 'rencana_keuangan');
            redirect('menu/tujuan');

        }
    }
    public function update($id)
    {
        $this->load->model('M_tujuan');
        $this->load->model('M_transaksi');
        $post = $this->input->post();
        $id_user = $this->session->userdata('id');
        $sekarang = $this->input->post('waktu');
        $uang = $this->input->post('uang_sekarang');
        $ket = $this->input->post('id_kat');
        $desk = $this->input->post('desk');
        // $id_user = $this->input->post('id_user');
        $uang_selisih = $this->input->post('selisih');
        $selisih = $uang - $uang_selisih;
        $this->M_tujuan->update(
            $id,
            $uang
        );
        $data = [
            'id_rencana' => $id,
            'jumlah' => $selisih,
            'tanggal' => $sekarang,
        ];
        $keluar = [
            "id_user" => $id_user,
            "id_kategori" => $ket,
            "keterangan" => $desk,
            "tanggal" => $sekarang,
            "jumlah" => $selisih
        ];
        $this->M_tujuan->detail($data);
        $this->M_transaksi->insert($keluar);
        redirect("menu/tujuan");
    }

}
