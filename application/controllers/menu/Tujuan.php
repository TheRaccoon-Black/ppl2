<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property M_transaksi $M_transaksi
 */
class Tujuan extends CI_Controller
{

    public function index()
    {
        $this->load->model('M_tujuan');
        $id = $this->session->userdata('id');
        $tujuan = $this->M_tujuan->get_tujuan($id);
        $data = [
            "tujuan" => $tujuan,
        ];
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tujuan', $data);
        $this->load->view('templates/footer');
    }

    // public function tambah()
    // {
    //     $this->load->model("M_transaksi");
    //     $post = $this->input->post();

    //     if (empty($post)) {
    //         $id_user = $this->session->userdata('id');
    //         // $kategori = $this->M_transaksi->get_kategori($id_user);
    //         // $kategori = $this->M_transaksi->get_kategori($id_user);
    //         // var_dump($kategori);
    //         $relasi = array(
    //             "kategori" => $kategori
    //         );
    //         $this->load->view('templates/header');
    //         $this->load->view('templates/sidebar');
    //         $this->load->view("v_tambahTransaksi", $relasi);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $id_user = $this->input->post("id_user");
    //         $id_kat = $this->input->post("kategori");
    //         $nama = $this->input->post("nama_transaksi");
    //         $tanggal = $this->input->post("tanggal");
    //         $jumlah = $this->input->post("jumlah");
    //         $data = array(
    //             "id_user" => $id_user,
    //             "id_kategori"=> $id_kat,
    //             "keterangan"=> $nama,
    //             "tanggal"=>$tanggal,
    //             "jumlah"=>$jumlah
    //         );
    //         $this->M_transaksi->insert($data, 'transaksi_keuangan');
    //         redirect("menu/laporan");
    //     }
    // }

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
            $this->load->view("v_tambahtujuan",$relasi);
            $this->load->view('templates/footer');
        } else {
            $id_user = $this->input->post('id_user');
            $jumlah = $this->input->post('jumlah');
            $sekarang = $this->input->post('tgl_sekarang');
            $target = $this->input->post('tanggal');
            $set = $this->input->post('jumlah_sekarang');
            $goal = $this->input->post('nama_goal');

            $data = [
                'id_user' => $id_user,
                'jumlah_dibutuhkan' => $jumlah,
                'tujuan_keuangan' => $goal,
                'uang_sekarang' => $set,
                'tanggal_buat' => $sekarang,
                'tanggal_target' => $target,
            ];
            $kategori = [
                'id_user' => $id_user,
                'namaKategori'=> $goal,
                'Deskripsi' => 'pengeluaran',
            ];

            $this->M_kategori->insert($kategori,'kategori_transaksi');
            $this->M_tujuan->insert($data, 'rencana_keuangan');
            redirect('menu/tujuan');

        }   
    }
    public function update($id){
        $this->load->model('M_tujuan');
        $this->load->model('M_transaksi');
        $post = $this->input->post();
        $sekarang = $this->input->post('waktu');
        $uang = $this->input->post('uang_sekarang');
        // $ket = $this->input->post('ket');
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
        // $keluar = [
        //     "id_user" => $id_user,
        //         "id_kategori"=> $id_kat,
        //         "keterangan"=> $ket,
        //         "tanggal"=>$sekarang,
        //         "jumlah"=>$selisih
        // ];
        $this->M_tujuan->detail($data);
        // $this->M_transaksi->insert($keluar);
        redirect("menu/tujuan");
    }

    // public function delete($id)
    // {
    //     $this->load->model("M_kategori");
    //     $result = $this->M_kategori->delete($id);
    //     if ($result) {
    //         redirect("kategori/index");
    //     } else {
    //         echo "gagal menghapus data";
    //     }
    // }
}
