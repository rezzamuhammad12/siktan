<?php if (!empty($lahan)) : ?>
    <?php $i = 1; ?>
    <?php foreach ($lahan as $l) : ?>
        <tr>
            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
            <td data-value="<?= $l['nama'] ?>"><?= $l['nama']; ?></td>
            <td data-value="<?= $l['nama_anggota'] ?>"><?= $l['nama_anggota']; ?></td>
            <td data-value="<?= $l['luas'] ?>"><?= $l['luas']; ?></td>
            <td data-value="<?= $l['status'] ?>"><?= $l['status']; ?></td>
            <td><?= is_null($l['approved_by']) ? "diproses" : $l['approved_by'] ?></td>
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