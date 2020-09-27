<?php if (!empty($aset)) : ?>
    <?php if ($from = '') : ?>
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
                <td>
                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#addAset" data-title="Edit Aset" data-button="Edit" data-id="<?= $a['id']; ?>" data-kelompok="<?= $a['id_kelompok']; ?>" data-nama="<?= $a['nama']; ?>" data-sumber="<?= $a['id_sumber']; ?>" data-jumlah="<?= $a['jumlah']; ?>" data-tahun="<?= $a['tahun_perolehan']; ?>">edit</a>
                    <a href="deleteAset/<?= $a['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin hapus &quot;<?= $a['nama']; ?>&quot; dari kelompok <?= $a['nama_kelompok']; ?>?');">delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    <?php else : ?>
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
    <?php endif ?>

<?php else : ?>
    <tr>
        <td colspan="7" style="text-align: center;">
            Data Tidak Ditemukan.....
        </td>
    </tr>
<?php endif ?>