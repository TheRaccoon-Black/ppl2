<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
	}
	public function index()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view("indeks");
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