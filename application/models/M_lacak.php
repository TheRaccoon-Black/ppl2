<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lacak extends CI_Model
{
    public function __construct()
        {
            parent::__construct();
            $this->table = "transaksi_keuangan";
            $this->post = $this->input->post();
        }    
    public function insert($data)
    {
        $this->db->insert('transaksi_keuangan', $data);
    }
    public function get_transaksi_keluar($id = 0)
{
    $this->db->select("*");
    $this->db->from('transaksi_keuangan');
    $this->db->join('kategori_transaksi', 'transaksi_keuangan.id_kategori = kategori_transaksi.id_kategori');
    
    if ($id != 0) {
        $this->db->where("transaksi_keuangan.id_user", $id);
        $this->db->where("kategori_transaksi.Deskripsi", "pengeluaran");
    }

    $result = $this->db->get()->result_array();

   
    $formattedData = [];
    foreach ($result as $row) {
        $formattedData[$row['tanggal']][] = [
            'transaksi' => $row['keterangan'],
            'kategori' => $row['namaKategori'],
            'jumlah' => 'Rp' . number_format($row['jumlah'], 0, ',', '.'),
        ];
    }
    

    return $formattedData;
}
public function get_transaksi_masuk($id = 0)
{
    $this->db->select("*");
    $this->db->from('transaksi_keuangan');
    $this->db->join('kategori_transaksi', 'transaksi_keuangan.id_kategori = kategori_transaksi.id_kategori');
    
    if ($id != 0) {
        $this->db->where("transaksi_keuangan.id_user", $id);
        $this->db->where("kategori_transaksi.Deskripsi", "pemasukkan");
    }

    $result = $this->db->get()->result_array();

   
    $formattedData = [];
    foreach ($result as $row) {
        $formattedData[$row['tanggal']][] = [
            'transaksi' => $row['keterangan'],
            'kategori' => $row['namaKategori'],
            'jumlah' => 'Rp' . number_format($row['jumlah'], 0, ',', '.'),
        ];
    }

    return $formattedData;
}

    function get_sum_keluar($id = 0)
    {
        $this->db->select("transaksi_keuangan.*, SUM(transaksi_keuangan.jumlah) as total_pengeluaran");
        $this->db->from($this->table);
        $this->db->join('kategori_transaksi', 'transaksi_keuangan.id_kategori = kategori_transaksi.id_kategori');

        if ($id != 0) {
            $this->db->where("transaksi_keuangan.id_user", $id);
        }

        $this->db->where("kategori_transaksi.Deskripsi", "pengeluaran");
        $this->db->group_by("transaksi_keuangan.id_transaksi"); // Assuming id_transaksi is the primary key

        return $this->db->get()->result_array();
    }
        public function get_kategori($id)
    {
        // $query = $this->db->get('kategori_transaksi');
        // return $query->result();
        $this->db->select("*");
        $this->db->from("kategori_transaksi");
        $this->db->where("id_user", $id);
        return $this->db->get()->result_array();
    }

}