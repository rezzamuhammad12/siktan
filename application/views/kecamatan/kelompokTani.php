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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addKelompokPetani">Tambah Kelompok Tani</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Penyuluh Pendamping</th>
                        <th scope="col">Desa</th>
                        <th scope="col">Skor</th>
                        <th scope="col">Disetujui</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kelompokTani as $kp) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $kp['nama']; ?></td>
                            <td><?= $kp['nama_penyuluh']; ?></td>
                            <td><?= $kp['desa']; ?></td>
                            <td><?= $kp['skor']; ?></td>
                            <td><?= is_null($kp['approved_by']) ? "diproses" : $kp['approved_by'] ?></td>
                            <td>
                                <a href="" class="badge badge-info" data-toggle="modal" data-target="#detailKelompokTani" data-userid="<?= $kp['id']; ?>" data-nama="<?= $kp['nama']; ?>" data-penyuluh="<?= $kp['nama_penyuluh']; ?>" data-desa="<?= $kp['desa']; ?>" data-kecamatan="<?= $kp['kecamatan']; ?>" data-kota="<?= $kp['kota_kab']; ?>" data-tahun_pembentukan="<?= $kp['tahun_pembentukan']; ?>" data-alamat="<?= $kp['alamat']; ?>" data-kelas="<?= $kp['kelas']; ?>" data-skor="<?= $kp['skor']; ?>" data-tahun_penerapan="<?= $kp['tahun_penerapan']; ?>" data-teknologi="<?= $kp['teknologi']; ?>">detail</a>
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


<!-- Modal Tambah Kelompok Petani -->

<div class="modal fade" id="addKelompokPetani" tabindex="-1" role="dialog" aria-labelledby="addKelompokPetaniLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKelompokPetaniLabel">Tambah Kelompok Petani</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kecamatan/kelompokTani'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kelompok Tani">
                    </div>
                    <div class="form-group">
                        <select name="penyuluh" id="penyuluh" class="form-control">
                            <option value="">Pilih Penyuluh</option>
                            <?php foreach ($penyuluh as $p) : ?>
                                <option value="<?= $p['id']; ?>"><?= $p['nama']; ?> (<?= $p['nip']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_kota" id="id_kota" class="form-control">
                            <?php if (!(is_null($user['id_kota']))) : ?>
                                <option value="<?= $user['id_kota']; ?>">Pilih Kota/Kabupaten</option>
                            <?php else : ?>
                                <option value="">Pilih Kota/Kabupaten</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_kecamatan" id="id_kecamatan" class="form-control">
                            <?php if (!(is_null($user['id_kecamatan']))) : ?>
                                <option value="<?= $user['id_kecamatan']; ?>">Pilih Kecamatan</option>
                            <?php else : ?>
                                <option value="null">Pilih Kecamatan</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="id_desa" id="id_desa" class="form-control" disabled>
                            <option value="">Pilih Desa</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="bpp" name="bpp" placeholder="Balai Pelatihan Pertanian">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>

                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="tahun_pembentukan" name="tahun_pembentukan" placeholder="Tahun Pembentukan">
                    </div>

                    <div class="form-group">
                        <select name="id_kelas" id="id_kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($listKelas as $lk) : ?>
                                <option value="<?= $lk['id']; ?>"><?= $lk['kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="skor" name="skor" placeholder="Skor">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="tahun_penerapan" name="tahun_penerapan" placeholder="Tahun Penerapan">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="teknologi" name="teknologi" placeholder="Teknologi yang digunakan">
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


<!-- Modal Detail Kelompok Petani -->

<div class="modal fade" id="detailKelompokTani" tabindex="-1" role="dialog" aria-labelledby="detailKelompokTaniLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="detailKelompokTaniLabel">Detail Kelompok </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Penyuluh Pendamping</td>
                        <td>:</td>
                        <td class="penyuluh"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td class="alamat"></td>
                    </tr>
                    <tr>
                        <td>desa</td>
                        <td>:</td>
                        <td class="desa"></td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td class="kecamatan"></td>
                    </tr>
                    <tr>
                        <td>Kota/Kabupaten</td>
                        <td>:</td>
                        <td class="kota"></td>
                    </tr>
                    <tr>
                        <td>Tahun Pembentukan</td>
                        <td>:</td>
                        <td class="tahun_pembentukan"></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td class="kelas"></td>
                    </tr>
                    <tr>
                        <td>Skor</td>
                        <td>:</td>
                        <td class="skor"></td>
                    </tr>

                    <tr>
                        <td>Teknologi</td>
                        <td>:</td>
                        <td class="teknologi"></td>
                    </tr>
                </tbody>
            </table>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>