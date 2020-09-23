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
        .find('option')
        .remove()
        .end()
        .append('<option value="">Pilih Kecamatan</option>')
        .val('whatever');
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
        .find('option')
        .remove()
        .end()
        .append('<option value="">Pilih Desa</option>')
        .val('whatever');
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

    $.ajax({
        url: 'http://localhost/siktan-jabar/kecamatan/filterKelompok',
        type: 'POST',
        dataType: 'json',
        data: {
            kota: kota,
            kecamatan: kecamatan,
            desa: desa
        },
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) {
            // console.log($('#tabel-kelompok-tani tbody').find('tr').remove().end());
            $('#dicobain').find('tr').remove().end()
            $('#dicobain').append(response['hasil']);
            console.log(response['hasil']);
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            console.log(status)
            console.log(error)
        },
    })
})