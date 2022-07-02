<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LihatProduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data_session_username = $this->session->userdata('username');
        $data['user_login'] = $this->db->get_where('user', ['username' => $data_session_username])->row_array();

        $data['profil_toko'] = $this->db->get_where('profil_toko', ['id' => 1])->row_array();

        $data['produk'] = $this->db->get('produk')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_utama/lihatproduk', $data);
        $this->load->view('templates/footer');
    }





    public function getProdukById($id)
    {
        $q = "SELECT produk.*, suplier.nama as suplier, kategori.kategori as kategori, warna.warna as warna FROM produk
            JOIN suplier ON produk.id_suplier = suplier.id
            JOIN kategori ON produk.id_kategori = kategori.id
            JOIN warna ON produk.id_warna = warna.id
            WHERE produk.id = $id";
        $data = $this->db->query($q)->row_array();

        echo json_encode($data);
    }
}
