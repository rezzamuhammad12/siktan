<?php if (!empty($anggota)) : ?>
    <?php $i = 1; ?>
    <?php foreach ($anggota as $agt) : ?>
        <tr>
            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
            <td data-value="<?= $agt['nama_kelompok']; ?>"><?= $agt['nama_kelompok']; ?></td>
            <td data-value="<?= $agt['nik']; ?>"><?= $agt['nik']; ?></td>
            <td data-value="<?= $agt['nama']; ?>"><?= $agt['nama']; ?></td>
            <td data-value="<?= $agt['status']; ?>"><?= $agt['status']; ?></td>

            <?php if ($from == "") : ?>
                <td><?php if (is_null($agt['verifikasi'])) : ?>
                        <div class="badge badge-info">Diproses</div>
                    <?php elseif ($agt['verifikasi'] == "revisi") : ?>
                        <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $agt['nama'] ?>" data-catatan="<?= $agt['catatan'] ?>">Revisi</a>
                    <?php else : ?>
                        <div class="badge badge-success">Terverifikasi</div>
                    <?php endif ?>
                </td>
                <td>
                    <a href="" class="badge badge-success " data-toggle="modal" data-target="#addAnggota" data-title="Edit Anggota" data-button="Edit" data-id="<?= $agt['id']; ?>" data-namaKelompok="<?= $agt['id_kelompok']; ?>" data-nik="<?= $agt['nik']; ?>" data-nama="<?= $agt['nama']; ?>" data-status="<?= $agt['id_status']; ?>">edit</a>
                    <a href="deleteAnggota/<?= $agt['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin hapus Anggota &quot;<?= $agt['nama']; ?>&quot; dari &quot;<?= $agt['nama_kelompok']; ?>&quot; ?');">delete</a>
                </td>
            <?php elseif ($from == 'kota') : ?>
                <td><?php if (is_null($agt['verifikasi'])) : ?>
                        <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Anggota <?= $agt['nama'] ?> dari kelompok <?= $agt['nama_kelompok']; ?>" data-id=" <?= $agt['id'] ?>" data-url="verifikasiAnggota" class="badge badge-warning">Verifikasi</a>
                    <?php elseif ($agt['verifikasi'] == "revisi") : ?>
                        <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Anggota <?= $agt['nama'] ?> dari kelompok <?= $agt['nama_kelompok']; ?>" data-id="<?= $agt['id'] ?>" data-url="verifikasiAnggota" class="badge badge-warning">Revisi</a>
                    <?php else : ?>
                        <a href="" data-toggle="modal" data-target="#modalVerifikasi" data-title="Verifikasi Anggota <?= $agt['nama'] ?> dari kelompok <?= $agt['nama_kelompok']; ?>" data-id="<?= $agt['id'] ?>" data-url="verifikasiAnggota" class="badge badge-success">Terverifikasi</a>
                    <?php endif ?>
                </td>
            <?php else : ?>
                <td><?php if (is_null($agt['verifikasi'])) : ?>
                        <div class="badge badge-info">Diproses</div>
                    <?php elseif ($agt['verifikasi'] == "revisi") : ?>
                        <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $agt['nama'] ?>" data-catatan="<?= $agt['catatan'] ?>">Revisi</a>
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
        <td colspan="5" style="text-align: center;">
            Data Tidak Ditemukan.....
        </td>
    </tr>
<?php endif ?>