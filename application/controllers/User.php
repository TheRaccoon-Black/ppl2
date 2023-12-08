<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
	}
// 	public function index()
// {
//     $this->load->model('M_transaksi');
//     $id = $this->session->userdata('id');
//     $keluar = $this->M_transaksi->get_sum_keluar($id);
//     $masuk = $this->M_transaksi->get_sum_masuk($id);
//     $pie_masuk = $this->M_transaksi->get_pemasukkan_per_kategori($id);

//     // Make sure to handle the case where the value is not set
//     $total_k = isset($keluar['total_pengeluaran']) ? $keluar['total_pengeluaran'] : 0;
//     $total_m = isset($masuk['total_pemasukkan']) ? $masuk['total_pemasukkan'] : 0;

//     // Prepare data for the view
//     $data = [
//         "total_k" => $total_k,
//         "total_m" => $total_m,
//         "pemasukkan_kategori" => $pie_masuk,
//     ];

//     $this->load->view('templates/header');
//     $this->load->view('templates/sidebar');
//     $this->load->view("indeks", $data);
//     $this->load->view('templates/footer');
// }
public function index()
{
    $this->load->model('M_transaksi');
    $id = $this->session->userdata('id');
    $keluar = $this->M_transaksi->get_sum_keluar($id);
    $masuk = $this->M_transaksi->get_sum_masuk($id);
    $pie_masuk =  $this->M_transaksi->get_total_uang_pemasukkan_per_kategori($id);
    $pie_keluar =  $this->M_transaksi->get_total_uang_pengeluaran_per_kategori($id);

	$total_k = isset($keluar['total_pengeluaran']) ? $keluar['total_pengeluaran'] : 0;
    $total_m = isset($masuk['total_pemasukkan']) ? $masuk['total_pemasukkan'] : 0;

$data = [
    "total_k" => $total_k,
    "total_m" => $total_m,
    "pemasukkan_kategori" => $pie_masuk,
    "pengeluaran_kategori" => $pie_keluar
];

$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view("indeks", $data);
$this->load->view('templates/footer');

}


	function lacak()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view("lacak");
        $this->load->view('templates/footer');
	}

	function rencana()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view("rencana");
        $this->load->view('templates/footer');
	}

	function lapor()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view("lapor");
        $this->load->view('templates/footer');
	}

	function tujuan()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view("tujuan");
        $this->load->view('templates/footer');
	}


	function investasi()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view("investasi");
        $this->load->view('templates/footer');
	}
	function tools() {
		$this->load->library('curl_library');
		$this->load->view("templates/header");
		$this->load->view("templates/sidebar");
        $url = "https://schwab.p.rapidapi.com/market/get-reports";
        $headers = [
            "X-RapidAPI-Host: schwab.p.rapidapi.com",
            "X-RapidAPI-Key: SIGN-UP-FOR-KEY"
        ];

        $apiResponse = $this->curl_library->getRequest($url, $headers);

        // Lakukan sesuatu dengan $apiResponse, contoh: tampilkan di view
        $data['api_response'] = $apiResponse;
        $this->load->view('tools', $data);
		$this->load->view('templates/footer');
    }
}