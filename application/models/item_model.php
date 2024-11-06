<?php
class Item_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Fungsi untuk memasukkan data ke dalam tabel t_model
    function insert_item($data): mixed {
        return $this->db->insert('t_model', $data);
    }

    // Fungsi untuk menampilkan seluruh data dari tabel t_model
    function select_all() {
        $this->db->select('*');
        $this->db->from('t_model');
        $this->db->order_by('kd_model', 'desc');
        return $this->db->get();
    }

    /**
     * Fungsi untuk menampilkan data berdasarkan kode model.
     * Fungsi ini digunakan untuk proses pencarian.
     */
    function select_by_kode($kd_model) {
        $this->db->select('*');
        $this->db->from('t_model');
        $this->db->where("(LOWER(kd_model) LIKE '%{$kd_model}%')");
        return $this->db->get();
    }

    // Fungsi untuk menampilkan data berdasarkan ID
    function select_by_id($kd_model) {
        $this->db->select('*');
        $this->db->from('t_model');
        $this->db->where('kd_model', $kd_model);
        return $this->db->get();
    }

    // Fungsi untuk memperbarui data di tabel t_model
    function update_item($kd_model, $data) {
        $this->db->where('kd_model', $kd_model);
        $this->db->update('t_model', $data);
    }

    // Fungsi untuk menghapus data dari tabel t_model
    function delete_item($kd_model) {
        $this->db->where('kd_model', $kd_model);
        $this->db->delete('t_model');
    }

    // Fungsi untuk menampilkan data dengan pagination
    function select_all_paging($limit = array()) {
        $this->db->select('*');
        $this->db->from('t_model');

        if ($limit != NULL) {
            $this->db->limit($limit['perpage'], $limit['offset']);
        }

        return $this->db->get();
    }

    // Menghitung jumlah rows dalam tabel t_model
    function jumlah_item() {
        $this->db->select('*');
        $this->db->from('t_model');
        return $this->db->count_all_results();
    }

    // Fungsi untuk mengekspor data
    function eksport_data() {
        $this->db->select('kd_model, nama_model, deskripsi');
        $this->db->from('t_model');
        return $this->db->get();
    }
}
?>
