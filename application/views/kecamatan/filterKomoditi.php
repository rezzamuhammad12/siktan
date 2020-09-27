<?php if (!empty($komoditi)) : ?>
    <?php if ($from = '') : ?>
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
                <td>
                    <a href="" class="badge badge-success " data-toggle="modal" data-target="#addKomoditi" data-title="Edit Komoditi" data-button="Edit" data-id="<?= $km['id']; ?>" data-nama="<?= $km['id_kelompok']; ?>" data-anggota="<?= $km['id_anggota']; ?>" data-subsektor="<?= $km['id_subsektor']; ?>" data-komoditas="<?= $km['id_komoditas']; ?>">edit</a>
                    <a href="deleteKomoditi/<?= $km['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin hapus Komditi dari &quot;<?= $km['nama']; ?>&quot; ?');">delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    <?php else : ?>
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
    <?php endif ?>

<?php else : ?>
    <tr>
        <td colspan="6" style="text-align: center;">
            Data Tidak Ditemukan.....
        </td>
    </tr>
<?php endif ?>