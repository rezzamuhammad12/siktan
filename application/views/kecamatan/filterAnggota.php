<?php if (!empty($anggota)) : ?>
    <?php $i = 1; ?>
    <?php foreach ($anggota as $agt) : ?>
        <tr>
            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
            <td data-value="<?= $agt['nama_kelompok']; ?>"><?= $agt['nama_kelompok']; ?></td>
            <td data-value="<?= $agt['nik']; ?>"><?= $agt['nik']; ?></td>
            <td data-value="<?= $agt['nama']; ?>"><?= $agt['nama']; ?></td>
            <td data-value="<?= $agt['status']; ?>"><?= $agt['status']; ?></td>
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