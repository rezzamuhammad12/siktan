<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <table class="table table-striped table-kelompok-tani">
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->