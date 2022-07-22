<main class="content" style="padding: 10px;">
	<!-- <div class="container" style="padding: 0px;"> -->

	<h1 class="h3 mb-2 ml-3">Data Kecamatan</h1>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body" style="padding: 15px;">

					<?= $this->session->flashdata('pesan') ?>

					<button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#modal-tambah-kecamatan">Tambah Kecamatan</button>

					<div class="table-responsive">
						<table class="table table-bordered table-striped" style="border: solid 1px #E5E8E8; white-space: nowrap" id="dataTable" width="100%">
							<thead>
								<tr class="text-center">
									<th width="5%">No</th>
									<th width="40%">Kecamatan</th>
									<th width="40%">Kota</th>
									<th width="15%">Aksi</th>
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

<!-- Modal add kecamatan -->
<div class="modal fade" id="modal-tambah-kecamatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kecamatan</h5>
				<button type="button" onclick="batal_tambah()" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" novalidate autocomplete="off" id="form_tambah" method="POST" action="<?= base_url() ?>kecamatan/add_kecamatan_aksi">
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
						<label class="col-sm-3 col-form-label">Nama Kecamatan</label>
						<div class="col-sm-9">
							<input type="text" class="form-control form-control-lg" id="nama_kecamatan" name="nama_kecamatan" required>
							<div class="invalid-feedback">Nama kecamatan harus diisi.</div>
						</div>
					</div>
					<div class="row mt-5 mb-4 justify-content-center">
						<div class="col-md-3 mb-3">
							<button type="button" class="btn btn-block btn-danger" data-dismiss="modal" onclick="batal_tambah()">Batal</button>
						</div>
						<div class="col-md-3 mb-3">
							<button type="submit" class="btn btn-block btn-primary">Simpan</button>
						</div>
					</div>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal edit kecamatan -->
<div class="modal fade" id="modal-edit-kecamatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Kecamatan</h5>
				<button type="button" onclick="batal_edit()" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" novalidate autocomplete="off" id="form_edit" method="POST" action="<?= base_url() ?>kecamatan/edit_kecamatan_aksi">
					<input type="hidden" name="edit_id" id="edit_id">
					<div class="form-group row mb-3">
						<label class="col-sm-3 col-form-label">Provinsi</label>
						<div class="col-sm-9">
							<select class="custom-select form-control" id="edit_id_provinsi" name="edit_id_provinsi" required>
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
							<select class="custom-select form-control" id="edit_id_kota" name="edit_id_kota" required>
								<option selected value="">-- Pilih Provinsi Dulu --</option>
							</select>
							<div class="invalid-feedback">Kota harus diisi.</div>
						</div>
					</div>
					<div class="form-group row mb-3">
						<label class="col-sm-3 col-form-label">Nama Kecamatan</label>
						<div class="col-sm-9">
							<input type="text" class="form-control form-control-lg" id="edit_nama_kecamatan" name="edit_nama_kecamatan" required>
							<div class="invalid-feedback">Nama kecamatan harus diisi.</div>
						</div>
					</div>
					<div class="row mt-5 mb-4 justify-content-center">
						<div class="col-md-3 mb-3">
							<button type="button" class="btn btn-block btn-danger" data-dismiss="modal" onclick="batal_edit()">Batal</button>
						</div>
						<div class="col-md-3 mb-3">
							<button type="submit" class="btn btn-block btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function() {
				$(this).remove();
			});
		}, 3000);

		var table = $('#dataTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				"url": "<?= base_url('kecamatan/get_ajax') ?>",
				"type": "POST",
			},
			columnDefs: [{
				"targets": [3],
				"className": 'text-center'
			}, {
				"targets": [1, 2],
				"orderable": true,
				"targets": [0, 3],
				"orderable": false,
			}],
		})

		$('#id_provinsi').change(function() {
			let id_provinsi = $(this).val();
			if (id_provinsi != "") {
				$.ajax({
					type: 'post',
					url: '<?= base_url('kecamatan/get_kota_by_prov') ?>',
					data: '&id_provinsi=' + id_provinsi,
					success: function(html) {
						$('#id_kota').html(html);
					}
				})
			} else {
				$('#id_kota').html('<option selected value="">-- Pilih Provinsi Dulu --</option>');
			}
		})

		$('#edit_id_provinsi').change(function() {
			let id_provinsi = $(this).val();
			if (id_provinsi != "") {
				$.ajax({
					type: 'post',
					url: '<?= base_url('kecamatan/get_kota_by_prov') ?>',
					data: '&id_provinsi=' + id_provinsi,
					success: function(html) {
						$('#edit_id_kota').html(html);
					}
				})
			} else {
				$('#edit_id_kota').html('<option selected value="">-- Pilih Provinsi Dulu --</option>');
			}
		})
	});





	// ADD DATA ----------------------------------------------------------------------------------- ADD DATA
	function batal_tambah() {
		$('#id_provinsi').val("");
		$('#id_kota').html("<option selected value=''>-- Pilih Provinsi Dulu --</option>");
		$('#nama_kecamatan').val("");
		$('#form_tambah').removeClass('was-validated')
	}
	// ADD DATA ----------------------------------------------------------------------------------- ADD DATA





	// EDIT DATA ----------------------------------------------------------------------------------- EDIT DATA
	function batal_edit() {
		$('#edit_id_provinsi').val("");
		$('#edit_id_kota').html("<option selected value=''>-- Pilih Provinsi Dulu --</option>");
		$('#edit_nama_kecamatan').val("");
		$('#form_edit').removeClass('was-validated')
	}

	function edit(id) {
		$.ajax({
			type: "GET",
			url: "<?= base_url() ?>kecamatan/getKecamatanById/" + id,
			dataType: 'JSON',
			success: function(response) {
				$('#edit_id').val(response.id_kecamatan);
				$('#edit_nama_kecamatan').val(response.nama_kecamatan);
				$('#modal-edit-kecamatan').modal('toggle');
			}
		})
	}
	// EDIT DATA ----------------------------------------------------------------------------------- EDIT DATA





	// HAPUS DATA ----------------------------------------------------------------------------------- HAPUS DATA
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
				window.location.href = '<?= base_url() ?>kecamatan/hapus_kecamatan/' + id;
			}
		})
	}
	// HAPUS DATA ----------------------------------------------------------------------------------- HAPUS DATA
</script>
