<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title . " " . $kelompokTani[0]['nama']; ?></h1>
    <div class="row">
        <table class="table table-striped tabel-kelompok-tani">
            <tbody>
                <tr>
                    <td>Penyuluh Pendamping</td>
                    <td>:</td>
                    <td class="penyuluh"><?= $kelompokTani[0]['nama_penyuluh']; ?></td>
                </tr>
                <tr>
                    <td>Kota/Kabupaten</td>
                    <td>:</td>
                    <td class="kota"><?= $kelompokTani[0]['kota_kab']; ?></td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>:</td>
                    <td class="kecamatan"><?= $kelompokTani[0]['kecamatan']; ?></td>
                </tr>
                <tr>
                    <td>desa</td>
                    <td>:</td>
                    <td class="desa"><?= $kelompokTani[0]['desa']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td class="alamat"><?= $kelompokTani[0]['alamat']; ?></td>
                </tr>
                <tr>
                    <td>BPP</td>
                    <td>:</td>
                    <td class="bpp"><?= $kelompokTani[0]['bpp']; ?></td>
                </tr>
                <tr>
                    <td>Tahun Pembentukan</td>
                    <td>:</td>
                    <td class="tahun_pembentukan"><?= $kelompokTani[0]['tahun_pembentukan']; ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td class="kelas"><?= $kelompokTani[0]['kelas']; ?></td>
                </tr>
                <tr>
                    <td>Skor</td>
                    <td>:</td>
                    <td class="skor"><?= $kelompokTani[0]['skor']; ?></td>
                </tr>

                <tr>
                    <td>Tahun Penerapan</td>
                    <td>:</td>
                    <td class="tahun_penerapan"><?= $kelompokTani[0]['tahun_penerapan']; ?></td>
                </tr>

                <tr>
                    <td>Teknologi</td>
                    <td>:</td>
                    <td class="teknologi"><?= $kelompokTani[0]['teknologi']; ?></td>
                </tr>
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