<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Master Kelompok Tani -->
    <!-- Page Heading -->
    <h2 class="h2 mb-4 text-gray-800"><?= $title; ?></h2>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <h3 class="h3 mt-3 text-gray-800">Kelompok Tani</h3>


            <div class="card card-body">
                <div class="btn-toolbar">
                    <form action="<?= base_url('kecamatan/export_excel'); ?>" method="post">
                        <div class="btn-group mr-2">
                            <select name="kota_filter" id="kota_filter" class="filter-form form-control" readonly="readonly">
                                <?php if (!(is_null($user['id_kota']))) : ?>
                                    <option value="<?= $user['id_kota']; ?>">Pilih Kabupaten/Kota</option>
                                <?php else : ?>
                                    <option value="">Kota</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="btn-group mr-2">
                            <select name="kecamatan_filter" id="kecamatan_filter" class="filter-form form-control" disabled>
                                <?php if (!(is_null($user['id_kecamatan']))) : ?>
                                    <option value="<?= $user['id_kecamatan']; ?>">Pilih Kecamatan</option>
                                <?php else : ?>
                                    <option value="">Kecamatan</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="btn-group mr-2">
                            <select name="desa_filter" id="desa_filter" class="filter-form form-control" disabled>
                                <option value="">Kelurahan/Desa</option>
                            </select>
                        </div>

                        <button type="button" id="gofilter" class="btn btn-success mr-2">Go Filter</button>
                        <button type="submit" class="btn btn-warning mr-2">Export</button>
                    </form>

                </div>
            </div>
            <!-- Import excel -->
            <form method="post" enctype="multipart/form-data" action="kecamatan/import_excel">
                <div class="form-group">
                    <label for="exampleInputFile">File Upload</label>
                    <input type="file" name="berkas_excel" class="form-control" id="exampleInputFile">
                </div>

                <button type="submit" class="btn btn-info mr-2 mb-3">import</button>
                <!-- <a href="<?= base_url('kecamatan/import_excel'); ?>" class="btn btn-info mr-2">Import</a> -->
            </form>

            <?= $this->session->flashdata('import_message'); ?>

            <!-- End Import excel -->

            <table class="table table-hover tabel-kelompok-tani sortable">
                <thead>
                    <tr>
                        <th scope="col" data-defaultsort="true">#</th>
                        <th scope="col">Kode Kelompok</th>
                        <th scope="col">Nama Kelompok</th>
                        <th scope="col">Penyuluh Pendamping</th>
                        <th scope="col">Kabupaten/Kota</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Kelurahan/Desa</th>
                        <th scope="col">Skor</th>
                        <th scope="col" data-defaultsort="disabled">Disetujui</th>
                        <th scope="col" data-defaultsort="disabled">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody-kelompok">
                    <?php $i = 1; ?>
                    <?php foreach ($kelompokTani as $kp) : ?>
                        <tr>
                            <th scope="row" data-value="<?= $i; ?>"><?= $i; ?></th>
                            <td data-value="<?= $kp['kode_kelompok']; ?>"><?= $kp['kode_kelompok']; ?></td>
                            <td data-value="<?= $kp['nama']; ?>"><?= $kp['nama']; ?></td>
                            <td data-value="<?= $kp['nama_penyuluh']; ?>"><?= $kp['nama_penyuluh']; ?></td>
                            <td class="kota" data-value="<?= $kp['kota_kab']; ?>"><?= $kp['kota_kab']; ?></td>
                            <td class="kecamatan" data-value="<?= $kp['kecamatan']; ?>"><?= $kp['kecamatan']; ?></td>
                            <td class="desa" data-value="<?= $kp['desa']; ?>"><?= $kp['desa']; ?></td>
                            <td data-value="<?= $kp['skor']; ?>"><?= $kp['skor']; ?></td>
                            <td><?php if (is_null($kp['verifikasi'])) : ?>
                                    <div class="badge badge-info">Diproses</div>
                                <?php elseif ($kp['verifikasi'] == "revisi") : ?>
                                    <a href="" data-toggle="modal" data-target="#catatanRevisi" class="badge badge-warning" data-title="Catatan Revisi Kelompok <?= $kp['nama'] ?>" data-catatan="<?= $kp['catatan'] ?>">Revisi</a>
                                <?php else : ?>
                                    <div class="badge badge-success">Terverifikasi</div>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="<?= base_url('kecamatan/detailMasterData/') ?><?= $kp['id']; ?>" class="badge badge-info">Detail</a>
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