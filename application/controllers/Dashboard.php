<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

		$data['jml_produk'] = $this->db->count_all('produk');
		$data['jml_suplier'] = $this->db->count_all('suplier');

		date_default_timezone_set('Asia/Jakarta');
		$bulan = date('m');
		$tahun = date('Y');

		$this->db->where(['month(tanggal)' => $bulan, 'year(tanggal)' => $tahun]);
		$data['pj_bulan_ini'] = $this->db->count_all_results('penjualan');

		$this->db->where(['month(tanggal)' => $bulan, 'year(tanggal)' => $tahun, 'status' => 'Selesai']);
		$data['pj_selesai'] = $this->db->count_all_results('penjualan');

		$this->db->where(['month(tanggal)' => $bulan, 'year(tanggal)' => $tahun, 'status' => 'Proses']);
		$data['pj_proses'] = $this->db->count_all_results('penjualan');

		$this->db->where(['month(tanggal)' => $bulan, 'year(tanggal)' => $tahun, 'status' => 'Otw']);
		$data['pj_otw'] = $this->db->count_all_results('penjualan');

		$this->db->where(['month(tanggal)' => $bulan, 'year(tanggal)' => $tahun, 'status' => 'Retur']);
		$data['pj_retur'] = $this->db->count_all_results('penjualan');

		$this->db->where(['month(tanggal)' => $bulan, 'year(tanggal)' => $tahun, 'status' => 'Batal']);
		$data['pj_batal'] = $this->db->count_all_results('penjualan');



		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('v_utama/dashboard', $data);
		$this->load->view('templates/footer');
	}
}
