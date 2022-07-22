<main class="content" style="padding: 10px;">
	<!-- <div class="container" style="padding: 0px;"> -->

	<h1 class="h3 mb-2 ml-3">Tagihan</h1>


	<div class="card">
		<div class="card-body" style="padding: 15px;">
			<?= $this->session->flashdata('pesan') ?>

			<?php
			date_default_timezone_set('Asia/Jakarta');
			$bulan_now = date('m');
			$tahun_now = date('Y');
			?>

			<div class="mb-5">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a href="#tab_belum_dibayar" class="nav-link active" data-toggle="tab" id="menu_belum_dibayar">
							<p class="mt-2 mb-2"> <b> Belum dibayar </b> </p>
						</a>
					</li>
					<li class="nav-item">
						<a href="#tab_lunas" class="nav-link" data-toggle="tab" id="menu_lunas">
							<p class="mt-2 mb-2"> <b> Sudah Lunas </b> </p>
						</a>
					</li>
				</ul>

				<div class="tab-content">

					<!-- TAB BELUM DIBAYAR -->
					<div class="tab-pane fade show active" id="tab_belum_dibayar">

						<div class="row mb-3 mt-3">
							<div class="col-sm-8">
								<h4 id="judul_tabel_belum_bayar">Tagihan Belum dibayar - Bulan <?= $bulan_now; ?> Tahun <?= $tahun_now; ?></h4>
							</div>
							<div class="col-md-4">
								<div class="input-group mb-3">
									<select class="form-select form-select-sm" id="bulan_belum_bayar">
										<option selected>Pilih Bulan</option>
										<option value="01">Januari</option>
										<option value="02">Februari</option>
										<option value="03">Maret</option>
										<option value="04">April</option>
										<option value="05">Mei</option>
										<option value="06">Juni</option>
										<option value="07">Juli</option>
										<option value="08">Agustus</option>
										<option value="09">September</option>
										<option value="10">Oktober</option>
										<option value="11">November</option>
										<option value="12">Desember</option>
									</select>
									<select class="form-select form-select-sm" id="tahun_belum_bayar">
										<option selected>Pilih Tahun</option>
										<option value="2022">2022</option>
									</select>
									<div class="input-group-append">
										<button class="btn btn-sm btn-info" onclick="table_searching_belum_bayar()"><i class="fas fa-search"></i> Cari</button>
									</div>
								</div>
							</div>
						</div>

						<div id="div_belum_dibayar">
							<div class="table-responsive" id="table_belum_bayar">
								<table class="table table-bordered table-striped" style="border: solid 1px #E5E8E8; white-space: nowrap" id="dataTable_belum_bayar" style="table-layout: auto; width:100%">
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
									<tbody>
										<?php $no = 1;
										foreach ($data_belum_bayar as $bb) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $bb->no_penjualan ?></td>
												<td><?= $bb->suplier ?></td>
												<td><?= $bb->produk ?></td>
												<td><?= $bb->qty ?></td>
												<td>Rp. <?= number_format($bb->hg_beli, 0, ',', '.') ?></td>
												<td>Rp. <?= number_format($bb->hg_total_beli, 0, ',', '.') ?></td>
												<td class="text-center">
													<button class="badge btn-primary" onclick="detail(<?= $bb->id ?>)">Detail</button>
													<button class="badge btn-success" onclick="bayar(<?= $bb->id ?>)">Bayar</button>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>

						<div id="div_belum_dibayar_search"></div>

					</div>
					<!-- TAB BELUM DIBAYAR -->



					<!-- TAB LUNAS -->
					<div class="tab-pane fade" id="tab_lunas">

						<div class="row mb-3 mt-3">
							<div class="col-sm-8">
								<h4 id="judul_tabel_lunas">Tagihan Sudah Lunas - Bulan <?= $bulan_now; ?> Tahun <?= $tahun_now; ?></h4>
							</div>

							<div class="col-md-4">
								<div class="input-group mb-3">
									<select class="form-select form-select-sm" id="bulan_lunas">
										<option selected>Pilih Bulan</option>
										<option value="01">Januari</option>
										<option value="02">Februari</option>
										<option value="03">Maret</option>
										<option value="04">April</option>
										<option value="05">Mei</option>
										<option value="06">Juni</option>
										<option value="07">Juli</option>
										<option value="08">Agustus</option>
										<option value="09">September</option>
										<option value="10">Oktober</option>
										<option value="11">November</option>
										<option value="12">Desember</option>
									</select>
									<select class="form-select form-select-sm" id="tahun_lunas">
										<option selected>Pilih Tahun</option>
										<option value="2022">2022</option>
									</select>
									<div class="input-group-append">
										<button class="btn btn-sm btn-info" onclick="table_searching_lunas()"><i class="fas fa-search"></i> Cari</button>
									</div>
								</div>
							</div>
						</div>

						<div id="div_lunas">
							<div class="table-responsive" id="table_lunas">
								<table class="table table-bordered table-striped" style="border: solid 1px #E5E8E8; white-space: nowrap" id="dataTable_lunas" style="table-layout: auto; width:100%">
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
									<tbody>
										<?php $no = 1;
										foreach ($data_lunas as $lns) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $lns->no_penjualan ?></td>
												<td><?= $lns->suplier ?></td>
												<td><?= $lns->produk ?></td>
												<td><?= $lns->qty ?></td>
												<td>Rp. <?= number_format($lns->hg_beli, 0, ',', '.') ?></td>
												<td>Rp. <?= number_format($lns->hg_total_beli, 0, ',', '.') ?></td>
												<td class="text-center">
													<button class="badge btn-primary" onclick="detail(<?= $lns->id ?>)">Detail</button>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>

						<div id="div_lunas_search"></div>

					</div>
					<!-- TAB LUNAS -->

				</div>
			</div>

		</div>
	</div>

	<!-- </div> -->
</main>


<script>
	$(document).ready(function() {
		$('#dataTable_belum_bayar').dataTable();
		$('#dataTable_lunas').dataTable();

		// mengakali biar width colom table ketika load langsung jalan
		$('.width_no').attr('style', 'color: black');
		$('.width_nota').attr('style', 'color: black');
		$('.width_suplier').attr('style', 'color: black');
		$('.width_produk').attr('style', 'color: black');
		$('.width_qty').attr('style', 'color: black');
		$('.width_satuan').attr('style', 'color: black');
		$('.width_total').attr('style', 'color: black');
		$('.width_aksi').attr('style', 'color: black');
	})

	function table_searching_belum_bayar() {
		let bulan = $('#bulan_belum_bayar').val();
		let tahun = $('#tahun_belum_bayar').val();
		$.ajax({
			type: "post",
			url: "<?= base_url() ?>tagihan/get_search_belum_bayar",
			data: "&bulan=" + bulan + "&tahun=" + tahun,
			success: function(html) {
				$('#div_belum_dibayar').hide();
				$('#div_belum_dibayar_search').attr('hidden', false);
				$('#div_belum_dibayar_search').html(html);
				$('#dataTable_belum_bayar_search').dataTable();
				$('#judul_tabel_belum_bayar').html('Tagihan Belum dibayar - Bulan ' + bulan + ' Tahun ' + tahun)
			}
		});
	}

	function table_searching_lunas() {
		let bulan = $('#bulan_lunas').val();
		let tahun = $('#tahun_lunas').val();
		$.ajax({
			type: "post",
			url: "<?= base_url() ?>tagihan/get_search_lunas",
			data: "&bulan=" + bulan + "&tahun=" + tahun,
			success: function(html) {
				$('#div_lunas').hide();
				$('#div_lunas_search').attr('hidden', false);
				$('#div_lunas_search').html(html);
				$('#dataTable_lunas_search').dataTable();
				$('#judul_tabel_lunas').html('Tagihan Sudah Lunas - Bulan ' + bulan + ' Tahun ' + tahun)
			}
		});
	}
</script>
