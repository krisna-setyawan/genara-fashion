<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kota extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}


	function get_ajax()
	{
		$list = $this->m_data_kota->get_datatables();

		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $kot) {
			$no++;
			$row = array();
			$row[] = $no . ".";
			$row[] = $kot->nama_kota;
			$row[] = $kot->provinsi;
			// add html for action
			$row[] = '<div class="dropdown">
						<button onclick="edit(' . $kot->id_kota . ')" class="badge btn-info">Edit</button>
						<button onclick="hapus(' . $kot->id_kota . ')" class="badge btn-danger">Hapus</button>
                    </div>
                    ';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->m_data_kota->count_all(),
			"recordsFiltered" => $this->m_data_kota->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function index()
	{
		$data_session_username = $this->session->userdata('username');
		$data['user_login'] = $this->db->get_where('user', ['username' => $data_session_username])->row_array();

		$data['profil_toko'] = $this->db->get_where('profil_toko', ['id' => 1])->row_array();

		$this->db->order_by('nama_provinsi', 'asc');
		$data['provinsi'] = $this->db->get('provinsi')->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('v_master/kota', $data);
		$this->load->view('templates/footer');
	}

	public function add_kota_aksi()
	{
		$data = array(
			'nama_kota' => $this->input->post('nama_kota'),
			'id_provinsi' => $this->input->post('id_provinsi'),
		);
		$this->db->insert('kota', $data);

		$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Menambah data kota.
            </div>
        </div>
        ');
		redirect('kota');
	}

	public function getKotaById($id)
	{
		$where = array(
			'id_kota' => $id
		);
		$data = $this->db->get_where('kota', $where)->row_array();

		echo json_encode($data);
	}

	public function edit_kota_aksi()
	{
		$id =  $this->input->post('edit_id');
		$data = array(
			'nama_kota' => $this->input->post('edit_nama_kota'),
			'id_provinsi' => $this->input->post('edit_id_provinsi'),
		);
		$this->db->where('id_kota', $id);
		$this->db->update('kota', $data);

		$this->session->set_flashdata('pesan', '
        <div class="alert alert-primary alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Edit data kota.
            </div>
        </div>
        ');
		redirect('kota');
	}

	public function hapus_kota($id)
	{
		$where = array('id_kota' => $id);
		$this->db->where($where);
		$this->db->delete('kota');
		$this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Menghapus data kota.
            </div>
        </div>
        ');
		redirect('kota');
	}
}
