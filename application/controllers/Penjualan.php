<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
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

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_transaksi/penjualan', $data);
        $this->load->view('templates/footer');
    }





    // CRD PENJUALAN ---------------------------------------------------------------------- CRD PENJUALAN
    public function no_trx_auto()
    {
        $quer = "SELECT max(right(kode_transaksi, 3)) AS kode FROM no_pj_auto WHERE DATE(tanggal) = CURDATE()";
        $query = $this->db->query($quer)->row_array();

        if ($query) {
            $no = ((int)$query['kode']) + 1;
            $kd = sprintf("%03s", $no);
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        $kode = date('dmy') . $kd;

        echo json_encode($kode);
    }

    function get_data()
    {
        $list = $this->m_penjualan->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $ls) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $ls->no_penjualan;
            $row[] = $ls->tanggal;
            $row[] = $ls->jenis_penjualan;
            $row[] = $ls->nama_pembeli;
            $row[] = 'Rp. ' . number_format($ls->grand_total, 0, ',', '.');
            $row[] = $ls->status;
            // add html for action
            if ($ls->status == 'Proses') {
                $row[] = '
                        <a>
                            <button class="badge btn-warning text-dark" onclick="list(' . $ls->id . ')"> List </button>
                        </a>
                        <a>
                            <button class="badge btn-primary" onclick="status(' . $ls->id . ')"> Status </button>
                        </a>
                        <a>
                            <button class="badge btn-danger" onclick="hapus(' . $ls->id . ')"> Hapus </button>
                        </a>
                    ';
            } else {
                $row[] = '
                        <a>
                            <button class="badge btn-info" onclick="detail(' . $ls->id . ')"> Detail </button>
                        </a>
                        <a>
                            <button class="badge btn-danger" onclick="hapus(' . $ls->id . ')"> Hapus </button>
                        </a>
                    ';
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->m_penjualan->count_all(),
            "recordsFiltered" => $this->m_penjualan->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function add_penjualan_aksi()
    {
        $data = array(
            'no_penjualan' => $this->input->post('no_penjualan'),
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'alamat_pembeli' => $this->input->post('alamat_pembeli'),
            'no_telp_pembeli' => $this->input->post('no_telp_pembeli'),
            'tanggal' => $this->input->post('tanggal'),
            'jenis_penjualan' => $this->input->post('jenis_penjualan'),
        );
        $this->db->insert('penjualan', $data);
        $id_penjualan = $this->db->insert_id();

        $insert_no_pj_auto = [
            'id_penjualan' => $id_penjualan,
            'kode_transaksi' => $this->input->post('no_penjualan')
        ];
        $this->db->insert('no_pj_auto', $insert_no_pj_auto);

        redirect('penjualanlist/' . $id_penjualan);
    }

    public function hapus_penjualan($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('penjualan');
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Menghapus data penjualan.
            </div>
        </div>
        ');
        redirect('penjualan');
    }

    public function get_detail()
    {
        $id_penjualan = $this->input->post('id_penjualan');
        $data = $this->db->get_where('penjualan', ['id' => $id_penjualan])->row_array();
        echo json_encode($data);
    }

    public function get_detail_list()
    {
        $id_penjualan = $this->input->post('id_penjualan');
        $list_penjualan = $this->db->get_where('penjualan_detail', ['id_penjualan' => $id_penjualan])->result();

        foreach ($list_penjualan as $ls) {
            echo '
            <tr>
                <td>' . $ls->nama_barang . '</td>
                <td class="text-center">' . $ls->jumlah . '</td>
                <td class="text-right">Rp.' . number_format($ls->hg_satuan, 0, ',', '.') . '</td>
                <td class="text-right">Rp.' . number_format($ls->hg_total, 0, ',', '.') . '</td>
            </tr>
            ';
        }
    }
    // CRD PENJUALAN ---------------------------------------------------------------------- CRD PENJUALAN
}
