<?php if (!empty($kelompokTani)) : ?>
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
    <tr>
        <td colspan="9" style="text-align: center;">
            Data Tidak Ditemukan.....
        </td>
    </tr>
<?php endif ?>