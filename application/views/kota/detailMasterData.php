<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title . " " . $kelompokTani[0]['nama']; ?></h1>
    <a href="../" class="btn btn-danger goback mb-2"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> kembali</a>

    <div class="row">
        <table class="table table-striped tabel-kelompok-tani">
            <tbody>
                <tr>
                    <td>Kode Kelompok</td>
                    <td>:</td>
                    <td class="penyuluh"><?= $kelompokTani[0]['kode_kelompok']; ?></td>
                </tr>
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
    <h3 class="h3 mt-3 text-gray-800" id="anggota">Anggota</h3>
    <?= $this->session->flashdata('message_anggota'); ?>
    <div class="row">
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

    <!-- Master Lahan -->
    <h3 class="h3 mt-3 text-gray-800" id="lahan">Lahan</h3>
    <?= $this->session->flashdata('message_lahan'); ?>
    <div class="row">
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->