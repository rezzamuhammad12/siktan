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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addPenyuluh" data-title="Tambah Penyuluh" data-button="Add">Tambah Penyuluh</a>

            <table class="table table-hover sortable">
                <thead>
                    <tr>
                        <th scope="col" data-defaultsort="true">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIP</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Status</th>
                        <th scope="col" data-defaultsort="disabled">Disetujui</th>
                        <th scope="col" data-defaultsort="disabled">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penyuluh as $p) : ?>
                        <tr>
                            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
                            <td data-value="<?= $p['nama'] ?>"><?= $p['nama']; ?></td>
                            <td data-value="<?= $p['nip'] ?>"><?= $p['nip']; ?></td>
                            <td data-value="<?= $p['nik'] ?>"><?= $p['nik']; ?></td>
                            <td data-value="<?= $p['status'] ?>"><?= $p['status']; ?></td>
                            <td><?= is_null($p['approved_by']) ? "diproses" : $p['approved_by'] ?></td>
                            <td>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#addPenyuluh" data-title="Edit Penyuluh" data-button="Edit" data-nama="<?= $p['nama']; ?>" data-status="<?= $p['id_status']; ?>" data-nip="<?= $p['nip']; ?>" data-nik="<?= $p['nik']; ?>" data-id="<?= $p['id']; ?>">edit</a>
                                <a href="deletePenyuluh/<?= $p['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin hapus &quot;<?= $p['nama']; ?>&quot; ?');">delete</a>
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

<div class="modal fade" id="addPenyuluh" tabindex="-1" role="dialog" aria-labelledby="addPenyuluhLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPenyuluhLabel">Tambah Penyuluh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kecamatan/penyuluh'); ?>" method="post">
                <div class="modal-body">
                    <input type="text" class="form-control" id="id" name="id" hidden>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penyuluh">
                    </div>
                    <div class="form-group">
                        <select name="status" id="status" class="form-control">
                            <option value="">Pilih Status</option>
                            <?php foreach ($listStatus as $ls) : ?>
                                <option value="<?= $ls['id']; ?>"><?= $ls['status']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Nomer Identitas Pegawai">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Nomer Induk Kependudukan">
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