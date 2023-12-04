<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tujuan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "rencana_keuangan";

        $this->post = $this->input->post();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    public function get_tujuan($id = 0)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        if ($id != 0) {
            $this->db->where("rencana_keuangan.id_user", $id);
        }
        return $this->db->get()->result_array();
    }
    public function get_sum_keluar($id = 0)
    {
        $this->db->select("SUM(transaksi_keuangan.jumlah) as total_pengeluaran");
        $this->db->from($this->table);
        $this->db->join('kategori_transaksi', 'transaksi_keuangan.id_kategori = kategori_transaksi.id_kategori');

        if ($id != 0) {
            $this->db->where("transaksi_keuangan.id_user", $id);
        }

        $this->db->where("kategori_transaksi.Deskripsi", "pengeluaran");

        return $this->db->get()->row_array(); // Use row_array() instead of result_array()
    }

    public function get_sum_masuk($id = 0)
    {
        $this->db->select("SUM(transaksi_keuangan.jumlah) as total_pemasukkan");
        $this->db->from($this->table);
        $this->db->join('kategori_transaksi', 'transaksi_keuangan.id_kategori = kategori_transaksi.id_kategori');

        if ($id != 0) {
            $this->db->where("transaksi_keuangan.id_user", $id);
        }

        $this->db->where("kategori_transaksi.Deskripsi", "pemasukkan");

        return $this->db->get()->row_array(); // Use row_array() instead of result_array()
    }
    // public function get_pemasukkan_per_kategori($id_user)
    // {
    //     $this->db->select('kategori_transaksi.Deskripsi, COUNT(transaksi_keuangan.id_transaksi) as jumlah_transaksi');
    //     $this->db->from('transaksi_keuangan');
    //     $this->db->join('kategori_transaksi', 'transaksi_keuangan.id_kategori = kategori_transaksi.id_kategori');
    //     $this->db->where('transaksi_keuangan.id_user', $id_user);
    //     $this->db->where('kategori_transaksi.Deskripsi', 'pemasukkan');
    //     $this->db->group_by('kategori_transaksi.id_kategori');
    //     return $this->db->get()->result_array();
    // }
    public function get_total_uang_pemasukkan_per_kategori($id_user)
{
    $this->db->select('kategori_transaksi.namaKategori, SUM(transaksi_keuangan.jumlah) AS jumlah_transaksi');
    $this->db->from('transaksi_keuangan');
    $this->db->join('kategori_transaksi', 'transaksi_keuangan.id_kategori = kategori_transaksi.id_kategori');
    $this->db->where('transaksi_keuangan.id_user', $id_user);
    $this->db->where('kategori_transaksi.Deskripsi', 'pemasukkan');
    $this->db->group_by('kategori_transaksi.id_kategori, kategori_transaksi.namaKategori');
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


    function delete($id)
    {
        $this->db->where("id_kategori", $id);
        $this->db->delete("kategori_transaksi");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
