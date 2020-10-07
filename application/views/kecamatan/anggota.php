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
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAnggota" data-title="Tambah Anggota" data-button="Add">Tambah Anggota</a>
                <button type="button" class="btn btn-secondary ml-auto mb-3">
                    Jumlah Anggota : <span class="badge badge-light"><?= $total_anggota; ?></span>
                </button>
                <div class="btn-group ml-2">
                    <select name="filter_anggota" id="filter_anggota" class="filter-form form-control">
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
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Status Anggota</th>
                        <th scope="col">Disetujui</th>
                        <th scope="col" data-defaultsort="disabled">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody-anggota">
                    <?php $i = 1; ?>
                    <?php foreach ($anggota as $agt) : ?>
                        <tr>
                            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
                            <td data-value="<?= $agt['nama_kelompok']; ?>"><?= $agt['nama_kelompok']; ?></td>
                            <td data-value="<?= $agt['nama']; ?>"><?= $agt['nama']; ?></td>
                            <td data-value="<?= $agt['nik']; ?>"><?= $agt['nik']; ?></td>
                            <td data-value="<?= $agt['status']; ?>"><?= $agt['status']; ?></td>
                            <td><?php if (is_null($agt['verifikasi'])) : ?>
                                    <div class="badge badge-info">Diproses</div>
                                <?php elseif ($agt['verifikasi'] == "revisi") : ?>
                                    <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $agt['nama'] ?>" data-catatan="<?= $agt['catatan'] ?>">Revisi</a>
                                <?php else : ?>
                                    <div class="badge badge-success">Terverifikasi</div>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="" class="badge badge-success " data-toggle="modal" data-target="#addAnggota" data-title="Edit Anggota" data-button="Edit" data-id="<?= $agt['id']; ?>" data-namaKelompok="<?= $agt['id_kelompok']; ?>" data-nik="<?= $agt['nik']; ?>" data-nama="<?= $agt['nama']; ?>" data-status="<?= $agt['id_status']; ?>">edit</a>
                                <a href="deleteAnggota/<?= $agt['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin hapus Anggota &quot;<?= $agt['nama']; ?>&quot; dari &quot;<?= $agt['nama_kelompok']; ?>&quot; ?');">delete</a>
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

<div class="modal fade" id="addAnggota" tabindex="-1" role="dialog" aria-labelledby="addAnggotaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAnggotaLabel">Tambah Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kecamatan/anggota'); ?>" method="post">
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
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
                    </div>
                    <div class="form-group">
                        <select name="id_status" id="id_status" class="form-control">
                            <option value="">Pilih Status Anggota</option>
                            <?php foreach ($listStatusAnggota as $lsa) : ?>
                                <option value="<?= $lsa['id']; ?>"><?= $lsa['status']; ?></option>
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