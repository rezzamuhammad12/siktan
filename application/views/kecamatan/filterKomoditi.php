<?php if (!empty($komoditi)) : ?>
    <?php $i = 1; ?>
    <?php foreach ($komoditi as $km) : ?>
        <tr>
            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
            <td data-value="<?= $km['nama']; ?>"><?= $km['nama']; ?></td>
            <td data-value="<?= $km['nama_anggota']; ?>"><?= $km['nama_anggota']; ?></td>
            <td data-value="<?= $km['subsektor']; ?>"><?= $km['subsektor']; ?></td>
            <td data-value="<?= $km['komoditas']; ?>"><?= $km['komoditas']; ?></td>
            <td><?= is_null($km['approved_by']) ? "diproses" : $km['approved_by'] ?></td>
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