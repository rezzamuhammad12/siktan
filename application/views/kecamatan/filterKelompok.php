<?php if (!empty($kelompokTani)) : ?>
    <?php if (empty($from)) : ?>
        <?php $i = 1; ?>
        <?php foreach ($kelompokTani as $kp) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $kp['nama']; ?></td>
                <td><?= $kp['nama_penyuluh']; ?></td>
                <td class="kota"><?= $kp['kota_kab']; ?></td>
                <td class="kecamatan"><?= $kp['kecamatan']; ?></td>
                <td class="desa"><?= $kp['desa']; ?></td>
                <td><?= $kp['skor']; ?></td>
                <td><?= is_null($kp['approved_by']) ? "diproses" : $kp['approved_by'] ?></td>
                <td>
                    <a href="" class="badge badge-info" data-toggle="modal" data-target="#detailKelompokTani" data-userid="<?= $kp['id']; ?>" data-nama="<?= $kp['nama']; ?>" data-penyuluh="<?= $kp['nama_penyuluh']; ?>" data-desa="<?= $kp['desa']; ?>" data-kecamatan="<?= $kp['kecamatan']; ?>" data-kota="<?= $kp['kota_kab']; ?>" data-bpp="<?= $kp['bpp']; ?>" data-tahun_pembentukan="<?= $kp['tahun_pembentukan']; ?>" data-alamat="<?= $kp['alamat']; ?>" data-kelas="<?= $kp['kelas']; ?>" data-skor="<?= $kp['skor']; ?>" data-tahun_penerapan="<?= $kp['tahun_penerapan']; ?>" data-teknologi="<?= $kp['teknologi']; ?>">detail</a>


                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#addKelompokPetani" data-title="Edit Kelompok Tani" data-button="Edit" data-id="<?= $kp['id']; ?>" data-nama="<?= $kp['nama']; ?>" data-penyuluh="<?= $kp['id_penyuluh']; ?>" data-desa="<?= $kp['desa']; ?>" data-kecamatan="<?= $kp['kecamatan']; ?>" data-bpp="<?= $kp['bpp']; ?>" data-kota="<?= $kp['kota_kab']; ?>" data-tahun_pembentukan="<?= $kp['tahun_pembentukan']; ?>" data-alamat="<?= $kp['alamat']; ?>" data-kelas="<?= $kp['id_kelas']; ?>" data-skor="<?= $kp['skor']; ?>" data-tahun_penerapan="<?= $kp['tahun_penerapan']; ?>" data-teknologi="<?= $kp['teknologi']; ?>">edit</a>

                    <a href="deleteKelompokTani/<?= $kp['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin hapus Kelompok tani dari &quot;<?= $kp['nama']; ?>&quot; ?');">delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    <?php else : ?>
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
    <?php endif ?>
<?php else : ?>
    <tr>
        <td colspan="9" style="text-align: center;">
            Data Tidak Ditemukan.....
        </td>
    </tr>
<?php endif ?>