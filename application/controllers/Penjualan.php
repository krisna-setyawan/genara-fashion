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
            if ($ls->status != 'Selesai') {
                $row[] = '<b class="text-danger">' . $ls->status . '</b>';
            } else {
                $row[] = '<b class="text-primary">' . $ls->status . '</b>';
            }
            // add html for action
            if ($ls->status == 'Unsaved') {
                $row[] = '
                        <button class="badge btn-warning text-dark" onclick="list(' . $ls->id . ')"> List </button>
                        <button class="badge btn-primary" onclick="status(' . $ls->id . ')"> Status </button>
                        <button class="badge btn-danger" onclick="hapus(' . $ls->id . ')"> Hapus </button>';
            } else {
                $row[] = '
                        <button class="badge btn-secondary" onclick="detail(' . $ls->id . ')"> Detail </button>
                        <button class="badge btn-primary" onclick="status(' . $ls->id . ')"> Status </button>
                        <button class="badge btn-danger" onclick="hapus(' . $ls->id . ')"> Hapus </button>';
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

        redirect('penjualan/list/' . $id_penjualan);
    }

    public function cek_status_penjualan()
    {
        $id_penjualan = $this->input->post('id_penjualan');

        $penjualan = $this->db->get_where('penjualan_detail', ['id_penjualan' => $id_penjualan])->row_array();

        if ($penjualan['status_tagihan'] == 'Lunas') {
            $data['status'] = 'no';
        } else {
            $data['status'] = 'yes';
        }

        echo json_encode($data);
    }

    public function update_status()
    {
        $id_penjualan = $this->input->post('update_status_id_penjualan');
        $status = $this->input->post('status_now');

        $penjualan = $this->db->get_where('penjualan', ['id' => $id_penjualan])->row_array();

        if ($penjualan['status'] != 'Retur') {
            $this->db->where('id', $id_penjualan);
            $this->db->update('penjualan', ['status' => $status]);

            switch ($status) {
                case 'Batal':
                    $this->db->where('id_penjualan', $id_penjualan);
                    $this->db->update('penjualan_detail', ['status_tagihan' => 'Batal']);
                    break;
                case 'Retur':
                    $this->db->where('id_penjualan', $id_penjualan);
                    $this->db->update('penjualan_detail', ['status_tagihan' => 'Retur']);

                    // update stok produk dari qty detail penjualan
                    $penjualan_detail = $this->db->get_where('penjualan_detail', ['id_penjualan' => $id_penjualan])->result();
                    foreach ($penjualan_detail as $pd) {
                        $produk = $this->db->get_where('produk', ['id' => $pd->id_produk])->row_array();

                        $this->db->where('id', $pd->id_produk);
                        $this->db->update('produk', ['stok' => $produk['stok'] + $pd->qty]);
                    }
                    break;
                default:
                    $this->db->where('id_penjualan', $id_penjualan);
                    $this->db->update('penjualan_detail', ['status_tagihan' => 'Belum dibayar']);
            }
        } else if ($penjualan['status'] == 'Retur') {
            $this->db->where('id', $id_penjualan);
            $this->db->update('penjualan', ['status' => $status]);

            switch ($status) {
                case 'Batal':
                    $this->db->where('id_penjualan', $id_penjualan);
                    $this->db->update('penjualan_detail', ['status_tagihan' => 'Batal']);

                    // update stok produk dari qty detail penjualan
                    $penjualan_detail = $this->db->get_where('penjualan_detail', ['id_penjualan' => $id_penjualan])->result();
                    foreach ($penjualan_detail as $pd) {
                        $produk = $this->db->get_where('produk', ['id' => $pd->id_produk])->row_array();

                        $this->db->where('id', $pd->id_produk);
                        $this->db->update('produk', ['stok' => $produk['stok'] - $pd->qty]);
                    }
                    break;
                case 'Retur':
                    $this->db->where('id_penjualan', $id_penjualan);
                    $this->db->update('penjualan_detail', ['status_tagihan' => 'Retur']);
                    break;
                default:
                    $this->db->where('id_penjualan', $id_penjualan);
                    $this->db->update('penjualan_detail', ['status_tagihan' => 'Belum dibayar']);

                    // update stok produk dari qty detail penjualan
                    $penjualan_detail = $this->db->get_where('penjualan_detail', ['id_penjualan' => $id_penjualan])->result();
                    foreach ($penjualan_detail as $pd) {
                        $produk = $this->db->get_where('produk', ['id' => $pd->id_produk])->row_array();

                        $this->db->where('id', $pd->id_produk);
                        $this->db->update('produk', ['stok' => $produk['stok'] - $pd->qty]);
                    }
            }
        }

        $this->session->set_flashdata('pesan', '
        <div class="alert alert-info alert-dismissible" role="alert mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="alert-message">
                <strong>Berhasil!</strong> Update Status penjualan.
            </div>
        </div>
        ');
        redirect('penjualan');
    }

    public function hapus_penjualan($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('penjualan');

        $this->db->where(['id_penjualan' => $id]);
        $this->db->delete('penjualan_detail');

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
        $q = "SELECT penjualan_detail.*, produk.motif, produk.ukuran, warna.warna FROM penjualan_detail
            LEFT JOIN produk ON penjualan_detail.id_produk = produk.id
            LEFT JOIN warna ON produk.id_warna = warna.id
            WHERE penjualan_detail.id_penjualan = $id_penjualan";
        $list_penjualan = $this->db->query($q)->result();

        foreach ($list_penjualan as $ls) {
            echo '
            <tr>
                <td>' . $ls->nama_produk . ' &nbsp; | &nbsp; ' . $ls->motif . ' - ' . $ls->warna . ' - ' . $ls->ukuran . '</td>
                <td class="text-center">' . $ls->qty . '</td>
                <td class="text-right">Rp.' . number_format($ls->hg_jual, 0, ',', '.') . '</td>
                <td class="text-right">Rp.' . number_format($ls->hg_total_jual, 0, ',', '.') . '</td>
            </tr>
            ';
        }
    }
    // CRD PENJUALAN ---------------------------------------------------------------------- CRD PENJUALAN














    // PENJUALAN LIST --------------------------------------------------------------------- PENJUALAN LIST
    public function list($id_penjualan)
    {
        $data_session_username = $this->session->userdata('username');
        $data['user_login'] = $this->db->get_where('user', ['username' => $data_session_username])->row_array();

        $data['penjualan'] = $this->db->get_where('penjualan', ['id' => $id_penjualan])->row_array();

        $data['profil_toko'] = $this->db->get_where('profil_toko', ['id' => 1])->row_array();

        $data['produk'] = $this->db->get('produk')->result();

        // KONDISI JIKA DATA SUDAH DIHAPUS
        if (!$data['penjualan']) {
            redirect('penjualan');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_transaksi/penjualanlist', $data);
            $this->load->view('templates/footer');
        }
    }

    public function load_data_penjualan()
    {
        $id_penjualan = $this->input->post('id_penjualan');
        $data_penjualan = $this->db->get_where('penjualan_detail', ['id_penjualan' => $id_penjualan])->result();

        $no = 1;
        foreach ($data_penjualan as $data) {
            echo '
                <tr>
                    <td>' . $no++ . '</td>
                    <td>' . $data->kode_produk . '</td>
                    <td>' . $data->nama_produk . '</td>
                    <td>' . $data->qty . '</td>
                    <td>Rp. ' . number_format(($data->hg_jual), 0, ',', '.') . '</td>
                    <td>Rp. ' . number_format($data->hg_total_jual, 0, ',', '.') . '</td>
                    <td class="text-center">
                        <button onclick="hapus_list(' . $data->id . ')" class="badge btn-danger">X</button>
                    </td>
                </tr>
            ';
        }
    }

    public function load_grand_total()
    {
        $id_penjualan = $this->input->post('id_penjualan');
        $result_total = $this->db->query("SELECT sum(hg_total_jual) as grand_total FROM penjualan_detail WHERE id_penjualan = '$id_penjualan'")->row_array();

        if ($result_total['grand_total']) {
            $data_total['grand_total'] = $result_total['grand_total'];
        } else {
            $data_total['grand_total'] = '0';
        }

        echo json_encode($data_total);
    }

    public function get_produk_autocomplete()
    {
        $kode = explode(' - ', $this->input->post('nm_produk'));

        $this->db->where('kode_produk', $kode[0]);
        $this->db->where('nama_produk', $kode[1]);
        $hasil = $this->db->get('produk')->row_array();

        if ($hasil) {
            $data['kodeku'] = 'ada';
            $data['id_produk'] = $hasil['id'];
            $data['hpp_produk'] = $hasil['harga_produk'];
            $data['hpp_sablon'] = $hasil['harga_sablon'];
            $data['harga_jual'] = $hasil['harga_produk'] + $hasil['harga_sablon'];
        } else {
            $data = [
                'kodeku' => 'tidak',
                'id_produk' => '',
                'hpp_produk' => '',
                'hpp_sablon' => '',
                'harga_jual' => '',
            ];
        }

        echo json_encode($data);
    }

    public function add_list()
    {
        $id_penjualan = $this->input->post('id_penjualan');
        $id_produk = $this->input->post('id_produk');
        $qty = $this->input->post('qty');

        $penjualan = $this->db->get_where('penjualan', ['id' => $id_penjualan])->row_array();
        $produk = $this->db->get_where('produk', ['id' => $id_produk])->row_array();

        $hg_total_beli = $produk['harga_beli'] * $qty;

        $hg_jual = $produk['harga_produk'] + $produk['harga_sablon'];
        $hg_total_jual = $hg_jual * $qty;

        $laba_total = $hg_total_jual - $hg_total_beli;

        $data_input = [
            'id_penjualan' => $id_penjualan,
            'id_produk' => $id_produk,
            'id_suplier' => $produk['id_suplier'],
            'no_penjualan' => $penjualan['no_penjualan'],
            'kode_produk' => $produk['kode_produk'],
            'nama_produk' => $produk['nama_produk'],
            'qty' => $qty,
            'hg_beli' => $produk['harga_beli'],
            'hg_total_beli' => $hg_total_beli,
            'hg_produk' => $produk['harga_produk'],
            'hg_sablon' => $produk['harga_sablon'],
            'hg_jual' => $hg_jual,
            'hg_total_jual' => $hg_total_jual,
            'laba_total' => $laba_total,
            'status_tagihan' => 'Belum dibayar'
        ];
        $this->db->insert('penjualan_detail', $data_input);
    }

    public function delete_list()
    {
        $id_detail = $this->input->post('id_detail');
        $this->db->where('id', $id_detail);
        $this->db->delete('penjualan_detail');
    }





    // SIMPAN PENJUALAN
    public function validasi_simpan_jual()
    {
        $id_penjualan = $this->input->post('id_penjualan');
        $list_penjualan = $this->db->get_where('penjualan_detail', ['id_penjualan' => $id_penjualan])->result_array();
        if ($list_penjualan) {
            $data['kodeku'] = 'ada';
        } else {
            $data['kodeku'] = 'tidak';
        }
        echo json_encode($data);
    }

    public function simpan_penjualan()
    {
        $id_penjualan = $this->input->post('id_penjualan');
        $grand_total = $this->input->post('grand_total');

        $sum_grand_beli = $this->db->query("SELECT sum(hg_total_beli) as grand_beli FROM penjualan_detail WHERE id_penjualan = $id_penjualan")->row_array();
        $grand_beli = $sum_grand_beli['grand_beli'];
        $sum_grand_jual = $this->db->query("SELECT sum(hg_total_jual) as grand_jual FROM penjualan_detail WHERE id_penjualan = $id_penjualan")->row_array();
        $grand_jual = $sum_grand_jual['grand_jual'];
        $sum_grand_laba = $this->db->query("SELECT sum(laba_total) as grand_laba FROM penjualan_detail WHERE id_penjualan = $id_penjualan")->row_array();
        $grand_laba = $sum_grand_laba['grand_laba'];

        if ($grand_total == $grand_jual) {
            $data_update = [
                'grand_beli' => $grand_beli,
                'grand_total' => $grand_total,
                'grand_laba' => $grand_laba,
                'status' => 'Proses',
            ];

            $this->db->where('id', $id_penjualan);
            $this->db->update('penjualan', $data_update);
        }
    }
}
