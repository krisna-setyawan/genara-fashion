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

	public function get_search_belum_bayar()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$q_bb = "SELECT penjualan_detail.*, produk.nama_produk as produk, suplier.nama as suplier, 
        penjualan.no_penjualan FROM penjualan_detail
        LEFT JOIN produk ON penjualan_detail.id_produk = produk.id
        LEFT JOIN suplier ON penjualan_detail.id_suplier = suplier.id
        LEFT JOIN penjualan ON penjualan_detail.id_penjualan = penjualan.id
        WHERE month(penjualan.tanggal) = $bulan AND year(penjualan.tanggal) = $tahun 
        AND penjualan_detail.status_tagihan = 'Belum dibayar'
        ORDER BY penjualan.tanggal DESC";

		$data_belum_bayar = $this->db->query($q_bb)->result();

		echo '
        <div class="table-responsive" id="table_belum_bayar">
			<table class="table table-bordered table-striped" style="border: solid 1px #E5E8E8; white-space: nowrap" id="dataTable_belum_bayar_search" style="table-layout: auto; width:100%">
				<thead>
                    <tr class="text-center">
						<th class="width_no" width="5%">No</th>
						<th class="width_nota" width="10%">Nota</th>
						<th class="width_suplier" width="20%">Suplier</th>
						<th class="width_produk" width="20%">Produk</th>
						<th class="width_qty" width="5%">Qty</th>
						<th class="width_satuan" width="13%">Hg Satuan</th>
						<th class="width_total" width="13%">Total Hg</th>
						<th class="width_aksi" class="text-center" width="14%">Aksi</th>
                    </tr>
                </thead>
                <tbody>';
		$no = 1;
		foreach ($data_belum_bayar as $bb) {
			echo '
				<tr>
					<td>' . $no++ . '</td>
					<td>' . $bb->no_penjualan . '</td>
					<td>' . $bb->suplier . '</td>
					<td>' . $bb->produk . '</td>
					<td>' . $bb->qty . '</td>
					<td>Rp. ' . number_format($bb->hg_beli, 0, ',', '.') . '</td>
					<td>Rp. ' . number_format($bb->hg_total_beli, 0, ',', '.') . '</td>
					<td class="text-center">
						<button class="badge btn-primary" onclick="detail(' . $bb->id . ')">Detail</button>
						<button class="badge btn-success" onclick="bayar(' . $bb->id . ')">Bayar</button>
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

	public function get_search_lunas()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$q_lns = "SELECT penjualan_detail.*, produk.nama_produk as produk, suplier.nama as suplier, 
        penjualan.no_penjualan FROM penjualan_detail
        LEFT JOIN produk ON penjualan_detail.id_produk = produk.id
        LEFT JOIN suplier ON penjualan_detail.id_suplier = suplier.id
        LEFT JOIN penjualan ON penjualan_detail.id_penjualan = penjualan.id
        WHERE month(penjualan.tanggal) = $bulan AND year(penjualan.tanggal) = $tahun 
        AND penjualan_detail.status_tagihan = 'Lunas'
        ORDER BY penjualan.tanggal DESC";

		$data_lunas = $this->db->query($q_lns)->result();

		echo '
        <div class="table-responsive" id="table_lunas">
			<table class="table table-bordered table-striped" style="border: solid 1px #E5E8E8; white-space: nowrap" id="dataTable_lunas_search" style="table-layout: auto; width:100%">
				<thead>
                    <tr class="text-center">
						<th class="width_no" width="5%">No</th>
						<th class="width_nota" width="10%">Nota</th>
						<th class="width_suplier" width="20%">Suplier</th>
						<th class="width_produk" width="20%">Produk</th>
						<th class="width_qty" width="5%">Qty</th>
						<th class="width_satuan" width="13%">Hg Satuan</th>
						<th class="width_total" width="13%">Total Hg</th>
						<th class="width_aksi" class="text-center" width="14%">Aksi</th>
                    </tr>
                </thead>
                <tbody>';
		$no = 1;
		foreach ($data_lunas as $lns) {
			echo '
				<tr>
					<td>' . $no++ . '</td>
					<td>' . $lns->no_penjualan . '</td>
					<td>' . $lns->suplier . '</td>
					<td>' . $lns->produk . '</td>
					<td>' . $lns->qty . '</td>
					<td>Rp. ' . number_format($lns->hg_beli, 0, ',', '.') . '</td>
					<td>Rp. ' . number_format($lns->hg_total_beli, 0, ',', '.') . '</td>
					<td class="text-center">
						<button class="badge btn-primary" onclick="detail(' . $lns->id . ')">Detail</button>
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
