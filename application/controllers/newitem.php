<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Newitem extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('item_model');
    }

    // Fungsi untuk menampilkan halaman utama
    public function index() {
        // Cek apakah user sudah login
        $this->auth->restrict();
        
        // Cek apakah user memiliki akses ke menu
        $this->auth->cek_menu(2);
        
        $data['daftar_item'] = $this->item_model->select_all()->result();
        $this->menu->tampil_sidebar();
        $this->load->view('new-item', $data);
    }

    // Fungsi untuk menampilkan tabel dengan pagination
    public function lihat_item_paging($offset = 0) {
        $perpage = 10; // jumlah data per halaman
        $this->load->library('pagination'); // load library pagination

        $config = array(
            'base_url' => site_url('newitem/lihat_item_paging'),
            'total_rows' => count($this->item_model->select_all()->result()),
            'per_page' => $perpage,
        );

        $this->pagination->initialize($config);

        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['daftar_item'] = $this->item_model->select_all_paging($limit)->result();
        $this->load->view('t-new-item', $data);
    }

    // Fungsi untuk menampilkan semua item
    public function lihat_item() {
        $data['daftar_item'] = $this->item_model->select_all()->result();
        $this->load->view('t-new-item', $data);
    }

    // Fungsi untuk memproses data item (tambah atau perbarui)
    public function proses_item() {
        $method = $this->input->post("method");
        $item = new stdClass();

        if ($method == 'create') {
            $data = [
                'kd_model' => $this->input->post('kd_model'),
                'nama_model' => $this->input->post('nama_model'),
                'jml_produk' => $this->input->post('jml_produk'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            $data['kd_model'] = $this->item_model->insert_item($data);
            $item = $data;
        } else {
            $kd_model = $this->input->post('kd_model');
            $data = [
                'nama_model' => $this->input->post('nama_model'),
                'jml_produk' => $this->input->post('jml_produk'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            $this->item_model->update_item($kd_model, $data);
            $data['kd_model'] = $kd_model;
            $item = $data;
        }

        echo json_encode(['item' => $item]);
        exit(0);
    }

    // Fungsi untuk menampilkan item berdasarkan kode
    public function show_item() {
        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $kd_model = $this->input->post("kode");
            $item = $this->item_model->select_by_id($kd_model)->row();
            http_response_code(200);
            echo json_encode(['item' => $item]);
            exit(0);
        }
    }

    // Fungsi untuk menampilkan halaman edit item
    public function edit_item($kd_model) {
        $data['daftar_item'] = $this->item_model->select_by_id($kd_model)->row();
        $this->load->view('edit_item', $data);
    }

    // Fungsi untuk memproses edit item
    public function proses_edit_item() {
        $data = [
            'nama_model' => $this->input->post('nama_model'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $kd_model = $this->input->post('kd_model');
        $this->item_model->update_item($kd_model, $data);
        redirect(site_url('newitem'));
    }

    // Fungsi untuk menghapus item
    public function delete_item($kd_model) {
        $this->item_model->delete_item($kd_model);
        redirect(site_url('newitem'));
    }

    // Fungsi untuk mencari item berdasarkan kode
    public function proses_cari_item() {
        $kd_model = $this->input->post('kd_model');
        $data['daftar_item'] = $this->item_model->select_by_kode($kd_model)->result();
        $this->load->view('t-new-item', $data);
    }
}
/* End of file new-item.php */
/* Location: ./application/controllers/new-item.php */
