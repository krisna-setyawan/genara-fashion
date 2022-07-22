<body onload="load_data_penjualan('<?= $penjualan['id'] ?>')"></body>
<main class="content" style="padding: 10px;">
	<!-- <div class="container" style="padding: 0px;"> -->

	<h1 class="h3 mb-2 ml-3">Transaksi Penjualan</h1>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body" style="padding: 15px;">

					<input type="hidden" id="id_penjualan" name="id_penjualan" value="<?= $penjualan['id'] ?>">
					<input type="hidden" id="grand_total" name="grand_total">

					<div class="row">
						<div class="col-lg-6 mb-4">
							<table style="width: 100%; font-size: 17px;">
								<tr>
									<td width="40%">Jenis Penjualan</td>
									<td width="5%">:</td>
									<td width="55%"><b> <?= $penjualan['jenis_penjualan'] ?> </b></td>
								</tr>
								<tr>
									<td>Tanggal</td>
									<td>:</td>
									<td><b> <?= $penjualan['tanggal'] ?> </b></td>
								</tr>
								<tr>
									<td>Nomor Penjualan</td>
									<td>:</td>
									<td><b> <?= $penjualan['no_penjualan'] ?> </b></td>
								</tr>
								<tr>
									<td>Nama Pembeli</td>
									<td>:</td>
									<td><b> <?= $penjualan['nama_pembeli'] ?> </b></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>:</td>
									<td><b> <?= $penjualan['alamat_lengkap'] ?> </b></td>
								</tr>
								<tr>
									<td>Nomor Telepon</td>
									<td>:</td>
									<td><b> <?= $penjualan['no_telp_pembeli'] ?> </b></td>
								</tr>
							</table>
						</div>

						<div class="col-lg-6">
							<div class="input-group input-group-lg mb-2 mr-sm-2">
								<div class="input-group-text"><b>Produk</b></div>
								<input autocomplete="off" list="datalist_produk" class="form-control" id="nama_produk" name="nama_produk">
								<datalist id="datalist_produk">
									<?php foreach ($produk as $pd) { ?>
										<option value="<?= $pd->kode_produk ?> - <?= $pd->nama_produk ?>"></option>
									<?php } ?>
								</datalist>
							</div>
							<div class="input-group input-group-lg mb-2 mr-sm-2">
								<div class="input-group-text"><b>QTY</b></div>
								<input autocomplete="off" type="text" class="form-control" id="qty" name="qty" onkeypress="return hanyaAngka(event)" maxlength="6">
							</div>

							<div class="py-1 px-2 mb-3" style="border: grey solid 1px; border-radius: 5px;">
								<input type="hidden" id="var_id_produk">
								<input type="hidden" id="var_hpp_produk">
								<input type="hidden" id="var_hpp_sablon">
								<input type="hidden" id="var_harga_jual">
								<input type="hidden" id="var_total_harga">

								<table style="width: 100%;">
									<tr>
										<td width="35%">HPP Produk</td>
										<td width="5%">:</td>
										<td width="60%" id="text_hpp_produk"></td>
									</tr>
									<tr>
										<td>HPP Sablon</td>
										<td>:</td>
										<td id="text_hpp_sablon"></td>
									</tr>
									<tr>
										<td>Harga Jual</td>
										<td>:</td>
										<td id="text_harga_jual"></td>
									</tr>
									<tr>
										<td>Total Harga</td>
										<td>:</td>
										<td id="text_total_harga"></td>
									</tr>
								</table>
							</div>

							<button onclick="validasi_add_list_penjualan()" class="btn btn-lg btn-block btn-primary">Tambahkan Produk</button>
						</div>
					</div>

					<hr class="my-4">

					<div class="table-responsive mt-3">
						<table class="table table-hover table-success table-bordered table-striped" style="white-space: nowrap" id="dataTable" width="100%">
							<thead>
								<tr class="text-center" style="vertical-align: middle;">
									<th width="5%">No</th>
									<th width="10%">Kode</th>
									<th width="37%">Nama Produk</th>
									<th width="10%">Qty</th>
									<th width="15%">HPP <br> Produk + Sablon</th>
									<th width="15%">Total</th>
									<th width="8%">Aksi</th>
								</tr>
							</thead>
							<tbody id="list_data_penjualan">

							</tbody>
							<tr>
								<td colspan="5" style="font-size: larger; text-align: right; padding-right: 5%;"> <b> Grand Total </b> </td>
								<td colspan="2" id="text_grand_total" style="font-size: larger;"></td>
							</tr>
						</table>
					</div>

					<hr>

					<div class="row justify-content-end mt-4">
						<div class="col-md-6">
							<button onclick="validasi_simpan_penjualan(<?= $penjualan['id'] ?>)" class="btn btn-lg btn-block btn-success">Simpan Penjualan</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- </div> -->
</main>

<!-- Modal detail penjualan -->
<div class="modal fade" id="modal-detail-penjualan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Penjualan</h5>
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
						<br>
						<br>
						<a href="<?= base_url() ?>penjualan" class="btn btn-success">
							Selesai
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function load_data_penjualan(id_penjualan) {
		$.ajax({
			type: 'post',
			url: '<?= base_url() ?>penjualan/load_data_penjualan',
			data: '&id_penjualan=' + id_penjualan,
			success: function(html) {
				$('#list_data_penjualan').html(html);
			}
		})
		$.ajax({
			type: 'post',
			url: '<?= base_url() ?>penjualan/load_grand_total',
			data: '&id_penjualan=' + id_penjualan,
			dataType: 'JSON',
			success: function(data) {
				let g_total = format_rupiah(data.grand_total);
				$('#text_grand_total').html('<b> Rp. ' + g_total + '</b>');
				$('#grand_total').val(data.grand_total);
			}
		})
	}

	$("#nama_produk").change(function() {
		let nm_produk = $(this).val();
		if (nm_produk != '') {
			$.ajax({
				url: "<?= base_url() ?>penjualan/get_produk_autocomplete",
				type: "post",
				data: "&nm_produk=" + nm_produk,
				dataType: 'JSON',
				success: function(data) {
					if (data.kodeku == 'ada') {
						$('#var_id_produk').val(data.id_produk);
						$('#var_hpp_produk').val(data.hpp_produk);
						$('#var_hpp_sablon').val(data.hpp_sablon);
						$('#var_harga_jual').val(data.harga_jual);
						$('#text_hpp_produk').html(format_rupiah(data.hpp_produk));
						$('#text_hpp_sablon').html(format_rupiah(data.hpp_sablon));
						$('#text_harga_jual').html(format_rupiah(data.harga_jual));
						$('#text_total_harga').html('');
						$('#qty').val('');
					} else {
						$('#var_id_produk').val('');
						$('#var_hpp_produk').val('');
						$('#var_hpp_sablon').val('');
						$('#var_harga_jual').val('');
						$('#text_hpp_produk').html('');
						$('#text_hpp_sablon').html('');
						$('#text_harga_jual').html('');
						$('#text_total_harga').html('');
						$('#qty').val('');
					}
				}
			});
		} else {
			$('#text_hpp_produk').html('');
			$('#text_hpp_sablon').html('');
			$('#text_harga_jual').html('');
			$('#text_total_harga').html('');
			$('#qty').val('');
		}
	})

	$("#qty").change(function() {
		let qty = $(this).val();
		let harga_jual = $('#var_harga_jual').val();

		if (qty != 0) {
			let total_harga = qty * harga_jual;
			$('#text_total_harga').html(format_rupiah(total_harga));
			$('#var_total_harga').val(total_harga);
		} else {
			Swal.fire({
				icon: 'error',
				title: 'Gagal...',
				text: 'Jumlah barang yang dibeli tidak bisa 0!',
			})
			$('#total_harga').html('');
			$('#var_total_harga').val('');
		}
	})





	// TAMBAH LIST HAPUS LIST
	function tambahListBarang() {
		let id_penjualan = $('#id_penjualan').val();
		$.ajax({
			type: 'post',
			url: '<?= base_url() ?>penjualan/add_list',
			data: '&id_penjualan=' + $('#id_penjualan').val() +
				'&id_produk=' + $('#var_id_produk').val() +
				'&qty=' + $('#qty').val(),
			success: function() {
				Swal.fire(
					'Berhasil!',
					'Berhasil menambah barang !',
					'success'
				)
				$('#qty').val('');
				$('#nama_produk').val('');

				$('#var_id_produk').val('');
				$('#var_hpp_produk').val('');
				$('#var_hpp_sablon').val('');
				$('#var_harga_jual').val('');

				$('#text_hpp_produk').html('');
				$('#text_hpp_sablon').html('');
				$('#text_harga_jual').html('');
				$('#text_total_harga').html('');

				load_data_penjualan(id_penjualan);
			}
		})
	}

	function hapus_list(id_detail) {
		let id_penjualan = $('#id_penjualan').val();
		$.ajax({
			type: 'post',
			url: '<?= base_url() ?>penjualan/delete_list',
			data: '&id_detail=' + id_detail,
			success: function() {
				Swal.fire(
					'Berhasil!',
					'Berhasil menghapus barang !',
					'success'
				)
				load_data_penjualan(id_penjualan);
			}
		})
	}





	// SIMPAN PENJUALAN
	function validasi_simpan_penjualan(id_penjualan) {
		$.ajax({
			url: "<?= base_url() ?>penjualan/validasi_simpan_jual",
			type: "post",
			data: "&id_penjualan=" + id_penjualan,
			dataType: 'JSON',
			success: function(data) {
				if (data.kodeku == 'ada') {
					simpan_penjualan(id_penjualan);
				} else {
					Swal.fire(
						'Maaf...',
						'Anda belum menambahkan daftar Produk apapun !',
						'error'
					)
				}
			}
		});
	}

	function simpan_penjualan(id_penjualan) {
		var grand_total = $('#grand_total').val();

		$.ajax({
			type: 'post',
			url: '<?= base_url() ?>penjualan/simpan_penjualan',
			data: '&id_penjualan=' + id_penjualan +
				'&grand_total=' + grand_total,
			success: function() {
				Swal.fire({
					icon: 'success',
					title: 'Berhasil!',
					text: 'Berhasil simpan transaksi penjualan !',
					allowOutsideClick: false,
					allowEscapeKey: false
				}).then(function() {
					detail(id_penjualan);
				});;
			}
		})
	}





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
