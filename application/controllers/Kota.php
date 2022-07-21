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
                        <a class="btn badge badge-warning text-dark" onclick="edit(' . $kot->id_kota . ')">
                            Edit
                        </a>
                        <a class="btn badge badge-danger text-white" onclick="hapus(' . $kot->id_kota . ')">
                            Hapus
                        </a>
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
		$data['provinsi'] = $this->db->get('provinsi')->result();

		$this->load->view('templates/header');
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar');
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
		$id =  $this->input->post('id_kota');
		$data = array(
			'nama_kota' => $this->input->post('nama_kota'),
			'id_provinsi' => $this->input->post('id_provinsi'),
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
}
