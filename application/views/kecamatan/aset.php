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

            <div class="btn-toolbar">
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAset" data-title="Tambah Aset" data-button="Add">Tambah Aset</a>
                <button type="button" class="btn btn-secondary ml-auto mb-3 float-right">
                    Jumlah Aset : <span class="badge badge-light"><?= $total_aset; ?></span>
                </button>
                <div class="btn-group ml-2">
                    <select name="filter_aset" id="filter_aset" class="filter-form form-control">
                        <option value="">Kelompok</option>
                        <?php foreach ($kelompokTani as $kp) : ?>
                            <option value="<?= $kp['id'] ?>"><?= $kp['nama'] ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <table class="table table-hover sortable">
                <thead>
                    <tr>
                        <th scope="col" data-defaultsort="true">#</th>
                        <th scope="col">Nama Kelompok</th>
                        <th scope="col">Nama Aset</th>
                        <th scope="col">Sumber Perolehan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tahun Perolehan</th>
                        <th scope="col" data-defaultsort="disabled">Disetujui</th>
                        <th scope="col" data-defaultsort="disabled">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody-aset">
                    <?php $i = 1; ?>
                    <?php foreach ($aset as $a) : ?>
                        <tr>
                            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
                            <td data-value="<?= $a['nama_kelompok']; ?>"><?= $a['nama_kelompok']; ?></td>
                            <td data-value="<?= $a['nama']; ?>"><?= $a['nama']; ?></td>
                            <td data-value="<?= $a['sumber_perolehan']; ?>"><?= $a['sumber_perolehan']; ?></td>
                            <td data-value="<?= $a['jumlah']; ?>"><?= $a['jumlah']; ?></td>
                            <td data-value="<?= $a['tahun_perolehan']; ?>"><?= $a['tahun_perolehan']; ?></td>
                            <td><?php if (is_null($a['verifikasi'])) : ?>
                                    <div class="badge badge-info">Diproses</div>
                                <?php elseif ($a['verifikasi'] == "revisi") : ?>
                                    <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $a['nama'] ?>" data-catatan="<?= $a['catatan'] ?>">Revisi</a>
                                <?php else : ?>
                                    <div class="badge badge-success">Terverifikasi</div>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#addAset" data-title="Edit Aset" data-button="Edit" data-id="<?= $a['id']; ?>" data-kelompok="<?= $a['id_kelompok']; ?>" data-nama="<?= $a['nama']; ?>" data-sumber="<?= $a['id_sumber']; ?>" data-jumlah="<?= $a['jumlah']; ?>" data-tahun="<?= $a['tahun_perolehan']; ?>">edit</a>
                                <a href="deleteAset/<?= $a['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin hapus &quot;<?= $a['nama']; ?>&quot; dari kelompok <?= $a['nama_kelompok']; ?>?');">delete</a>
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
                    <button type="submit" class="btn btn-primary action">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Catatan -->

<div class="modal fade" id="catatanRevisi" tabindex="-1" role="dialog" aria-labelledby="catatanRevisiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="catatanRevisiLabel">Catatan Revisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="catatan"></p>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>