<main class="content" style="padding: 10px;">
    <!-- <div class="container" style="padding: 0px;"> -->

    <h1 class="h3 mb-2 ml-3">Lihat Data Produk</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding: 15px;">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" style="border: solid 1px #E5E8E8; white-space: nowrap" id="dataTable" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">No</th>
                                    <th width="10%">Kode</th>
                                    <th width="40%">Nama Produk</th>
                                    <th width="19%">Harga Jual</th>
                                    <th width="13%">Stok</th>
                                    <th width="13%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($produk as $br) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $br->kode_produk ?></td>
                                        <td><?= $br->nama_produk ?></td>
                                        <td>Rp. <?= number_format($br->harga_jual, 0, ',', '.') ?></td>
                                        <td><?= $br->stok ?></td>
                                        <td class="text-center">
                                            <a>
                                                <button onclick="detail(<?= $br->id ?>)" class="badge btn-secondary">Detail</button>
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

<!-- Modal detail produk -->
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
                        <p>Harga Jual</p>
                    </div>
                    <div class="col-6">
                        <p><b id="detail_harga_jual"></b></p>
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
    });





    // DETAIL DATA ----------------------------------------------------------------------------------- DETAIL DATA
    function detail(id) {
        $.ajax({
            type: "GET",
            url: "<?= base_url() ?>lihatproduk/getProdukById/" + id,
            dataType: 'JSON',
            success: function(response) {
                $('#detail_kode_produk').html(response.kode_produk);
                $('#detail_nama_produk').html(response.nama_produk);
                $('#detail_harga_jual').html('Rp. ' + format_rupiah(response.harga_jual));
                $('#detail_suplier').html(response.suplier);
                $('#detail_warna').html(response.warna);
                $('#detail_motif').html(response.motif);
                $('#detail_kategori').html(response.kategori);
                $('#detail_ukuran').html(response.ukuran);
                $('#detail_stok').html(response.stok);
                $('#modal-detail-produk').modal('toggle');
            }
        })
    }
    // DETAIL DATA ----------------------------------------------------------------------------------- DETAIL DATA
</script>