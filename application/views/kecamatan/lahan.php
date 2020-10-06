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
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addLahan" data-title="Tambah Lahan" data-button="Add">Tambah Lahan</a>
                <button type="button" class="btn btn-secondary ml-auto mb-3 float-right">
                    Jumlah Pemilik Lahan : <span class="badge badge-light"><?= $total_lahan; ?></span>
                </button>
                <div class="btn-group ml-auto">
                    <select name="filter_lahan" id="filter_lahan" class="filter-form form-control">
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
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Luas Lahan(ha)</th>
                        <th scope="col">Status Kepemilikan</th>
                        <th scope="col" data-defaultsort="disabled">Disetujui</th>
                        <th scope="col" data-defaultsort="disabled">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody-lahan">
                    <?php $i = 1; ?>
                    <?php foreach ($lahan as $l) : ?>
                        <tr>
                            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
                            <td data-value="<?= $l['nama'] ?>"><?= $l['nama']; ?></td>
                            <td data-value="<?= $l['nama_anggota'] ?>"><?= $l['nama_anggota']; ?></td>
                            <td data-value="<?= $l['luas'] ?>"><?= $l['luas']; ?></td>
                            <td data-value="<?= $l['status'] ?>"><?= $l['status']; ?></td>
                            <td><?php if (is_null($l['verifikasi_lahan'])) : ?>
                                    <div class="badge badge-info">Diproses</div>
                                <?php elseif ($l['verifikasi_lahan'] == "revisi") : ?>
                                    <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $kp['nama'] ?>" data-catatan="<?= $kp['catatan'] ?>">Revisi</a>
                                <?php else : ?>
                                    <div class="badge badge-success">Terverifikasi</div>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#addLahan" data-title="Edit Lahan" data-button="Edit" data-id="<?= $l['id_lahan'] ?>" data-nama="<?= $l['id'] ?>" data-luas="<?= $l['luas'] ?>" data-status="<?= $l['id_status'] ?>" data-anggota="<?= $l['id_anggota'] ?>">edit</a>

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
                        <select name="id_anggota" id="id_anggota" class="form-control" disabled>
                            <option value="">Pilih Anggota</option>
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