<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title . " " . $kelompokTani[0]['nama']; ?></h1>
    <?= $this->session->flashdata('message'); ?>
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

    <div class="row">
        <form action="<?= base_url('kota/verifikasi/') . $kelompokTani[0]['id']; ?>" method="post" style="width: 70%;">
            <div class="form-group">
                <textarea class="form-control" id="catatan" name="catatan" placeholder="Catatan" rows="7"></textarea>
            </div>

            <div class="btn-toolbar">
                <button type="submit" name="btn-verif" value="diverifikasi" class="btn btn-success mr-2 ml-auto">Verifikasi</button>
                <button type="submit" name="btn-verif" value="revisi" class="btn btn-danger action mr-2">Revisi</button>
                <a href="../../kota" type="submit" class="btn btn-link ">batal</a>
            </div>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->