<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warna extends CI_Controller
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

		$data['warna'] = $this->db->get('warna')->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('v_master/warna', $data);
		$this->load->view('templates/footer');
	}





	// CRUD WARNA --------------------------------------------------------------------------------------- CRUD WARNA   
	public function add_warna_aksi()
	{
		$data = array(
			'warna' => $this->input->post('nama'),
		);
		$this->db->insert('warna', $data);

		$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Menambah data warna.
            </div>
        </div>
        ');
		redirect('warna');
	}

	public function getwarnaById($id)
	{
		$where = array(
			'id' => $id
		);
		$data = $this->db->get_where('warna', $where)->row_array();

		echo json_encode($data);
	}

	public function edit_warna_aksi()
	{
		$id =  $this->input->post('edit_id');

		$data = array(
			'warna' => $this->input->post('edit_nama'),
		);

		$this->db->where('id', $id);
		$this->db->update('warna', $data);

		$this->session->set_flashdata('pesan', '
        <div class="alert alert-primary alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Edit data warna.
            </div>
        </div>
        ');
		redirect('warna');
	}

	public function hapus_warna($id)
	{
		$where = array('id' => $id);
		$this->db->where($where);
		$this->db->delete('warna');
		$this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Menghapus data warna.
            </div>
        </div>
        ');
		redirect('warna');
	}
	// CRUD WARNA --------------------------------------------------------------------------------------- CRUD WARNA   
}
