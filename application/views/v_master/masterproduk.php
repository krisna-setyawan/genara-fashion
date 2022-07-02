<main class="content" style="padding: 10px;">
    <!-- <div class="container" style="padding: 0px;"> -->

    <h1 class="h3 mb-2 ml-3">Master Produk</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding: 15px;">

                    <?= $this->session->flashdata('pesan') ?>

                    <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#modal-tambah-produk">Tambah Produk</button>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" style="border: solid 1px #E5E8E8;white-space: nowrap" id="dataTable" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">No</th>
                                    <th width="10%">Kode</th>
                                    <th width="32%">Nama Produk</th>
                                    <th width="11%">Harga Beli</th>
                                    <th width="11%">Harga Jual</th>
                                    <th width="11%">Stok</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($produk as $br) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $br->kode_produk ?></td>
                                        <td><?= $br->nama_produk ?></td>
                                        <td>Rp. <?= number_format($br->harga_produk, 0, ',', '.') ?></td>
                                        <td>Rp. <?= number_format($br->harga_sablon, 0, ',', '.') ?></td>
                                        <td>Rp. <?= number_format($br->harga_jual, 0, ',', '.') ?></td>
                                        <td class="text-center">
                                            <a>
                                                <button onclick="detail(<?= $br->id ?>)" class="badge btn-secondary">Detail</button>
                                            </a>
                                            <a>
                                                <button onclick="edit(<?= $br->id ?>)" class="badge btn-info">Edit</button>
                                            </a>
                                            <a>
                                                <button onclick="hapus(<?= $br->id ?>)" class="badge btn-danger">Hapus</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- </div> -->
</main>

<!-- Modal add produk -->
<div class="modal fade" id="modal-tambah-produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" onclick="batal_tambah()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate autocomplete="off" id="form_tambah" method="POST" action="<?= base_url() ?>masterproduk/add_produk_aksi">
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Kode Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="kode_produk" name="kode_produk" required>
                            <div class="invalid-feedback">Kode Produk harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="nama_produk" name="nama_produk" required>
                            <div class="invalid-feedback">Nama Produk harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Suplier</label>
                        <div class="col-sm-9">
                            <select class="form-select form-select-lg" id="id_suplier" name="id_suplier" required>
                                <option value="" selected>-- Pilih --</option>
                                <?php foreach ($suplier as $sp) : ?>
                                    <option value="<?= $sp->id ?>"><?= $sp->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Suplier harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Harga Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="harga_produk" name="harga_produk" required>
                            <div class="invalid-feedback">Harga Produk harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Harga Sablon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="harga_sablon" name="harga_sablon" required>
                            <div class="invalid-feedback">Harga Sablon harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Harga Jual</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="harga_jual" name="harga_jual" required>
                            <div class="invalid-feedback">Harga Jual harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select class="form-select form-select-lg" id="id_kategori" name="id_kategori" required>
                                <option value="" selected>-- Pilih --</option>
                                <?php foreach ($kategori as $kt) : ?>
                                    <option value="<?= $kt->id ?>"><?= $kt->kategori ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Kategori harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Warna</label>
                        <div class="col-sm-9">
                            <select class="form-select form-select-lg" id="id_warna" name="id_warna" required>
                                <option value="" selected>-- Pilih --</option>
                                <?php foreach ($warna as $wr) : ?>
                                    <option value="<?= $wr->id ?>"><?= $wr->warna ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Warna harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Motif</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="motif" name="motif" required>
                            <div class="invalid-feedback">Motif harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Ukuran</label>
                        <div class="col-sm-9">
                            <select class="form-select form-select-lg" id="ukuran" name="ukuran" required>
                                <option value="" selected>-- Pilih --</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="2XL">2XL</option>
                                <option value="3XL">3XL</option>
                                <option value="4XL">4XL</option>
                                <option value="5XL">5XL</option>
                                <option value="6XL">6XL</option>
                                <option value="7XL">7XL</option>
                            </select>
                            <div class="invalid-feedback">Ukuran harus diisi.</div>
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

<!-- Modal edit Produk -->
<div class="modal fade" id="modal-edit-produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                <button type="button" onclick="batal_edit()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate autocomplete="off" id="form_edit" method="POST" action="<?= base_url() ?>masterproduk/edit_produk_aksi">
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Kode Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="edit_kode_produk" name="edit_kode_produk" required>
                            <div class="invalid-feedback">Kode Produk harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Nama Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="edit_nama_produk" name="edit_nama_produk" required>
                            <div class="invalid-feedback">Nama Produk harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Suplier</label>
                        <div class="col-sm-9">
                            <select class="form-select form-select-lg" id="edit_id_suplier" name="edit_id_suplier" required>
                                <option value="" selected>-- Pilih --</option>
                                <?php foreach ($suplier as $sp) : ?>
                                    <option value="<?= $sp->id ?>"><?= $sp->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Suplier harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Harga Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="edit_harga_produk" name="edit_harga_produk" required>
                            <div class="invalid-feedback">Harga Produk harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Harga Sablon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="edit_harga_sablon" name="edit_harga_sablon" required>
                            <div class="invalid-feedback">Harga Sablon harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Harga Jual</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="edit_harga_jual" name="edit_harga_jual" required>
                            <div class="invalid-feedback">Harga Jual harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select class="form-select form-select-lg" id="edit_id_kategori" name="edit_id_kategori" required>
                                <option value="" selected>-- Pilih --</option>
                                <?php foreach ($kategori as $kt) : ?>
                                    <option value="<?= $kt->id ?>"><?= $kt->kategori ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Kategori harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Warna</label>
                        <div class="col-sm-9">
                            <select class="form-select form-select-lg" id="edit_id_warna" name="edit_id_warna" required>
                                <option value="" selected>-- Pilih --</option>
                                <?php foreach ($warna as $wr) : ?>
                                    <option value="<?= $wr->id ?>"><?= $wr->warna ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Warna harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Motif</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-lg" id="edit_motif" name="edit_motif" required>
                            <div class="invalid-feedback">Motif harus diisi.</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label">Ukuran</label>
                        <div class="col-sm-9">
                            <select class="form-select form-select-lg" id="edit_ukuran" name="edit_ukuran" required>
                                <option value="" selected>-- Pilih --</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="2XL">2XL</option>
                                <option value="3XL">3XL</option>
                                <option value="4XL">4XL</option>
                                <option value="5XL">5XL</option>
                                <option value="6XL">6XL</option>
                                <option value="7XL">7XL</option>
                            </select>
                            <div class="invalid-feedback">Ukuran harus diisi.</div>
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

<!-- Modal detail Produk -->
<div class="modal fade" id="modal-detail-produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size: large;">
                <div class="row">
                    <div class="col-6">
                        <p>Kode Produk</p>
                    </div>
                    <div class="col-6">
                        <p><b id="detail_kode_produk"></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Nama Produk</p>
                    </div>
                    <div class="col-6">
                        <p><b id="detail_nama_produk"></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Suplier</p>
                    </div>
                    <div class="col-6">
                        <p><b id="detail_suplier"></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Harga Produk</p>
                    </div>
                    <div class="col-6">
                        <p><b id="detail_harga_produk"></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Harga Sablon</p>
                    </div>
                    <div class="col-6">
                        <p><b id="detail_harga_sablon"></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Harga Jual</p>
                    </div>
                    <div class="col-6">
                        <p><b id="detail_harga_jual"></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Warna</p>
                    </div>
                    <div class="col-6">
                        <p><b id="detail_warna"></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Motif</p>
                    </div>
                    <div class="col-6">
                        <p><b id="detail_motif"></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Kategori</p>
                    </div>
                    <div class="col-6">
                        <p><b id="detail_kategori"></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Ukuran</p>
                    </div>
                    <div class="col-6">
                        <p><b id="detail_ukuran"></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Stok</p>
                    </div>
                    <div class="col-6">
                        <p><b id="detail_stok"></b></p>
                    </div>
                </div>
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

        $('#dataTable').dataTable({
            "ordering": false
        });

        // Format mata uang.
        $('#harga_jual').mask('000.000.000', {
            reverse: true
        });
        $('#harga_produk').mask('000.000.000', {
            reverse: true
        });
        $('#harga_sablon').mask('000.000.000', {
            reverse: true
        });

        $('#edit_harga_jual').mask('000.000.000', {
            reverse: true
        });
        $('#edit_harga_produk').mask('000.000.000', {
            reverse: true
        });
        $('#edit_harga_sablon').mask('000.000.000', {
            reverse: true
        });
    });





    // ADD DATA ----------------------------------------------------------------------------------- ADD DATA
    function batal_tambah() {
        $('#kode_produk').val("");
        $('#nama_produk').val("");
        $('#id_suplier').val("");
        $('#harga_jual').val("");
        $('#harga_produk').val("");
        $('#harga_sablon').val("");
        $('#id_kategori').val("");
        $('#id_warna').val("");
        $('#motif').val("");
        $('#ukuran').val("");
        $('#form_tambah').removeClass('was-validated')
    }
    // ADD DATA ----------------------------------------------------------------------------------- ADD DATA





    // EDIT DATA ----------------------------------------------------------------------------------- EDIT DATA
    function batal_edit() {
        $('#edit_kode_produk').val("");
        $('#edit_nama_produk').val("");
        $('#edit_id_suplier').val("");
        $('#edit_harga_jual').val("");
        $('#edit_harga_produk').val("");
        $('#edit_harga_sablon').val("");
        $('#edit_id_kategori').val("");
        $('#edit_id_warna').val("");
        $('#edit_motif').val("");
        $('#edit_ukuran').val("");
        $('#form_edit').removeClass('was-validated')
    }

    function edit(id) {
        $.ajax({
            type: "GET",
            url: "<?= base_url() ?>masterproduk/getProdukById/" + id,
            dataType: 'JSON',
            success: function(response) {
                $('#edit_id').val(response.id);
                $('#edit_kode_produk').val(response.kode_produk);
                $('#edit_nama_produk').val(response.nama_produk);
                $('#edit_id_suplier').val(response.id_suplier);
                $('#edit_harga_jual').val(format_rupiah(response.harga_jual));
                $('#edit_harga_produk').val(format_rupiah(response.harga_produk));
                $('#edit_harga_sablon').val(format_rupiah(response.harga_sablon));
                $('#edit_id_kategori').val(response.id_kategori);
                $('#edit_id_warna').val(response.id_warna);
                $('#edit_motif').val(response.motif);
                $('#edit_ukuran').val(response.ukuran);
                $('#modal-edit-produk').modal('toggle');
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
                window.location.href = '<?= base_url() ?>masterproduk/hapus_produk/' + id;
            }
        })
    }
    // HAPUS DATA ----------------------------------------------------------------------------------- HAPUS DATA





    // DETAIL DATA ----------------------------------------------------------------------------------- DETAIL DATA
    function detail(id) {
        $.ajax({
            type: "GET",
            url: "<?= base_url() ?>masterproduk/getProdukById/" + id,
            dataType: 'JSON',
            success: function(response) {
                $('#detail_kode_produk').html(response.kode_produk);
                $('#detail_nama_produk').html(response.nama_produk);
                $('#detail_harga_jual').html('Rp. ' + format_rupiah(response.harga_jual));
                $('#detail_harga_produk').html('Rp. ' + format_rupiah(response.harga_produk));
                $('#detail_harga_sablon').html('Rp. ' + format_rupiah(response.harga_sablon));
                $('#detail_suplier').html(response.suplier);
                $('#detail_kategori').html(response.kategori);
                $('#detail_warna').html(response.warna);
                $('#detail_motif').html(response.motif);
                $('#detail_ukuran').html(response.ukuran);
                $('#detail_stok').html(response.stok);
                $('#modal-detail-produk').modal('toggle');
            }
        })
    }
    // DETAIL DATA ----------------------------------------------------------------------------------- DETAIL DATA
</script>