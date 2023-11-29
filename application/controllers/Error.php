<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomError extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function handle_exception($exception) {
        // Tampilkan halaman khusus untuk penanganan exception
        $data['exception'] = $exception;
        $this->load->view('errors/custom_exception', $data);
    }

    public function handle_error($severity, $message, $file, $line) {
        // Tampilkan halaman khusus untuk penanganan error
        $data['severity'] = $severity;
        $data['message'] = $message;
        $data['file'] = $file;
        $data['line'] = $line;
        $this->load->view('errors/custom_error', $data);
    }
}
