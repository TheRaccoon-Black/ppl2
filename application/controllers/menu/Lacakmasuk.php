<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property M_lacak $M_lacak
 */
class Lacakmasuk extends CI_Controller
{
    
    public function index()
    {
        $this->load->model('M_lacak');
        $id = $this->session->userdata('id');

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        if (empty($bulan)) {
            // Jika tidak ada data bulan, beri nilai default (misalnya, "all" atau nilai default yang sesuai)
            $bulan = null;
        }

        if (empty($tahun)) {
            // Jika tidak ada data tahun, beri nilai default (misalnya, "all" atau nilai default yang sesuai)
            $tahun = null;
        }

        // Panggil fungsi get_transaksi_masuk dengan parameter bulan dan tahun
        $transaksi = $this->M_lacak->get_transaksi_masuk($id, $bulan, $tahun);

        $data = [
            "transaksi" => $transaksi,
        ];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('lacakmasuk', $data);
        $this->load->view('templates/footer');
    }
}