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
    public function get_total_uang_pengeluaran_per_kategori($id_user)
    {
        $this->db->select('kategori_transaksi.namaKategori, SUM(transaksi_keuangan.jumlah) AS jumlah_transaksi');
        $this->db->from('transaksi_keuangan');
        $this->db->join('kategori_transaksi', 'transaksi_keuangan.id_kategori = kategori_transaksi.id_kategori');
        $this->db->where('transaksi_keuangan.id_user', $id_user);
        $this->db->where('kategori_transaksi.Deskripsi', 'pengeluaran');
        $this->db->group_by('kategori_transaksi.id_kategori, kategori_transaksi.namaKategori');
        return $this->db->get()->result_array();
    }

    public function get_kategori($id)
    {

        $this->db->select("*");
        $this->db->from("kategori_transaksi");
        $this->db->where("id_user", $id);
        return $this->db->get()->result_array();
    }
    public function get_kategori_keluar($id = 0)
    {
        $this->db->select("*");
        $this->db->from("kategori_transaksi");
        $this->db->join('kategori_parent', 'kategori_parent.id_parent = kategori_transaksi.id_parent');
        if ($id != 0) {
            $this->db->where("kategori_transaksi.id_user", $id);
            $this->db->where('kategori_parent.persentase <>', 0);
        }
        return $this->db->get()->result_array();
    }
    public function get_kategori_masuk($id = 0)
    {
        $this->db->select("*");
        $this->db->from("kategori_transaksi");
        $this->db->join('kategori_parent', 'kategori_parent.id_parent = kategori_transaksi.id_parent');
        if ($id != 0) {
            $this->db->where("kategori_transaksi.id_user", $id);
            $this->db->where('kategori_parent.persentase', 0);
        }
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
    function parentt($id)
    {
        $this->db->select("*");
        $this->db->from("kategori_parent");
        if ($id != 0) {
            $this->db->where('kategori_parent.id_user', $id);
            $this->db->where('kategori_parent.persentase <>', 0);
        }
        return $this->db->get()->result_array();
    }
    function get_total_masuk($id)
    {
        $this->db->select('SUM(transaksi_keuangan.jumlah) as total_masuk');
        $this->db->from('kategori_transaksi');
        $this->db->join('transaksi_keuangan', 'kategori_transaksi.id_kategori = transaksi_keuangan.id_kategori');
        $this->db->where('kategori_transaksi.Deskripsi', 'pemasukkan');
        $this->db->where("kategori_transaksi.id_kategori", $id);

        $result = $this->db->get()->row_array();

        return $result['total_masuk'];
    }
    function get_masuk_bulan($id)
{
    // Get the current month and year
    $currentMonth = date('m');
    $currentYear = date('Y');

    $this->db->select('SUM(transaksi_keuangan.jumlah) as total_masuk');
    $this->db->from('kategori_transaksi');
    $this->db->join('transaksi_keuangan', 'kategori_transaksi.id_kategori = transaksi_keuangan.id_kategori');
    $this->db->where('kategori_transaksi.Deskripsi', 'pemasukkan');
    $this->db->where("kategori_transaksi.id_user", $id);
    $this->db->where("MONTH(transaksi_keuangan.tanggal)", $currentMonth);
    $this->db->where("YEAR(transaksi_keuangan.tanggal)", $currentYear);

    $result = $this->db->get()->row_array();

    return $result['total_masuk'];
}
function get_keluar_bulan($id)
{
    // Get the current month and year
    $currentMonth = date('m');
    $currentYear = date('Y');

    $this->db->select('SUM(transaksi_keuangan.jumlah) as total_masuk');
    $this->db->from('kategori_transaksi');
    $this->db->join('transaksi_keuangan', 'kategori_transaksi.id_kategori = transaksi_keuangan.id_kategori');
    $this->db->where('kategori_transaksi.Deskripsi', 'pengeluaran');
    $this->db->where("kategori_transaksi.id_user", $id);
    $this->db->where("MONTH(transaksi_keuangan.tanggal)", $currentMonth);
    $this->db->where("YEAR(transaksi_keuangan.tanggal)", $currentYear);

    $result = $this->db->get()->row_array();

    return $result['total_masuk'];
}
    public function per_kategori($id_user)
    {
        $this->db->select('kategori_parent.kategori_parent, SUM(transaksi_keuangan.jumlah) as jum');
        $this->db->from('kategori_parent');
        $this->db->join('kategori_transaksi', 'kategori_parent.id_parent = kategori_transaksi.id_parent');
        $this->db->join('transaksi_keuangan', 'kategori_transaksi.id_kategori = transaksi_keuangan.id_kategori');
        $this->db->where('kategori_parent.id_user', $id_user);
        $this->db->where('kategori_transaksi.Deskripsi', 'pengeluaran');
        $this->db->group_by('kategori_parent.kategori_parent');

        return $this->db->get()->result_array();
    }

    public function count_catM($id)
    {
        $this->db->from('kategori_transaksi');
        $this->db->where('Deskripsi', 'pemasukkan');
        $this->db->where('id_user', $id);
        return $this->db->count_all_results();
    }
    public function count_catP($id)
    {
        $this->db->from('kategori_transaksi');
        $this->db->where('Deskripsi', 'pengeluaran');
        $this->db->where('id_user', $id);
        return $this->db->count_all_results();
    }
    public function count_parP($id)
    {
        $this->db->from('kategori_parent');
        $this->db->where('persentase <>', 0);
        $this->db->where('id_user', $id);
        return $this->db->count_all_results();
    }

    // ... method lainnya ...
}


