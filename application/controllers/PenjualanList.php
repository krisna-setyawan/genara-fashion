<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index($id_penjualan)
    {
        $data_session_username = $this->session->userdata('username');
        $data['user_login'] = $this->db->get_where('user', ['username' => $data_session_username])->row_array();

        $data['penjualan'] = $this->db->get_where('penjualan', ['id' => $id_penjualan])->row_array();

        $data['profil_toko'] = $this->db->get_where('profil_toko', ['id' => 1])->row_array();

        $data['penjualan']['hg_reseller'] = $this->kode_hg_reseller($data['penjualan']['kelas_reseller']);

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

    public function kode_hg_reseller($kelas_reseller)
    {
        if ($kelas_reseller == 'Kelas 1') {
            $hg_reseller = 'hg_reseller1';
        } else if ($kelas_reseller == 'Kelas 2') {
            $hg_reseller = 'hg_reseller2';
        } else if ($kelas_reseller == 'Kelas 3') {
            $hg_reseller = 'hg_reseller3';
        } else if ($kelas_reseller == 'Kelas 4') {
            $hg_reseller = 'hg_reseller4';
        } else {
            $hg_reseller = '0';
        }
        return $hg_reseller;
    }

    public function barang_autocomplete()
    {
        if (isset($_GET['term'])) {
            $keyword_brg = $_GET['term'];

            $this->db->like('nama_barang', $keyword_brg);
            $this->db->limit(10);
            $barangs = $this->db->get('barang')->result();

            if (count($barangs) > 0) {
                foreach ($barangs as $row) {
                    $arr_result[] = $row->nama_barang;
                }
                echo json_encode($arr_result);
            }
        }
    }

    public function get_barang_autocomplete()
    {
        $nm_brg = $this->input->post('nm_brg');

        $this->db->like('nama_barang', $nm_brg);
        $hasil = $this->db->get('barang')->row_array();

        if ($hasil) {
            $data = $hasil;
            $data['kodeku'] = 'ada';
        } else {
            $data = [
                'harga_jual' => '',
                'hg_reseller1' => '',
                'hg_reseller2' => '',
                'hg_reseller3' => '',
                'hg_reseller4' => '',
                'stok' => '',
                'kodeku' => 'tidak',
            ];
        }

        echo json_encode($data);
    }

    public function add_list()
    {
        $id_barang = $this->input->post('id_barang');
        $barang = $this->db->get_where('barang', ['id' => $id_barang])->row_array();

        $qty = $this->input->post('jumlah');
        $hg_jual = $this->input->post('hg_satuan');
        $hg_beli = $barang['harga_beli'];
        $hg_total_beli = $hg_beli * $qty;
        $laba_satuan = $hg_jual - $hg_beli;
        $laba_total = $laba_satuan * $qty;

        $data_input = [
            'id_penjualan' => $this->input->post('id_penjualan'),
            'id_barang' => $this->input->post('id_barang'),
            'no_penjualan' => $this->input->post('no_penjualan'),
            'kode_barang' => $barang['kode_barang'],
            'nama_barang' => $barang['nama_barang'],
            'jumlah' => $this->input->post('jumlah'),
            'hg_beli' => $barang['harga_beli'],
            'hg_total_beli' => $hg_total_beli,
            'hg_satuan' => $this->input->post('hg_satuan'),
            'hg_total' => $this->input->post('hg_total'),
            'laba_total' => $laba_total,
        ];
        $this->db->insert('penjualan_detail', $data_input);
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
                    <td>' . $data->kode_barang . '</td>
                    <td>' . $data->nama_barang . '</td>
                    <td>' . $data->jumlah . '</td>
                    <td>Rp. ' . number_format($data->hg_satuan, 0, ',', '.') . '</td>
                    <td>Rp. ' . number_format($data->hg_total, 0, ',', '.') . '</td>
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
        $result_total = $this->db->query("SELECT sum(hg_total) as grand_total, sum(laba_total) as grand_laba, sum(hg_total_beli) as grand_beli FROM penjualan_detail WHERE id_penjualan = '$id_penjualan'")->row_array();

        if ($result_total['grand_total']) {
            $data_total['grand_total'] = $result_total['grand_total'];
            $data_total['grand_laba'] = $result_total['grand_laba'];
            $data_total['grand_beli'] = $result_total['grand_beli'];
        } else {
            $data_total['grand_total'] = '0';
            $data_total['grand_laba'] = '0';
            $data_total['grand_beli'] = '0';
        }

        echo json_encode($data_total);
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
        $grand_beli = $this->input->post('grand_beli');
        $grand_total = $this->input->post('grand_total');
        $grand_laba = $this->input->post('grand_laba');
        $jumlah_bayar = $this->input->post('jumlah_bayar');
        $jumlah_kembalian = $this->input->post('jumlah_kembalian');

        $data_update = [
            'grand_beli' => $grand_beli,
            'grand_total' => $grand_total,
            'grand_laba' => $grand_laba,
            'jumlah_bayar' => $jumlah_bayar,
            'jumlah_kembalian' => $jumlah_kembalian,
            'status' => 'Selesai',
        ];

        $this->db->where('id', $id_penjualan);
        $this->db->update('penjualan', $data_update);
    }
}
