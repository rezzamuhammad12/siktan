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
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addKomoditi" data-title="Tambah Komoditi" data-button="Add">Tambah Komoditi</a>
                <button type="button" class="btn btn-secondary ml-auto mb-3">
                    Jumlah Komoditi : <span class="badge badge-light"><?= $total_komoditi; ?></span>
                </button>
                <div class="btn-group ml-2">
                    <select name="filter_komoditi" id="filter_komoditi" class="filter-form form-control">
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
                        <th scope="col">Subsektor</th>
                        <th scope="col">Komoditas</th>
                        <th scope="col" data-defaultsort="disabled">Disetujui</th>
                        <th scope="col" data-defaultsort="disabled">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody-komoditi">
                    <?php $i = 1; ?>
                    <?php foreach ($komoditi as $km) : ?>
                        <tr>
                            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
                            <td data-value="<?= $km['nama']; ?>"><?= $km['nama']; ?></td>
                            <td data-value="<?= $km['nama_anggota']; ?>"><?= $km['nama_anggota']; ?></td>
                            <td data-value="<?= $km['subsektor']; ?>"><?= $km['subsektor']; ?></td>
                            <td data-value="<?= $km['komoditas']; ?>"><?= $km['komoditas']; ?></td>
                            <td><?php if (is_null($km['verifikasi'])) : ?>
                                    <div class="badge badge-info">Diproses</div>
                                <?php elseif ($km['verifikasi'] == "revisi") : ?>
                                    <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $km['nama'] ?>" data-catatan="<?= $km['catatan'] ?>">Revisi</a>
                                <?php else : ?>
                                    <div class="badge badge-success">Terverifikasi</div>
                                <?php endif ?>
                            </td>
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