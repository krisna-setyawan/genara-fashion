<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelurahan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}


	function get_ajax()
	{
		$list = $this->m_data_kelurahan->get_datatables();

		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $kot) {
			$no++;
			$row = array();
			$row[] = $no . ".";
			$row[] = $kot->nama_kelurahan;
			$row[] = $kot->kecamatan;
			// add html for action
			$row[] = '<div class="dropdown">
						<button onclick="edit(' . $kot->id_kelurahan . ')" class="badge btn-info">Edit</button>
						<button onclick="hapus(' . $kot->id_kelurahan . ')" class="badge btn-danger">Hapus</button>
                    </div>
                    ';
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->m_data_kelurahan->count_all(),
			"recordsFiltered" => $this->m_data_kelurahan->count_filtered(),
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

		$this->db->order_by('nama_kota', 'asc');
		$data['kota'] = $this->db->get('kota')->result();

		$this->db->order_by('nama_kecamatan', 'asc');
		$data['kecamatan'] = $this->db->get('kecamatan')->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('v_master/kelurahan', $data);
		$this->load->view('templates/footer');
	}

	public function get_kota_by_prov()
	{
		$where = array('id_provinsi' => $this->input->post('id_provinsi'));
		$kota = $this->db->get_where('kota', $where)->result();

		if ($kota != null) {
			foreach ($kota as $kt) {
				echo " <option value='$kt->id_kota'> $kt->nama_kota </option> ";
			}
		} else {
			echo " <option value=''>-- Tidak ada data Kota di Provinsi yang dipilih --</option> ";
		}
	}

	public function get_kecamatan_by_kota()
	{
		$where = array('id_kota' => $this->input->post('id_kota'));
		$kecamatan = $this->db->get_where('kecamatan', $where)->result();

		if ($kecamatan != null) {
			foreach ($kecamatan as $kec) {
				echo " <option value='$kec->id_kecamatan'> $kec->nama_kecamatan </option> ";
			}
		} else {
			echo " <option value=''>-- Tidak ada data Kecamatan di Kota yang dipilih --</option> ";
		}
	}

	public function add_kelurahan_aksi()
	{
		$data = array(
			'nama_kelurahan' => $this->input->post('nama_kelurahan'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			'village_code' => '-'
		);
		$this->db->insert('kelurahan', $data);

		$this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Menambah data kelurahan.
            </div>
        </div>
        ');
		redirect('kelurahan');
	}

	public function getkelurahanById($id)
	{
		$where = array(
			'id_kelurahan' => $id
		);
		$data = $this->db->get_where('kelurahan', $where)->row_array();

		echo json_encode($data);
	}

	public function edit_kelurahan_aksi()
	{
		$id =  $this->input->post('edit_id');
		$data = array(
			'nama_kelurahan' => $this->input->post('edit_nama_kelurahan'),
			'id_kecamatan' => $this->input->post('edit_id_kecamatan'),
		);
		$this->db->where('id_kelurahan', $id);
		$this->db->update('kelurahan', $data);

		$this->session->set_flashdata('pesan', '
        <div class="alert alert-primary alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Edit data kelurahan.
            </div>
        </div>
        ');
		redirect('kelurahan');
	}

	public function hapus_kelurahan($id)
	{
		$where = array('id_kelurahan' => $id);
		$this->db->where($where);
		$this->db->delete('kelurahan');
		$this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Menghapus data kelurahan.
            </div>
        </div>
        ');
		redirect('kelurahan');
	}
}
