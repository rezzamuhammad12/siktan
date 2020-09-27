<?php if (!empty($lahan)) : ?>

    <?php $i = 1; ?>
    <?php foreach ($lahan as $l) : ?>
        <tr>
            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
            <td data-value="<?= $l['nama'] ?>"><?= $l['nama']; ?></td>
            <td data-value="<?= $l['nama_anggota'] ?>"><?= $l['nama_anggota']; ?></td>
            <td data-value="<?= $l['luas'] ?>"><?= $l['luas']; ?></td>
            <td data-value="<?= $l['status'] ?>"><?= $l['status']; ?></td>
            <?php if ($from == "") : ?>
                <td><?php if (is_null($l['verifikasi_lahan'])) : ?>
                        <div class="badge badge-info">Diproses</div>
                    <?php elseif ($l['verifikasi_lahan'] == "revisi") : ?>
                        <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $kp['nama'] ?>" data-catatan="<?= $kp['catatan'] ?>">Revisi</a>
                    <?php else : ?>
                        <div class="badge badge-success">Terverifikasi</div>
                    <?php endif ?>
                </td>
                <td>
                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#addLahan" data-title="Edit Lahan" data-button="Edit" data-id="<?= $l['id_lahan'] ?>" data-nama="<?= $l['id'] ?>" data-luas="<?= $l['luas'] ?>" data-status="<?= $l['id_status'] ?>" data-anggota="<?= $l['id_anggota'] ?>">edit</a>

                    <a href="deleteLahan/<?= $l['id_lahan']; ?>" class="badge badge-danger" onclick="return confirm('Yakin hapus Lahan dari &quot;<?= $l['nama']; ?>&quot; ?');">delete</a>
                </td>
            <?php elseif ($from == 'kota') : ?>
                <td>
                    <?php if (is_null($l['verifikasi_lahan'])) : ?>
                        <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Lahan <?= $l['nama_anggota'] ?>" data-id="<?= $l['id'] ?>" data-url="verifikasiLahan" class="badge badge-warning">Verifikasi</a>
                    <?php elseif ($l['verifikasi_lahan'] == "revisi") : ?>
                        <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Lahan <?= $l['nama_anggota'] ?>" data-id="<?= $l['id'] ?>" data-url="verifikasiLahan" class="badge badge-warning">Revisi</a>
                    <?php else : ?>
                        <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Lahan <?= $l['nama_anggota'] ?>" data-id="<?= $l['id'] ?>" data-url="verifikasiLahan" class="badge badge-success">Terverifikasi</a>
                    <?php endif ?>
                </td>
            <?php else : ?>
                <td>
                    <?php if (is_null($l['verifikasi_lahan'])) : ?>
                        <div class="badge badge-info">Diproses</div>
                    <?php elseif ($l['verifikasi_lahan'] == "revisi") : ?>
                        <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $l['nama'] ?>" data-catatan="<?= $l['catatan_lahan'] ?>">Revisi</a>
                    <?php else : ?>
                        <div class="badge badge-success">Terverifikasi</div>
                    <?php endif ?>
                </td>
            <?php endif ?>

        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>

<?php else : ?>
    <tr>
        <td colspan="6" style="text-align: center;">
            Data Tidak Ditemukan.....
        </td>
    </tr>
<?php endif ?>