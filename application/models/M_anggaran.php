<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_anggaran extends CI_Model
{
    public function __construct()
        {
            parent::__construct();
            $this->table = "anggaran_bulanan";
            $this->post = $this->input->post();
        }    
    public function insert($data)
    {
        $this->db->insert('anggaran_bulanan', $data);
    }
    public function get_all_data($id = 0)
{
    $this->db->select("*");
    $this->db->from('anggaran_bulanan');
    
    if ($id != 0) {
        $this->db->where("anggaran_bulanan.id_user", $id);

    }

    return $this->db->get()->result_array();

   
    // $formattedData = [];
    // foreach ($result as $row) {
    //     $formattedData[$row['tanggal']][] = [
    //         'transaksi' => $row['keterangan'],
    //         'kategori' => $row['namaKategori'],
    //         'jumlah' => 'Rp' . number_format($row['jumlah'], 0, ',', '.'),
    //     ];
    // }
    

    // return $formattedData;
}
}