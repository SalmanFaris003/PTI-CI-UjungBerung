<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
    var $CI = NULL;

    function __construct() {
        // get CI's object
        $this->CI =& get_instance();
    }

    // Untuk validasi login
    function do_login($username, $password) {
        // Cek di database
        $this->CI->db->from('user');
        $this->CI->db->where('user_username', $username);
        $this->CI->db->where('user_password=MD5("' . $password . '")', '', false);
        $result = $this->CI->db->get();

        if ($result->num_rows() == 0) {
            // Username dan password tidak ditemukan
            return false;
        } else {
            // User ditemukan, ambil informasi dari database
            $userdata = $result->row();
            $session_data = array(
                'user_id'   => $userdata->user_id,
                'nama'      => $userdata->user_nama,
                'alamat'    => $userdata->user_alamat,
                'kota'      => $userdata->user_kota,
                'kodepos'   => $userdata->user_kodepos,
                'telepon'   => $userdata->user_telepon,
                'email'     => $userdata->user_email,
                'username'  => $userdata->user_username,
                'role'      => $userdata->user_role,
                'level'     => $userdata->user_level
            );

            // Buat session
            $this->CI->session->set_userdata($session_data);
            return true;
        }
    }

    // Untuk mengecek apakah user sudah login
    function is_logged_in() {
        return $this->CI->session->userdata('user_id') != '';
    }

    // Untuk validasi di setiap halaman yang membutuhkan autentikasi
    function restrict() {
        if ($this->is_logged_in() == false) {
            redirect('home');
        }
    }

    // Untuk mengecek akses menu
    function cek_menu($idmenu) {
        $this->CI->load->model('usermodel');
        $status_user = $this->CI->session->userdata('level');
        $allowed_level = $this->CI->usermodel->get_array_menu($idmenu);

        if (in_array($status_user, $allowed_level) == false) {
            die("Maaf, Anda tidak berhak untuk mengakses halaman ini.");
        }
    }

    // Untuk logout
    function do_logout() {
        $this->CI->session->sess_destroy();
    }
}
