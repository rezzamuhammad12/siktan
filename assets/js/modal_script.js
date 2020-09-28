// Baseurl

var base_url = window.location.origin + "/siktan-jabar/";

$('#addPenyuluh').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var title = button.data('title')
    var btn = button.data('button')

    var id = button.data('id')
    var nama = button.data('nama')
    var status = button.data('status')
    var nip = button.data('nip')
    var nik = button.data('nik')

    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.action').text(btn);

    modal.find('#id').val(id);
    modal.find('#nama').val(nama);
    modal.find('#status option[value="' + status + '"]').prop('selected', true)
    modal.find('#nip').val(nip);
    modal.find('#nik').val(nik);

    if (btn == 'Add') {
        $('.modal-content form').attr('action', "penyuluh")
        modal.find('#id').val("");
        modal.find('#nama').val("");
        modal.find('#status option:eq(0)').prop('selected', true)
        modal.find('#nip').val("");
        modal.find('#nik').val("");
    } else {
        $('.modal-content form').attr('action', "editPenyuluh")
    }
})

// Lahan

$('#addLahan').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var title = button.data('title')
    var btn = button.data('button')

    var id = button.data('id')
    var nama = button.data('nama')
    var anggota = button.data('anggota')
    var luas = button.data('luas')
    var status = button.data('status')

    getListAnggota(id)

    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.action').text(btn);

    modal.find('#id').val(id);
    modal.find('#id_kelompok option[value="' + nama + '"]').prop('selected', true)
    modal.find('#id_anggota option[value="' + anggota + '"]').prop('selected', true)
    modal.find('#luas').val(luas);
    modal.find('#id_status_kepemilikan option[value="' + status + '"]').prop('selected', true)

    if (btn == 'Add') {
        modal.find('#id_anggota').attr('disabled', true)
        $('.modal-content form').attr('action', "lahan")
        modal.find('#id').val("");
        modal.find('#id_kelompok option:eq(0)').prop('selected', true)
        modal.find('#id_anggota option:eq(0)').prop('selected', true)
        modal.find('#luas').val(luas);
        modal.find('#id_status_kepemilikan option:eq(0)').prop('selected', true)
    } else {
        modal.find('#id_anggota').removeAttr('disabled')
        $('.modal-content form').attr('action', "editLahan")
    }
})


$('#id_kelompok').on('change', function () {
    var id = $(this).val();
    $('#id_anggota')
        .find('option:not(:first-child)')
        .remove()
        .end()

    if (id) {
        $('#id_anggota').removeAttr('disabled');
        getListAnggota(id)
    } else {
        $('#id_anggota').attr('disabled', true);
    }
})

$('#id_subsektor').on('change', function () {
    var id = $(this).val();
    $('#id_komoditas')
        .find('option:not(:first-child)')
        .remove()
        .end()

    if (id) {
        $('#id_komoditas').removeAttr('disabled');
        $.ajax({
            url: window.location.origin + '/siktan-jabar/kecamatan/getListKomoditas',
            type: 'POST',
            async: false,
            data: {
                id: id,
            },
            dataType: 'json',
            success: function (result) {
                $.each(result, function (key, value) {
                    $('#id_komoditas')
                        .append($("<option></option>")
                            .attr("value", value['id'])
                            .text(value['komoditas']));
                });
            },
            error: err => console.log(err),
        })
    } else {
        $('#id_anggota').attr('disabled', true);
    }
})

function getListKomoditas(id) {
    $.ajax({
        url: window.location.origin + '/siktan-jabar/kecamatan/getListKomoditas',
        type: 'POST',
        async: false,
        data: {
            id: id,
        },
        dataType: 'json',
        success: function (result) {
            $.each(result, function (key, value) {
                $('#id_komoditas')
                    .append($("<option></option>")
                        .attr("value", value['id'])
                        .text(value['nama']));
            });
        },
        error: err => console.log(err),
    })
}

function getListAnggota(id) {
    $.ajax({
        url: window.location.origin + '/siktan-jabar/kecamatan/getListAnggota',
        type: 'POST',
        async: false,
        data: {
            id: id,
        },
        dataType: 'json',
        success: function (result) {
            $.each(result, function (key, value) {
                $('#id_anggota')
                    .append($("<option></option>")
                        .attr("value", value['id'])
                        .text(value['nama']));
            });
        },
        error: err => console.log(err),
    })
}

//aset

$('#addAset').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var title = button.data('title')
    var btn = button.data('button')

    var id = button.data('id')
    var kelompok = button.data('kelompok')
    var nama = button.data('nama')
    var sumber = button.data('sumber')
    var jumlah = button.data('jumlah')
    var tahun = button.data('tahun')

    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.action').text(btn);

    modal.find('#id').val(id);
    modal.find('#id_kelompok option[value="' + kelompok + '"]').prop('selected', true)
    modal.find('#nama').val(nama);
    modal.find('#id_sumber_perolehan option[value="' + sumber + '"]').prop('selected', true)
    modal.find('#jumlah').val(jumlah);
    modal.find('#tahun_perolehan').val(tahun);

    if (btn == 'Add') {
        $('.modal-content form').attr('action', "aset")
        modal.find('#id').val("");
        modal.find('#id_kelompok option:eq(0)').prop('selected', true)
        modal.find('#nama').val("");
        modal.find('#id_sumber_perolehan option:eq(0)').prop('selected', true)
        modal.find('#jumlah').val("");
        modal.find('#tahun_perolehan').val("");
    } else {
        $('.modal-content form').attr('action', "editAset")
    }
})


// Kelompok tani
$('#addKelompokPetani').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var title = button.data('title')
    var btn = button.data('button')

    var id = button.data('id');
    var kode_kelompok = button.data('kode_kelompok');
    var nama = button.data('nama')
    var penyuluh = button.data('penyuluh')
    var alamat = button.data('alamat')
    var desa = button.data('desa')
    var kecamatan = button.data('kecamatan')
    var bpp = button.data('bpp')
    var kota = button.data('kota')
    var tahun_pembentukan = button.data('tahun_pembentukan')
    var kelas = button.data('kelas')
    var skor = button.data('skor')
    var tahun_penerapan = button.data('tahun_penerapan')
    var teknologi = button.data('teknologi')

    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.action').text(btn);
    if (btn == 'Add') {
        $('.modal-content form').attr('action', "kelompokTani")
        modal.find('#kode_kelompok').removeAttr('hidden');
        modal.find('#id').val("");
        modal.find('#kode_kelompok').val("");
        modal.find('#nama').val("");
        modal.find('#penyuluh option:eq(0)').prop('selected', true)
        modal.find('#id_kota')
            .prepend('<option value="">Pilih Kota</option>')
            .val('whatever');
        modal.find('#id_kota option:eq(0)').prop('selected', true)
        modal.find('#id_kecamatan')
            .find('option:not(:first-child)')
            .remove()
            .end()
        modal.find('#id_kecamatan option:eq(0)').prop('selected', true)
        modal.find('#id_desa')
            .find('option:not(:first-child)')
            .remove()
            .end()
        modal.find('#id_desa option:eq(0)').prop('selected', true)
        modal.find('#bpp').val("");
        modal.find('#alamat').val("");
        modal.find('#tahun_pembentukan').val("");
        modal.find('#id_kelas option:eq(0)').prop('selected', true)
        modal.find('#skor').val(skor);
        modal.find('#tahun_penerapan').val("");
        modal.find('#teknologi').val("");
    } else {
        modal.find('#kode_kelompok').attr('hidden', 'true');
        modal.find('#id_kecamatan').removeAttr('disabled');
        modal.find('#id_desa').removeAttr('disabled');
        //Kota
        $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=32',
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $.each(result['kota_kabupaten'], function (key, value) {
                    $('#id_kota')
                        .append($("<option></option>")
                            .attr("value", value['id'])
                            .text(value['nama']));
                });
            },
            error: err => console.log(err),
        })
        // Kecamatan
        $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' + kota,
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                console.log(result['kecamatan'])
                $.each(result['kecamatan'], function (key, value) {
                    $('#id_kecamatan')
                        .append($("<option></option>")
                            .attr("value", value['id'])
                            .text(value['nama']));
                });
            },
            error: err => console.log(err),
        })
        // Desa
        $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' + kecamatan,
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $.each(result['kelurahan'], function (key, value) {
                    $('#id_desa')
                        .append($("<option></option>")
                            .attr("value", value['id'])
                            .text(value['nama']));
                });
            },
            error: err => console.log(err),
        })

        $('.modal-content form').attr('action', "editKelompokTani")

        setTimeout(() => {
            modal.find('#id').val(id);
            modal.find('#kode_kelompok').val(kode_kelompok);
            modal.find('#nama').val(nama);
            modal.find('#penyuluh option[value="' + penyuluh + '"]').prop('selected', true)
            modal.find('#id_kota option[value="' + kota + '"]').prop('selected', true)
            modal.find('#id_kecamatan option[value="' + kecamatan + '"]').prop('selected', true)
            modal.find('#id_desa option[value="' + desa + '"]').prop('selected', true)
            modal.find('#bpp').val(bpp);
            modal.find('#alamat').val(alamat);
            modal.find('#tahun_pembentukan').val(tahun_pembentukan);
            modal.find('#id_kelas option[value="' + kelas + '"]').prop('selected', true)
            modal.find('#skor').val(skor);
            modal.find('#tahun_penerapan').val(tahun_penerapan);
            modal.find('#teknologi').val(teknologi);
        }, 500);


    }


})

// Komoditi

$('#addKomoditi').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var title = button.data('title')
    var btn = button.data('button')

    var id = button.data('id')
    var nama = button.data('nama')
    var anggota = button.data('anggota')
    var subsektor = button.data('subsektor')
    var komoditas = button.data('komoditas')

    getListAnggota(nama)

    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.action').text(btn);
    modal.find('#id').val(id);
    modal.find('#id_kelompok option[value="' + nama + '"]').prop('selected', true)
    modal.find('#id_anggota option[value="' + anggota + '"]').prop('selected', true)
    modal.find('#id_subsektor option[value="' + subsektor + '"]').prop('selected', true)
    modal.find('#id_komoditas option[value="' + komoditas + '"]').prop('selected', true)

    if (btn == 'Add') {
        modal.find('#id_anggota').attr('disabled', 'true')
        modal.find('#id_komoditas').attr('disabled', 'true')
        $('.modal-content form').attr('action', "komoditi")
        modal.find('#id_kelompok option:eq(0)').prop('selected', true)
        modal.find('#id_anggota option:eq(0)').prop('selected', true)
        modal.find('#id_subsektor option:eq(0)').prop('selected', true)
        modal.find('#id_komoditas option:eq(0)').prop('selected', true)
    } else {
        modal.find('#id_anggota').removeAttr('disabled')
        modal.find('#id_komoditas').removeAttr('disabled')
        $('.modal-content form').attr('action', "editKomoditi")
    }
})



// Anggota

$('#addAnggota').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var title = button.data('title')
    var btn = button.data('button')

    var id = button.data('id')
    var nama_kelompok = button.data('namakelompok')
    var nik = button.data('nik')
    var nama = button.data('nama')
    var status = button.data('status')

    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.action').text(btn);

    modal.find('#id').val(id);
    modal.find('#id_kelompok option[value="' + nama_kelompok + '"]').prop('selected', true)
    modal.find('#nik').val(nik);
    modal.find('#nama').val(nama);
    modal.find('#id_status option[value="' + status + '"]').prop('selected', true)

    if (btn == 'Add') {
        $('.modal-content form').attr('action', "anggota")
        modal.find('#id_kelompok option:eq(0)').prop('selected', true)
        modal.find('#nik option:eq(0)').prop('selected', true)
        modal.find('#nama option:eq(0)').prop('selected', true)
        modal.find('#id_status option:eq(0)').prop('selected', true)
    } else {
        $('.modal-content form').attr('action', "editAnggota")
    }
})

// Modal Catatan Revisi

$('#catatanRevisi').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var title = button.data('title')
    var catatan = button.data('catatan')

    console.log(title)
    console.log(catatan)

    var modal = $(this)
    modal.find('.modal-title').text(title)
    modal.find('.catatan').text(catatan)
})

// Modal Verifikasi

$('#modalVerifikasi').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var title = button.data('title')
    var id = button.data('id')
    var baseurl = button.data('url')

    url = base_url + "/kota/" + baseurl

    var modal = $(this);
    modal.find('.modal-title').text(title);
    modal.find('#id').val(id)
    modal.find('#url').attr('action', url);
})