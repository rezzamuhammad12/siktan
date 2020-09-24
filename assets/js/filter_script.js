// Kota
$.ajax({
    url: 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=32',
    type: 'GET',
    dataType: 'json',
    success: function (result) {
        $.each(result['kota_kabupaten'], function (key, value) {
            $('#kota_filter')
                .append($("<option></option>")
                    .attr("value", value['id'])
                    .text(value['nama']));
        });
    },
    error: err => console.log(err),
})

$('#kota_filter').on('change', function () {
    var idKota = $(this).val();
    $('#kecamatan_filter')
        .find('option:not(:first-child)')
        .remove()
        .end()
    if (idKota) {
        $('#kecamatan_filter').removeAttr('disabled')
        $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' + idKota,
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $.each(result['kecamatan'], function (key, value) {
                    $('#kecamatan_filter')
                        .append($("<option></option>")
                            .attr("value", value['id'])
                            .text(value['nama']));
                });
            },
            error: err => console.log(err),
        })
    } else {
        $('#kecamatan_filter').attr('disabled', 'true')
        $('#desa_filter').attr('disabled', 'true')
    }
})

$('#kecamatan_filter').on('change', function () {
    var idKec = $(this).val();
    $('#desa_filter')
        .find('option:not(:first-child)')
        .remove()
        .end()
    if (idKec) {
        $('#desa_filter').removeAttr('disabled')
        $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' + idKec,
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $.each(result['kelurahan'], function (key, value) {
                    $('#desa_filter')
                        .append($("<option></option>")
                            .attr("value", value['id'])
                            .text(value['nama']));
                });
            },
            error: err => console.log(err),
        })
    } else {
        $('#desa_filter').attr('disabled', 'true')
    }
})

$('.filter_form').on('change', function () {
    var value = $(this).val();
})

$('#gofilter').on('click', function () {
    var kota = $('#kota_filter').find(':selected').val();
    var kecamatan = $('#kecamatan_filter').find(':selected').val();
    var desa = $('#desa_filter').find(':selected').val();
    var from = $(this).data('from');

    $.ajax({
        url: 'http://localhost/siktan-jabar/kecamatan/filterKelompok',
        type: 'POST',
        dataType: 'json',
        data: {
            kota: kota,
            kecamatan: kecamatan,
            desa: desa,
            from: from
        },
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) {
            $('#tbody-kelompok').find('tr').remove().end()
            $('#tbody-kelompok').append(response['hasil']);
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            console.log(status)
            console.log(error)
        },
    })
})

// Filter Lahan

$('#filter_lahan').on('change', function () {
    id = $(this).val();

    if (id) {
        $.ajax({
            url: 'http://localhost/siktan-jabar/kecamatan/filterLahan',
            type: 'POST',
            async: false,
            data: {
                id: id,
            },
            dataType: 'json',
            success: function (result) {

                $('#tbody-lahan').find('tr').remove().end()
                $('#tbody-lahan').append(result['hasil']);

            },
            error: err => console.log(err),
        })
    } else {

    }
})


// Filter Aset

$('#filter_aset').on('change', function () {
    id = $(this).val();

    if (id) {
        $.ajax({
            url: 'http://localhost/siktan-jabar/kecamatan/filterAset',
            type: 'POST',
            async: false,
            data: {
                id: id,
            },
            dataType: 'json',
            success: function (result) {

                $('#tbody-aset').find('tr').remove().end()
                $('#tbody-aset').append(result['hasil']);

            },
            error: err => console.log(err),
        })
    } else {

    }
})

// Filter Komoditi

$('#filter_komoditi').on('change', function () {
    id = $(this).val();

    if (id) {
        $.ajax({
            url: 'http://localhost/siktan-jabar/kecamatan/filterKomoditi',
            type: 'POST',
            async: false,
            data: {
                id: id,
            },
            dataType: 'json',
            success: function (result) {

                $('#tbody-komoditi').find('tr').remove().end()
                $('#tbody-komoditi').append(result['hasil']);

            },
            error: err => console.log(err),
        })
    } else {

    }
})


// Filter Anggota

$('#filter_anggota').on('change', function () {
    id = $(this).val();

    if (id) {
        $.ajax({
            url: 'http://localhost/siktan-jabar/kecamatan/filterAnggota',
            type: 'POST',
            async: false,
            data: {
                id: id,
            },
            dataType: 'json',
            success: function (result) {

                $('#tbody-anggota').find('tr').remove().end()
                $('#tbody-anggota').append(result['hasil']);

            },
            error: err => console.log(err),
        })
    } else {

    }
})