<main class="content" style="padding: 10px;">
	<!-- <div class="container" style="padding: 0px;"> -->

	<h1 class="h3 mb-2 ml-3">Data Penjualan</h1>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body" style="padding: 15px;">

					<?= $this->session->flashdata('pesan') ?>

					<button class="btn btn-sm btn-success mb-3" id="btn-add-penjualan">Tambah Penjualan</button>

					<div class="table-responsive">
						<table class="table table-bordered table-striped" style="border: solid 1px #E5E8E8; white-space: nowrap" id="dataTable" width="100%">
							<thead>
								<tr class="text-center">
									<th width="4%">No</th>
									<th width="11%">Nomor</th>
									<th width="10%">Tanggal</th>
									<th width="10%">Jenis</th>
									<th width="29%">Nama Pembeli</th>
									<th width="13%">Total</th>
									<th width="10%">Status</th>
									<th width="13%">Aksi</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- </div> -->
</main>

<!-- Modal add penjualan -->
<div class="modal fade" id="modal-tambah-penjualan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Penjualan</h5>
				<button type="button" onclick="batal_tambah()" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" novalidate autocomplete="off" id="form_tambah" method="POST" action="<?= base_url() ?>penjualan/add_penjualan_aksi">
					<div class="form-group row mb-3">
						<label class="col-sm-3 col-form-label">No Penjualan</label>
						<div class="col-sm-9">
							<input readonly type="text" class="form-control form-control-lg" id="no_penjualan" name="no_penjualan" required>
							<div class="invalid-feedback">No Penjualan harus diisi.</div>
						</div>
					</div>
					<div class="form-group row mb-3">
						<label class="col-sm-3 col-form-label">Pilih Jenis Penjualan</label>
						<div class="col-sm-9">
							<select class="custom-select form-control" id="jenis_penjualan" name="jenis_penjualan" required>
								<option value="" selected>-- Jenis Penjualan --</option>
								<option value="Tokopedia">Tokopedia</option>
								<option value="Shopee">Shopee</option>
								<option value="Facebook">Facebook</option>
								<option value="COD">COD</option>
							</select>
							<div class="invalid-feedback">Jenis Penjualan harus diisi.</div>
						</div>
					</div>

					<div class="form-group row mb-3">
						<label class="col-sm-3 col-form-label">Nama Pembeli</label>
						<div class="col-sm-9">
							<input type="text" class="form-control form-control-lg" id="nama_pembeli" name="nama_pembeli" required>
							<div class="invalid-feedback">Nama Pembeli harus diisi.</div>
						</div>
					</div>
					<div class="form-group row mb-3">
						<label class="col-sm-3 col-form-label">Provinsi</label>
						<div class="col-sm-9">
							<select class="custom-select form-control" id="id_provinsi" name="id_provinsi" required>
								<option value="" selected>-- Pilih Provinsi --</option>
								<?php foreach ($provinsi as $pr) : ?>
									<option value="<?= $pr->id_provinsi ?>"><?= $pr->nama_provinsi ?></option>
								<?php endforeach; ?>
							</select>
							<div class="invalid-feedback">Provinsi harus diisi.</div>
						</div>
					</div>
					<div class="form-group row mb-3">
						<label class="col-sm-3 col-form-label">Kota</label>
						<div class="col-sm-9">
							<select class="custom-select form-control" id="id_kota" name="id_kota" required>
								<option selected value="">-- Pilih Provinsi Dulu --</option>
							</select>
							<div class="invalid-feedback">Kota harus diisi.</div>
						</div>
					</div>
					<div class="form-group row mb-3">
						<label class="col-sm-3 col-form-label">Kecamatan</label>
						<div class="col-sm-9">
							<select class="custom-select form-control" id="id_kecamatan" name="id_kecamatan" required>
								<option selected value="">-- Pilih Provinsi Dulu --</option>
							</select>
							<div class="invalid-feedback">Kecamatan harus diisi.</div>
						</div>
					</div>
					<div class="form-group row mb-3">
						<label class="col-sm-3 col-form-label">Nama Kelurahan</label>
						<div class="col-sm-9">
							<select class="custom-select form-control" id="id_kelurahan" name="id_kelurahan" required>
								<option selected value="">-- Pilih Provinsi Dulu --</option>
							</select>
							<div class="invalid-feedback">Kelurahan harus diisi.</div>
						</div>
					</div>
					<div class="form-group row mb-3">
						<label class="col-sm-3 col-form-label">Alamat Pembeli</label>
						<div class="col-sm-9">
							<input type="text" class="form-control form-control-lg" id="alamat_pembeli_detail" name="alamat_pembeli_detail" required>
							<div class="invalid-feedback">Alamat Pembeli harus diisi.</div>
						</div>
					</div>
					<div class="form-group row mb-3">
						<label class="col-sm-3 col-form-label">No Telp Pembeli</label>
						<div class="col-sm-9">
							<input type="text" class="form-control form-control-lg" id="no_telp_pembeli" name="no_telp_pembeli" required>
							<div class="invalid-feedback">No Telp Pembeli harus diisi.</div>
						</div>
					</div>

					<div class="form-group row mb-3">
						<label class="col-sm-3 col-form-label">Tanggal Penjualan</label>
						<div class="col-sm-9">
							<input type="text" class="form-control form-control-lg" id="tanggal" name="tanggal" required>
							<div class="invalid-feedback">Tanggal Penjualan harus diisi.</div>
						</div>
					</div>
					<div class="row mt-5 mb-4 justify-content-center">
						<div class="col-md-3 mb-3">
							<button type="button" class="btn btn-block btn-danger" data-dismiss="modal" onclick="batal_tambah()">Batal</button>
						</div>
						<div class="col-md-3 mb-3">
							<button type="submit" class="btn btn-block btn-success">Lanjutkan</button>
						</div>
					</div>
			</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal detail penjualan -->
<div class="modal fade" id="modal-detail-penjualan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Penjualan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<strong style="font-size: 20px;"><?= $profil_toko['nama'] ?></strong>
							<p class="mb-2">
								<?= $profil_toko['keterangan'] ?>
								<br> <?= $profil_toko['alamat'] ?>
								<br> <?= $profil_toko['telepon'] ?>
							</p>
						</div>
						<div class="col-md-6 text-md-right">
							<div class="text-muted">Customer</div>
							<strong id="detail_nama_pembeli">Nama Pembeli</strong>
							<div class="text-muted" id="detail_alamat_lengkap" class="mb-2">Alamat Pembeli</div>
							<div class="text-muted" id="detail_no_telp_pembeli" class="mb-2">No Telp Pembeli</div>
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-md-12">
							<div class="text-muted">No Nota &nbsp; &nbsp; <strong id="detail_no_penjualan">210609001</strong> </div>
							<div class="text-muted">Tanggal &nbsp; &nbsp; <strong id="detail_tanggal">09 Juni 2021</strong> </div>
						</div>
					</div>

					<hr class="my-3" />

					<table class="table table-sm" width="100%">
						<thead>
							<tr>
								<th width="65%">Nama Barang</th>
								<th width="10%">QTY</th>
								<th width="10%" class="text-right">HPP</th>
								<th width="15%" class="text-right">Total</th>
							</tr>
						</thead>

						<tbody id="detail_list_barang">
						</tbody>

						<tr>
							<th colspan="3" class="text-right"> Total </th>
							<th class="text-right" id="detail_grand_total">Rp. 0</th>
						</tr>
					</table>

					<div class="text-center mt-5 mb-3">
						<a href="#" class="btn btn-secondary">
							Print Nota Penjualan
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal ubah status -->
<div class="modal fade" id="modal-status" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" novalidate autocomplete="off" id="form_update_status" method="POST" action="<?= base_url() ?>penjualan/update_status">
					<input type="hidden" id="update_status_id_penjualan" name="update_status_id_penjualan">
					<div class="form-group row mb-3">
						<label class="col-sm-3 col-form-label">Status Sekarang</label>
						<div class="col-sm-9">
							<select class="custom-select form-control" id="status_now" name="status_now" required>
								<option value="" selected>-- Pilih Status --</option>
								<option value="Otw">Otw</option>
								<option value="Selesai">Selesai</option>
								<option value="Retur">Retur</option>
								<option value="Batal">Batal</option>
							</select>
							<div class="invalid-feedback">Status harus diisi.</div>

						</div>
						<button type="submit" class="mt-4 btn btn-block btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		var table = $('#dataTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				"url": "<?= base_url('penjualan/get_data') ?>",
				"type": "POST",
			},
			// "order": [
			//     [1, "desc"]
			// ],

			"ordering": false,
			columnDefs: [{
				"targets": [6, 7],
				"className": 'text-center'
			}, {
				"targets": [0, 7],
				"orderable": false,
			}],
		})

		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function() {
				$(this).remove();
			});
		}, 3000);




		// DATEPICKER TANGGAL PEMBELIAN
		$('#tanggal').datetimepicker({
			datepicker: true,
			timepicker: false,
			format: 'Y-m-d',
			weeks: false,
			yearStart: 2000,
			yearEnd: 2030,
			scrollInput: false,
			scrollMonth: false,
		});




		// ADD PENJUALAN
		$('#btn-add-penjualan').click(function() {
			$.ajax({
				type: "GET",
				url: "<?= base_url() ?>penjualan/no_trx_auto",
				dataType: 'JSON',
				success: function(response) {
					$('#no_penjualan').val(response);
				}
			})
			$('#modal-tambah-penjualan').modal({
				backdrop: 'static',
				keyboard: false
			})
		})



		$('#id_provinsi').change(function() {
			let id_provinsi = $(this).val();
			if (id_provinsi != "") {
				$.ajax({
					type: 'post',
					url: '<?= base_url('penjualan/get_kota_by_prov') ?>',
					data: '&id_provinsi=' + id_provinsi,
					success: function(html) {
						$('#id_kota').html(html);
						$('#id_kecamatan').html('<option selected value="">-- Pilih Kota Dulu --</option>');
						$('#id_kelurahan').html('<option selected value="">-- Pilih Kota Dulu --</option>');
					}
				})
			} else {
				$('#id_kota').html('<option selected value="">-- Pilih Provinsi Dulu --</option>');
				$('#id_kecamatan').html('<option selected value="">-- Pilih Provinsi Dulu --</option>');
				$('#id_kelurahan').html('<option selected value="">-- Pilih Provinsi Dulu --</option>');
			}
		})



		$('#id_kota').change(function() {
			let id_kota = $(this).val();
			if (id_kota != "") {
				$.ajax({
					type: 'post',
					url: '<?= base_url('penjualan/get_kecamatan_by_kota') ?>',
					data: '&id_kota=' + id_kota,
					success: function(html) {
						$('#id_kecamatan').html(html);
						$('#id_kelurahan').html('<option selected value="">-- Pilih Kecamatan Dulu --</option>');
					}
				})
			} else {
				$('#id_kecamatan').html('<option selected value="">-- Pilih Kota Dulu --</option>');
				$('#id_kelurahan').html('<option selected value="">-- Pilih Kota Dulu --</option>');
			}
		})



		$('#id_kecamatan').change(function() {
			let id_kecamatan = $(this).val();
			if (id_kecamatan != "") {
				$.ajax({
					type: 'post',
					url: '<?= base_url('penjualan/get_kelurahan_by_kecamatan') ?>',
					data: '&id_kecamatan=' + id_kecamatan,
					success: function(html) {
						$('#id_kelurahan').html(html);
					}
				})
			} else {
				$('#id_kelurahan').html('<option selected value="">-- Pilih Kecamatan Dulu --</option>');
			}
		})
	})





	// ADD DATA PENJUALAN -------------------------------------------------------------------------- ADD DATA PENJUALAN
	function batal_tambah() {
		$('#jenis_penjualan').val("");
		$('#nama_pembeli').val("");
		$('#alamat_pembeli_detail').val("");
		$('#no_telp_pembeli').val("");
		$('#tanggal').val("");
		$('#form_tambah').removeClass('was-validated')
	}
	// ADD DATA PENJUALAN -------------------------------------------------------------------------- ADD DATA PENJUALAN





	// LIST TRANSAKSI PENJUALAN ------------------------------------------------------------------- LIST TRANSAKSI PENJUALAN
	function list(id) {
		window.location = '<?= base_url() ?>penjualan/list/' + id;
	}
	// LIST TRANSAKSI PENJUALAN ------------------------------------------------------------------- LIST TRANSAKSI PENJUALAN




	function status(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>penjualan/cek_status_penjualan",
			data: '&id_penjualan=' + id,
			dataType: 'JSON',
			success: function(data) {
				if (data.status == 'no') {
					Swal.fire(
						'Maaf...',
						'Status tagihan sudah dibayar. Status penjualan tidak bisa dirubah !',
						'error'
					)
				} else {
					$('#update_status_id_penjualan').val(id);
					$('#modal-status').modal('toggle');
				}
			}
		})
	}



	// HAPUS DATA PENJUALAN ------------------------------------------------------------------------- HAPUS DATA PENJUALAN
	function hapus(id) {
		Swal.fire({
			title: 'Yakin Mau Hapus?',
			text: "Data akan dihapus permanen!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#3085d6',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal',
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = '<?= base_url() ?>penjualan/hapus_penjualan/' + id;
			}
		})
	}
	// HAPUS DATA PENJUALAN ------------------------------------------------------------------------- HAPUS DATA PENJUALAN





	// DETAIL DATA PENJUALAN ------------------------------------------------------------------------- DETAIL DATA PENJUALAN
	function detail(id_penjualan) {
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>penjualan/get_detail",
			data: '&id_penjualan=' + id_penjualan,
			dataType: 'JSON',
			success: function(response) {
				$('#detail_nama_pembeli').html(response.nama_pembeli);
				$('#detail_alamat_lengkap').html(response.alamat_lengkap);
				$('#detail_no_telp_pembeli').html(response.no_telp_pembeli);
				$('#detail_no_penjualan').html(response.no_penjualan);
				$('#detail_tanggal').html(response.tanggal);
				$('#detail_grand_total').html('Rp. ' + format_rupiah(response.grand_total));
			}
		})
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>penjualan/get_detail_list",
			data: '&id_penjualan=' + id_penjualan,
			success: function(html) {
				$('#detail_list_barang').html(html);
			}
		})

		$('#modal-detail-penjualan').modal({
			backdrop: 'static',
			keyboard: false
		});
	}
	// DETAIL DATA PENJUALAN ------------------------------------------------------------------------- DETAIL DATA PENJUALAN
</script>
