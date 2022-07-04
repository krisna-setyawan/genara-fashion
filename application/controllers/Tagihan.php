<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
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

        date_default_timezone_set('Asia/Jakarta');
        $month = date('m');
        $year = date('Y');

        $q_bb = "SELECT penjualan_detail.*, produk.nama_produk as produk, suplier.nama as suplier, 
        penjualan.no_penjualan FROM penjualan_detail
        LEFT JOIN produk ON penjualan_detail.id_produk = produk.id
        LEFT JOIN suplier ON penjualan_detail.id_suplier = suplier.id
        LEFT JOIN penjualan ON penjualan_detail.id_penjualan = penjualan.id
        WHERE month(penjualan.tanggal) = $month AND year(penjualan.tanggal) = $year 
        AND penjualan_detail.status_tagihan = 'Belum dibayar'
        ORDER BY penjualan.tanggal DESC";
        $data['data_belum_bayar'] = $this->db->query($q_bb)->result();

        $q_lns = "SELECT penjualan_detail.*, produk.nama_produk as produk, suplier.nama as suplier, 
        penjualan.no_penjualan FROM penjualan_detail
        LEFT JOIN produk ON penjualan_detail.id_produk = produk.id
        LEFT JOIN suplier ON penjualan_detail.id_suplier = suplier.id
        LEFT JOIN penjualan ON penjualan_detail.id_penjualan = penjualan.id
        WHERE month(penjualan.tanggal) = $month AND year(penjualan.tanggal) = $year 
        AND penjualan_detail.status_tagihan = 'Lunas'
        ORDER BY penjualan.tanggal DESC";
        $data['data_lunas'] = $this->db->query($q_lns)->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_tagihan/tagihan', $data);
        $this->load->view('templates/footer');
    }

    public function get_search_perbulan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $query_perbulan = "SELECT register_layanan_ri.*, master_kamar.nama_kamar as kamar, master_paviliun.nama_paviliun as paviliun, 
        register_daftar_ri.tanggal as tgl_mrs FROM register_layanan_ri 
        JOIN master_kamar ON register_layanan_ri.id_kamar = master_kamar.id 
        JOIN master_paviliun ON register_layanan_ri.id_paviliun = master_paviliun.id 
        JOIN register_daftar_ri ON register_layanan_ri.id_reg_ri = register_daftar_ri.id 
        WHERE month(tgl_krs) = $bulan AND year(tanggal) = $tahun ORDER BY register_layanan_ri.no_reg_ri ASC";

        $data_perbulan = $this->db->query($query_perbulan)->result();

        echo '
        <div class="table-responsive" id="table_perbulan">
            <table class="table table-bordered" id="dataTable-search_perbulan" style="table-layout: auto; width:100%">
                <thead>
                    <tr class="text-center">
                        <th class="width_no" width="5%">No</th>
                        <th class="width_mrs" width="9%">Tgl MRS</th>
                        <th class="width_krs" width="9%">Tgl KRS</th>
                        <th class="width_ri" width="8%">Reg RI</th>
                        <th class="width_rm" width="9%">No RM</th>
                        <th class="width_nama" width="24%">Nama Pasien</th>
                        <th class="width_jk" width="9%">P/L</th>
                        <th class="width_paviliun" width="9%">Paviliun</th>
                        <th class="width_keadaan" width="10%">Keadaan</th>
                        <th class="width_aksi" class="text-center" width="8%">Aksi</th>
                    </tr>
                </thead>
                <tbody>';
        $no = 1;
        foreach ($data_perbulan as $bulan) {
            echo '
                        <tr>
                            <td>' . $no++ . '</td>
                            <td>' . $bulan->tgl_mrs . '</td>
                            <td>' . $bulan->tgl_krs . '</td>
                            <td>' . $bulan->no_reg_ri . '</td>
                            <td>' . $bulan->no_rm . '</td>
                            <td>' . $bulan->nama_pasien . '</td>
                            <td>' . $bulan->jk_pasien . '</td>
                            <td>' . $bulan->paviliun . '</td>
                            <td>' . $bulan->keadaan_krs . '</td>
                            <td class="text-center">
                                <button class="badge btn-primary" onclick="detail(' . $bulan->id_reg_ri . ')">Detail</button>
                            </td>
                        </tr>
                        ';
        }
        echo '
                </tbody>
            </table>
        </div>
        ';
    }
}
