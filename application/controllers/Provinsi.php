<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Provinsi extends CI_Controller
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

		$data['provinsi'] = $this->db->get('provinsi')->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('v_master/provinsi', $data);
		$this->load->view('templates/footer');
	}






	// CRUD PROVINSI --------------------------------------------------------------------------------------- CRUD PROVINSI   
	public function add_provinsi_aksi()
	{
		$data = array(
			'nama_provinsi' => $this->input->post('nama'),
		);
		$this->db->insert('provinsi', $data);

		$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Menambah data provinsi.
            </div>
        </div>
        ');
		redirect('provinsi');
	}

	public function getProvinsiById($id)
	{
		$where = array(
			'id_provinsi' => $id
		);
		$data = $this->db->get_where('provinsi', $where)->row_array();

		echo json_encode($data);
	}

	public function edit_provinsi_aksi()
	{
		$id =  $this->input->post('edit_id');

		$data = array(
			'nama_provinsi' => $this->input->post('edit_nama'),
		);

		$this->db->where('id_provinsi', $id);
		$this->db->update('provinsi', $data);

		$this->session->set_flashdata('pesan', '
        <div class="alert alert-primary alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Edit data provinsi.
            </div>
        </div>
        ');
		redirect('provinsi');
	}

	public function hapus_provinsi($id)
	{
		$where = array('id_provinsi' => $id);
		$this->db->where($where);
		$this->db->delete('provinsi');
		$this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Menghapus data provinsi.
            </div>
        </div>
        ');
		redirect('provinsi');
	}
	// CRUD PROVINSI --------------------------------------------------------------------------------------- CRUD PROVINSI   
}
