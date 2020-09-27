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

                    <button id="gofilter" class="btn btn-success" data-from="master">Go Filter</button>
                </div>
            </div>



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
                                    <a href="<?= base_url('kota/verifikasi/') ?><?= $kp['id']; ?>" class="badge badge-warning">Verifikasi</a>
                                <?php elseif ($kp['verifikasi'] == "revisi") : ?>
                                    <a href="<?= base_url('kota/verifikasi/') ?><?= $kp['id']; ?>" class="badge badge-warning">Revisi</a>
                                <?php else : ?>
                                    <a href="<?= base_url('kota/verifikasi/') ?><?= $kp['id']; ?>" class="badge badge-success">Terverifikasi</a>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="<?= base_url('kota/detailMasterData/') ?><?= $kp['id']; ?>" class="badge badge-info">Detail</a>
                            </td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Master Penyuluh -->

    <h3 class="h3 mt-3 text-gray-800" id="penyuluh">Penyuluh</h3>
    <?= $this->session->flashdata('message_penyuluh'); ?>
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
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Penyuluh <?= $p['nama'] ?>" data-id="<?= $p['id'] ?>" data-url="verifikasiPenyuluh" class="badge badge-warning">Verifikasi</a>
                            <?php elseif ($p['verifikasi'] == "revisi") : ?>
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Penyuluh <?= $p['nama'] ?>" data-id="<?= $p['id'] ?>" data-url="verifikasiPenyuluh" class="badge badge-warning">Revisi</a>
                            <?php else : ?>
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Penyuluh <?= $p['nama'] ?>" data-id="<?= $p['id'] ?>" data-url="verifikasiPenyuluh" class="badge badge-success">Terverifikasi</a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Master Lahan -->

    <h3 class="h3 mt-3 text-gray-800" id="lahan">Lahan</h3>
    <?= $this->session->flashdata('message_lahan'); ?>
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
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Lahan <?= $l['nama_anggota'] ?>" data-id="<?= $l['id'] ?>" data-url="verifikasiLahan" class="badge badge-warning">Verifikasi</a>
                            <?php elseif ($l['verifikasi_lahan'] == "revisi") : ?>
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Lahan <?= $l['nama_anggota'] ?>" data-id="<?= $l['id'] ?>" data-url="verifikasiLahan" class="badge badge-warning">Revisi</a>
                            <?php else : ?>
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Lahan <?= $l['nama_anggota'] ?>" data-id="<?= $l['id'] ?>" data-url="verifikasiLahan" class="badge badge-success">Terverifikasi</a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Master Aset -->

    <h3 class="h3 mt-3 text-gray-800" id="aset">Aset</h3>
    <?= $this->session->flashdata('message_aset'); ?>
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
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Aset <?= $a['nama'] ?> dari kelompok <?= $a['nama_kelompok']; ?>"" data-id=" <?= $a['id'] ?>" data-url="verifikasiAset" class="badge badge-warning">Verifikasi</a>
                            <?php elseif ($a['verifikasi'] == "revisi") : ?>
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Aset <?= $a['nama'] ?> dari kelompok <?= $a['nama_kelompok']; ?>" data-id="<?= $a['id'] ?>" data-url="verifikasiAset" class="badge badge-warning">Revisi</a>
                            <?php else : ?>
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Aset <?= $a['nama'] ?> dari kelompok <?= $a['nama_kelompok']; ?>" data-id="<?= $a['id'] ?>" data-url="verifikasiAset" class="badge badge-success">Terverifikasi</a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Master Komoditi -->

    <h3 class="h3 mt-3 text-gray-800" id="komoditi">Komoditi</h3>
    <?= $this->session->flashdata('message_komoditi'); ?>
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
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Komoditi dari <?= $km['nama_anggota']; ?>"" data-id=" <?= $km['id'] ?>" data-url="verifikasiKomoditi" class="badge badge-warning">Verifikasi</a>
                            <?php elseif ($km['verifikasi'] == "revisi") : ?>
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Komoditi dari <?= $km['nama_anggota']; ?>" data-id="<?= $km['id'] ?>" data-url="verifikasiKomoditi" class="badge badge-warning">Revisi</a>
                            <?php else : ?>
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Komoditi dari <?= $km['nama_anggota']; ?>" data-id="<?= $km['id'] ?>" data-url="verifikasiKomoditi" class="badge badge-success">Terverifikasi</a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Master Anggota -->
    <h3 class="h3 mt-3 text-gray-800" id="anggota">Anggota</h3>
    <?= $this->session->flashdata('message_anggota'); ?>
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
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Anggota <?= $agt['nama'] ?> dari kelompok <?= $agt['nama_kelompok']; ?>" data-id=" <?= $agt['id'] ?>" data-url="verifikasiAnggota" class="badge badge-warning">Verifikasi</a>
                            <?php elseif ($agt['verifikasi'] == "revisi") : ?>
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Anggota <?= $agt['nama'] ?> dari kelompok <?= $agt['nama_kelompok']; ?>" data-id="<?= $agt['id'] ?>" data-url="verifikasiAnggota" class="badge badge-warning">Revisi</a>
                            <?php else : ?>
                                <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Anggota <?= $agt['nama'] ?> dari kelompok <?= $agt['nama_kelompok']; ?>" data-id="<?= $agt['id'] ?>" data-url="verifikasiAnggota" class="badge badge-success">Terverifikasi</a>
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

<div class="modal fade" id="modalVerifikasi" tabindex="-1" role="dialog" aria-labelledby="modalVerifikasiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalVerifikasiLabel">Catatan Revisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="url" action="" method="post">
                    <input type="text" hidden id="id" name="id">
                    <div class="form-group">
                        <textarea class="form-control" id="catatan" name="catatan" placeholder="Catatan" rows="7"></textarea>
                    </div>


            </div>

            <div class="modal-footer">
                <div class="btn-toolbar">
                    <button type="submit" name="btn-verif" value="diverifikasi" class="btn btn-success mr-2 ml-auto">Verifikasi</button>
                    <button type="submit" name="btn-verif" value="revisi" class="btn btn-danger action mr-2">Revisi</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>