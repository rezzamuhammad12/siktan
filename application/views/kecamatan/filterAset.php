<?php if (!empty($aset)) : ?>
    <?php $i = 1; ?>
    <?php foreach ($aset as $a) : ?>
        <tr>
            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
            <td data-value="<?= $a['nama_kelompok']; ?>"><?= $a['nama_kelompok']; ?></td>
            <td data-value="<?= $a['nama']; ?>"><?= $a['nama']; ?></td>
            <td data-value="<?= $a['sumber_perolehan']; ?>"><?= $a['sumber_perolehan']; ?></td>
            <td data-value="<?= $a['jumlah']; ?>"><?= $a['jumlah']; ?></td>
            <td data-value="<?= $a['tahun_perolehan']; ?>"><?= $a['tahun_perolehan']; ?></td>
            <td><?= is_null($a['approved_by']) ? "diproses" : $a['approved_by'] ?></td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>

<?php else : ?>
    <tr>
        <td colspan="7" style="text-align: center;">
            Data Tidak Ditemukan.....
        </td>
    </tr>
<?php endif ?>