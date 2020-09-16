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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addLahan" data-title="Tambah Lahan" data-button="Add">Tambah Lahan</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kelompok</th>
                        <th scope="col">Luas Lahan</th>
                        <th scope="col">Status Kepemilikan</th>
                        <th scope="col">Disetujui</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($lahan as $l) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $l['nama']; ?></td>
                            <td><?= $l['luas']; ?></td>
                            <td><?= $l['status']; ?></td>
                            <td><?= is_null($l['approved_by']) ? "diproses" : $l['approved_by'] ?></td>
                            <td>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#addLahan" data-title="Edit Lahan" data-button="Edit" data-id="<?= $l['id_lahan'] ?>" data-nama="<?= $l['id'] ?>" data-luas="<?= $l['luas'] ?>" data-status="<?= $l['id_status'] ?>">edit</a>
                                <a href="deleteLahan/<?= $l['id_lahan']; ?>" class="badge badge-danger" onclick="return confirm('Yakin hapus Lahan dari &quot;<?= $l['nama']; ?>&quot; ?');">delete</a>
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

<div class="modal fade" id="addLahan" tabindex="-1" role="dialog" aria-labelledby="addLahanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLahanLabel">Tambah Lahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kecamatan/lahan'); ?>" method="post">
                <div class="modal-body">
                    <input type="text" class="form-control" id="id" name="id" hidden>
                    <div class="form-group">
                        <select name="id_kelompok" id="id_kelompok" class="form-control">
                            <option value="">Pilih Kelompok</option>
                            <?php foreach ($kelompokTani as $kt) : ?>
                                <option value="<?= $kt['id']; ?>"><?= $kt['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_status_kepemilikan" id="id_status_kepemilikan" class="form-control">
                            <option value="">Pilih Status</option>
                            <?php foreach ($listStatusKepemilikan as $lsk) : ?>
                                <option value="<?= $lsk['id']; ?>"><?= $lsk['status']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="luas" name="luas" placeholder="Luas Lahan">
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