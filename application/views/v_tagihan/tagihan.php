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
                                    <select class="custom-select" id="bulan_belum_bayar">
                                        <option selected>Pilih Bulan</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    <select class="custom-select" id="tahun_belum_bayar">
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
                                <table class="table table-bordered" id="dataTable_belum_bayar" style="table-layout: auto; width:100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="width_no" width="5%">No</th>
                                            <th class="width_produk" width="85%">Produk</th>
                                            <th class="width_aksi" class="text-center" width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data_belum_bayar as $bb) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $bb->produk ?></td>
                                                <td class="text-center">
                                                    <button class="badge btn-primary" onclick="detail(<?= $bb->id ?>)">Detail</button>
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
                                    <select class="custom-select" id="bulan_lunas">
                                        <option selected>Pilih Bulan</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    <select class="custom-select" id="tahun_lunas">
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
                                <table class="table table-bordered" id="dataTable_lunas" style="table-layout: auto; width:100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="width_no" width="5%">No</th>
                                            <th class="width_produk" width="85%">Produk</th>
                                            <th class="width_aksi" class="text-center" width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data_lunas as $lns) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $lns->produk ?></td>
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