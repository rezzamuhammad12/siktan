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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAset">Tambah Aset</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kelompok</th>
                        <th scope="col">Nama Aset</th>
                        <th scope="col">Sumber Perolehan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tahun Perolehan</th>
                        <th scope="col">Disetujui</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($aset as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['jumlah']; ?></td>
                            <td><?= $a['sumber_perolehan']; ?></td>
                            <td><?= $a['tahun_perolehan']; ?></td>
                            <td><?= is_null($a['approved_by']) ? "diproses" : $a['approved_by'] ?></td>
                            <td>
                                <a href="" class="badge badge-success">edit</a>
                                <a href="" class="badge badge-danger">delete</a>
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

<div class="modal fade" id="addAset" tabindex="-1" role="dialog" aria-labelledby="addAsetLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAsetLabel">Tambah Aset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kecamatan/aset'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="id_kelompok" id="id_kelompok" class="form-control">
                            <option value="">Pilih Kelompok</option>
                            <?php foreach ($kelompokTani as $kt) : ?>
                                <option value="<?= $kt['id']; ?>"><?= $kt['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Aset">
                    </div>
                    <div class="form-group">
                        <select name="id_sumber_perolehan" id="id_sumber_perolehan" class="form-control">
                            <option value="">Pilih Sumber Perolehan</option>
                            <?php foreach ($listSumberPerolehan as $lsp) : ?>
                                <option value="<?= $lsp['id']; ?>"><?= $lsp['sumber_perolehan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Aset">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tahun_perolehan" name="tahun_perolehan" placeholder="Tahun Perolehan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>