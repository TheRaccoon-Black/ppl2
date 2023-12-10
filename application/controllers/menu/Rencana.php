<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property M_anggaran $M_anggaran
 */
class Rencana extends CI_Controller
{

    public function index()
    {
        $this->load->model('M_anggaran');
        $id = $this->session->userdata('id');
        $anggaran = $this->M_anggaran->get_all_data($id);
        $data = [
            "rencana" => $anggaran,
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
            $this->load->view("v_tambahtujuan",$relasi);
            $this->load->view('templates/footer');
        } else {
            $id_user = $this->input->post('id_user');
            $jumlah = $this->input->post('jumlah');
            $sekarang = $this->input->post('tgl_sekarang');
            $target = $this->input->post('tanggal');
            $set = $this->input->post('jumlah_sekarang');
            $goal = $this->input->post('nama_goal');

            // $this->db->select('id_kategori');
            // $this->db->from('kategori_transaksi');
            // $this->db->where('namaKategori', $goal);
            // $this->db->where('id_user', $id_user);
            $kategori = [
                'id_user' => $id_user,
                'namaKategori'=> $goal,
                'Deskripsi' => 'pengeluaran',
            ];
            
            $this->M_kategori->insert($kategori,'kategori_transaksi');
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
    public function update($id){
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
                "id_kategori"=> $ket,
                "keterangan"=> $desk,
                "tanggal"=>$sekarang,
                "jumlah"=>$selisih
        ];
        $this->M_tujuan->detail($data);
        $this->M_transaksi->insert($keluar);
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
