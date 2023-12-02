<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "transaksi_keuangan";

        $this->post = $this->input->post();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    public function get_transaksi_all($id = 0)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->join('kategori_transaksi', 'transaksi_keuangan.id_kategori = kategori_transaksi.id_kategori');
        if ($id != 0) {
            $this->db->where("transaksi_keuangan.id_user", $id);
        }
        return $this->db->get()->result_array();
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