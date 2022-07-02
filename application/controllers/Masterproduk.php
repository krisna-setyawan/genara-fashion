<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masterproduk extends CI_Controller
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
        $data['suplier'] = $this->db->get('suplier')->result();
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['warna'] = $this->db->get('warna')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_master/masterproduk', $data);
        $this->load->view('templates/footer');
    }





    // CRUD PRODUK --------------------------------------------------------------------------------------- CRUD PRODUK   
    public function add_produk_aksi()
    {
        $harga_jual = str_replace(".", "", $this->input->post('harga_jual'));
        $harga_produk = str_replace(".", "", $this->input->post('harga_produk'));
        $harga_sablon = str_replace(".", "", $this->input->post('harga_sablon'));

        $data = array(
            'kode_produk' => $this->input->post('kode_produk'),
            'nama_produk' => $this->input->post('nama_produk'),
            'id_suplier' => $this->input->post('id_suplier'),
            'harga_jual' => $harga_jual,
            'harga_produk' => $harga_produk,
            'harga_sablon' => $harga_sablon,
            'id_kategori' => $this->input->post('id_kategori'),
            'id_warna' => $this->input->post('id_warna'),
            'motif' => $this->input->post('motif'),
            'ukuran' => $this->input->post('ukuran'),
        );
        $this->db->insert('produk', $data);

        $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Menambah data produk.
            </div>
        </div>
        ');
        redirect('masterproduk');
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

    public function edit_produk_aksi()
    {
        $id =  $this->input->post('edit_id');

        $edit_harga_produk = str_replace(".", "", $this->input->post('edit_harga_produk'));
        $edit_harga_jual = str_replace(".", "", $this->input->post('edit_harga_jual'));
        $edit_harga_sablon = str_replace(".", "", $this->input->post('edit_harga_sablon'));

        $data = array(
            'kode_produk' => $this->input->post('edit_kode_produk'),
            'nama_produk' => $this->input->post('edit_nama_produk'),
            'id_suplier' => $this->input->post('edit_id_suplier'),
            'harga_jual' => $edit_harga_jual,
            'harga_produk' => $edit_harga_produk,
            'harga_sablon' => $edit_harga_sablon,
            'id_kategori' => $this->input->post('edit_id_kategori'),
            'id_warna' => $this->input->post('edit_id_warna'),
            'motif' => $this->input->post('edit_motif'),
            'ukuran' => $this->input->post('edit_ukuran'),
        );

        $this->db->where('id', $id);
        $this->db->update('produk', $data);

        $this->session->set_flashdata('pesan', '
        <div class="alert alert-primary alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Edit data produk.
            </div>
        </div>
        ');
        redirect('masterproduk');
    }

    public function hapus_produk($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('produk');
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Menghapus data produk.
            </div>
        </div>
        ');
        redirect('masterproduk');
    }
    // CRUD PRODUK --------------------------------------------------------------------------------------- CRUD PRODUK   
}
