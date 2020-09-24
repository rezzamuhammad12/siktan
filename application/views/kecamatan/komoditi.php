<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addKomoditi" data-title="Tambah Komoditi" data-button="Add">Tambah Komoditi</a>

            <table class="table table-hover sortable">
                <thead>
                    <tr>
                        <th scope="col" data-defaultsort="true">#</th>
                        <th scope="col">Nama Kelompok</th>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Subsektor</th>
                        <th scope="col">Komoditas</th>
                        <th scope="col" data-defaultsort="disabled">Disetujui</th>
                        <th scope="col" data-defaultsort="disabled">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($komoditi as $km) : ?>
                        <tr>
                            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
                            <td data-value="<?= $km['nama']; ?>"><?= $km['nama']; ?></td>
                            <td data-value="<?= $km['nama_anggota']; ?>"><?= $km['nama_anggota']; ?></td>
                            <td data-value="<?= $km['subsektor']; ?>"><?= $km['subsektor']; ?></td>
                            <td data-value="<?= $km['komoditas']; ?>"><?= $km['komoditas']; ?></td>
                            <td><?= is_null($km['approved_by']) ? "diproses" : $km['approved_by'] ?></td>
                            <td>
                                <a href="" class="badge badge-success " data-toggle="modal" data-target="#addKomoditi" data-title="Edit Komoditi" data-button="Edit" data-id="<?= $km['id']; ?>" data-nama="<?= $km['id_kelompok']; ?>" data-anggota="<?= $km['id_anggota']; ?>" data-subsektor="<?= $km['id_subsektor']; ?>" data-komoditas="<?= $km['id_komoditas']; ?>">edit</a>
                                <a href="deleteKomoditi/<?= $km['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin hapus Komditi dari &quot;<?= $km['nama']; ?>&quot; ?');">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="addKomoditi" tabindex="-1" role="dialog" aria-labelledby="addKomoditiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKomoditiLabel">Tambah Komoditi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kecamatan/komoditi'); ?>" method="post">
                <div class="modal-body">
                    <input type="text" name="id" id="id" hidden>
                    <div class="form-group">
                        <select name="id_kelompok" id="id_kelompok" class="form-control">
                            <option value="">Pilih Kelompok</option>
                            <?php foreach ($kelompokTani as $kt) : ?>
                                <option value="<?= $kt['id']; ?>"><?= $kt['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_anggota" id="id_anggota" class="form-control" disabled>
                            <option value="">Pilih Anggota</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_subsektor" id="id_subsektor" class="form-control">
                            <option value="">Pilih Subsektor</option>
                            <?php foreach ($listSubsektor as $lss) : ?>
                                <option value="<?= $lss['id']; ?>"><?= $lss['subsektor']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_komoditas" id="id_komoditas" class="form-control">
                            <option value="">Pilih Komoditas</option>
                            <?php foreach ($listKomoditas as $lk) : ?>
                                <option value="<?= $lk['id']; ?>"><?= $lk['komoditas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary action">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>