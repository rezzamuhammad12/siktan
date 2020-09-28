<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Master Kelompok Tani -->
    <!-- Page Heading -->
    <h2 class="h2 mb-4 text-gray-800"><?= $title; ?></h2>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <h3 class="h3 mt-3 text-gray-800">Kelompok Tani</h3>


            <div class="card card-body">
                <div class="btn-toolbar">
                    <div class="btn-group mr-2">
                        <select name="kota_filter" id="kota_filter" class="filter-form form-control">
                            <option value="">Kota</option>
                        </select>
                    </div>
                    <div class="btn-group mr-2">
                        <select name="kecamatan_filter" id="kecamatan_filter" class="filter-form form-control" disabled>
                            <option value="">Kecamatan</option>
                        </select>
                    </div>
                    <div class="btn-group mr-2">
                        <select name="desa_filter" id="desa_filter" class="filter-form form-control" disabled>
                            <option value="">Desa</option>
                        </select>
                    </div>

                    <button id="gofilter" class="btn btn-success mr-2" data-from="master">Go Filter</button>
                    <a href="<?= base_url('kecamatan/export_excel'); ?>" class="btn btn-warning mr-2">Export</a>

                </div>
            </div>
            <!-- Import excel -->
            <!-- <form method="post" enctype="multipart/form-data" action="proses.php">
                <div class="form-group">
                    <label for="exampleInputFile">File Upload</label>
                    <input type="file" name="berkas_excel" class="form-control" id="exampleInputFile">
                </div>
                <a href="<?= base_url('kecamatan/import_excel'); ?>" class="btn btn-info mr-2">Import</a> -->

            <!-- End Import excel -->

            <table class="table table-hover tabel-kelompok-tani sortable">
                <thead>
                    <tr>
                        <th scope="col" data-defaultsort="true">#</th>
                        <th scope="col">Kode Kelompok</th>
                        <th scope="col">Nama Kelompok</th>
                        <th scope="col">Penyuluh Pendamping</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Desa</th>
                        <th scope="col">Skor</th>
                        <th scope="col" data-defaultsort="disabled">Disetujui</th>
                        <th scope="col" data-defaultsort="disabled">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody-kelompok">
                    <?php $i = 1; ?>
                    <?php foreach ($kelompokTani as $kp) : ?>
                        <tr>
                            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
                            <td data-value="<?= $kp['kode_kelompok']; ?>"><?= $kp['kode_kelompok']; ?></td>
                            <td data-value="<?= $kp['nama']; ?>"><?= $kp['nama']; ?></td>
                            <td data-value="<?= $kp['nama_penyuluh']; ?>"><?= $kp['nama_penyuluh']; ?></td>
                            <td class="kota" data-value="<?= $kp['kota_kab']; ?>"><?= $kp['kota_kab']; ?></td>
                            <td class="kecamatan" data-value="<?= $kp['kecamatan']; ?>"><?= $kp['kecamatan']; ?></td>
                            <td class="desa" data-value="<?= $kp['desa']; ?>"><?= $kp['desa']; ?></td>
                            <td data-value="<?= $kp['skor']; ?>"><?= $kp['skor']; ?></td>
                            <td><?php if (is_null($kp['verifikasi'])) : ?>
                                    <div class="badge badge-info">Diproses</div>
                                <?php elseif ($kp['verifikasi'] == "revisi") : ?>
                                    <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $kp['nama'] ?>" data-catatan="<?= $kp['catatan'] ?>">Revisi</a>
                                <?php else : ?>
                                    <div class="badge badge-success">Terverifikasi</div>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="<?= base_url('kecamatan/detailMasterData/') ?><?= $kp['id']; ?>" class="badge badge-info">Detail</a>
                            </td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Master Penyuluh -->

    <h3 class="h3 mt-3 text-gray-800">Penyuluh</h3>
    <div class="row">
        <table class="table table-hover sortable">
            <thead>
                <tr>
                    <th scope="col" data-defaultsort="true">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Status</th>
                    <th scope="col" data-defaultsort="disabled">Disetujui</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($penyuluh as $p) : ?>
                    <tr>
                        <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
                        <td data-value="<?= $p['nama'] ?>"><?= $p['nama']; ?></td>
                        <td data-value="<?= $p['nip'] ?>"><?= $p['nip']; ?></td>
                        <td data-value="<?= $p['nik'] ?>"><?= $p['nik']; ?></td>
                        <td data-value="<?= $p['status'] ?>"><?= $p['status']; ?></td>
                        <td><?php if (is_null($p['verifikasi'])) : ?>
                                <div class="badge badge-info">Diproses</div>
                            <?php elseif ($p['verifikasi'] == "revisi") : ?>
                                <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $p['nama'] ?>" data-catatan="<?= $p['catatan'] ?>">Revisi</a>
                            <?php else : ?>
                                <div class="badge badge-success">Terverifikasi</div>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Master Lahan -->

    <h3 class="h3 mt-3 text-gray-800">Lahan</h3>
    <div class="row">


        <div class="card card-body mb-3">
            <div class="btn-toolbar">
                <div class="btn-group ml-auto">
                    <select name="filter_lahan" id="filter_lahan" class="filter-form form-control">
                        <option value="">Kelompok</option>
                        <?php foreach ($kelompokTani as $kp) : ?>
                            <option value="<?= $kp['id'] ?>"><?= $kp['nama'] ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>


        <table class="table table-hover sortable">
            <thead>
                <tr>
                    <th scope="col" data-defaultsort="true">#</th>
                    <th scope="col">Nama Kelompok</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Luas Lahan(ha)</th>
                    <th scope="col">Status Kepemilikan</th>
                    <th scope="col" data-defaultsort="disabled">Disetujui</th>
                </tr>
            </thead>
            <tbody id="tbody-lahan">
                <?php $i = 1; ?>
                <?php foreach ($lahan as $l) : ?>
                    <tr>
                        <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
                        <td data-value="<?= $l['nama'] ?>"><?= $l['nama']; ?></td>
                        <td data-value="<?= $l['nama_anggota'] ?>"><?= $l['nama_anggota']; ?></td>
                        <td data-value="<?= $l['luas'] ?>"><?= $l['luas']; ?></td>
                        <td data-value="<?= $l['status'] ?>"><?= $l['status']; ?></td>
                        <td><?php if (is_null($l['verifikasi_lahan'])) : ?>
                                <div class="badge badge-info">Diproses</div>
                            <?php elseif ($l['verifikasi_lahan'] == "revisi") : ?>
                                <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $l['nama'] ?>" data-catatan="<?= $l['catatan_lahan'] ?>">Revisi</a>
                            <?php else : ?>
                                <div class="badge badge-success">Terverifikasi</div>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Master Aset -->

    <h3 class="h3 mt-3 text-gray-800">Aset</h3>
    <div class="row">

        <div class="card card-body mb-3">
            <div class="btn-toolbar">
                <div class="btn-group ml-auto">
                    <select name="filter_aset" id="filter_aset" class="filter-form form-control">
                        <option value="">Kelompok</option>
                        <?php foreach ($kelompokTani as $kp) : ?>
                            <option value="<?= $kp['id'] ?>"><?= $kp['nama'] ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
        <table class="table table-hover sortable">
            <thead>
                <tr>
                    <th scope="col" data-defaultsort="true">#</th>
                    <th scope="col">Nama Kelompok</th>
                    <th scope="col">Nama Aset</th>
                    <th scope="col">Sumber Perolehan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tahun Perolehan</th>
                    <th scope="col" data-defaultsort="disabled">Disetujui</th>
                </tr>
            </thead>
            <tbody id="tbody-aset">
                <?php $i = 1; ?>
                <?php foreach ($aset as $a) : ?>
                    <tr>
                        <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
                        <td data-value="<?= $a['nama_kelompok']; ?>"><?= $a['nama_kelompok']; ?></td>
                        <td data-value="<?= $a['nama']; ?>"><?= $a['nama']; ?></td>
                        <td data-value="<?= $a['sumber_perolehan']; ?>"><?= $a['sumber_perolehan']; ?></td>
                        <td data-value="<?= $a['jumlah']; ?>"><?= $a['jumlah']; ?></td>
                        <td data-value="<?= $a['tahun_perolehan']; ?>"><?= $a['tahun_perolehan']; ?></td>
                        <td><?php if (is_null($a['verifikasi'])) : ?>
                                <div class="badge badge-info">Diproses</div>
                            <?php elseif ($a['verifikasi'] == "revisi") : ?>
                                <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $a['nama'] ?>" data-catatan="<?= $a['catatan'] ?>">Revisi</a>
                            <?php else : ?>
                                <div class="badge badge-success">Terverifikasi</div>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Master Komoditi -->

    <h3 class="h3 mt-3 text-gray-800">Komoditi</h3>
    <div class="row">

        <div class="card card-body mb-3">
            <div class="btn-toolbar">
                <div class="btn-group ml-auto">
                    <select name="filter_komoditi" id="filter_komoditi" class="filter-form form-control">
                        <option value="">Kelompok</option>
                        <?php foreach ($kelompokTani as $kp) : ?>
                            <option value="<?= $kp['id'] ?>"><?= $kp['nama'] ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
        <table class="table table-hover sortable">
            <thead>
                <tr>
                    <th scope="col" data-defaultsort="true">#</th>
                    <th scope="col">Nama Kelompok</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Subsektor</th>
                    <th scope="col">Komoditas</th>
                    <th scope="col" data-defaultsort="disabled">Disetujui</th>
                </tr>
            </thead>
            <tbody id="tbody-komoditi">
                <?php $i = 1; ?>
                <?php foreach ($komoditi as $km) : ?>
                    <tr>
                        <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
                        <td data-value="<?= $km['nama']; ?>"><?= $km['nama']; ?></td>
                        <td data-value="<?= $km['nama_anggota']; ?>"><?= $km['nama_anggota']; ?></td>
                        <td data-value="<?= $km['subsektor']; ?>"><?= $km['subsektor']; ?></td>
                        <td data-value="<?= $km['komoditas']; ?>"><?= $km['komoditas']; ?></td>
                        <td><?php if (is_null($km['verifikasi'])) : ?>
                                <div class="badge badge-info">Diproses</div>
                            <?php elseif ($km['verifikasi'] == "revisi") : ?>
                                <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $km['nama'] ?>" data-catatan="<?= $km['catatan'] ?>">Revisi</a>
                            <?php else : ?>
                                <div class="badge badge-success">Terverifikasi</div>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Master Anggota -->
    <h3 class="h3 mt-3 text-gray-800">Anggota</h3>
    <div class="row">

        <div class="card card-body mb-3">
            <div class="btn-toolbar">
                <div class="btn-group ml-auto">
                    <select name="filter_anggota" id="filter_anggota" class="filter-form form-control">
                        <option value="">Kelompok</option>
                        <?php foreach ($kelompokTani as $kp) : ?>
                            <option value="<?= $kp['id'] ?>"><?= $kp['nama'] ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
        <table class="table table-hover sortable">
            <thead>
                <tr>
                    <th scope="col" data-defaultsort="true">#</th>
                    <th scope="col">Nama Kelompok</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Status Anggota</th>
                    <th scope="col">Disetujui</th>
                </tr>
            </thead>
            <tbody id="tbody-anggota">
                <?php $i = 1; ?>
                <?php foreach ($anggota as $agt) : ?>
                    <tr>
                        <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
                        <td data-value="<?= $agt['nama_kelompok']; ?>"><?= $agt['nama_kelompok']; ?></td>
                        <td data-value="<?= $agt['nik']; ?>"><?= $agt['nik']; ?></td>
                        <td data-value="<?= $agt['nama']; ?>"><?= $agt['nama']; ?></td>
                        <td data-value="<?= $agt['status']; ?>"><?= $agt['status']; ?></td>
                        <td><?php if (is_null($agt['verifikasi'])) : ?>
                                <div class="badge badge-info">Diproses</div>
                            <?php elseif ($agt['verifikasi'] == "revisi") : ?>
                                <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $agt['nama'] ?>" data-catatan="<?= $agt['catatan'] ?>">Revisi</a>
                            <?php else : ?>
                                <div class="badge badge-success">Terverifikasi</div>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Catatan -->

<div class="modal fade" id="catatanRevisi" tabindex="-1" role="dialog" aria-labelledby="catatanRevisiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="catatanRevisiLabel">Catatan Revisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="catatan"></p>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>