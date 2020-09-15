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


$(document).ready(function () {
    $('#id_kota').attr("disabled", 1);
    $('#id_kecamatan').attr("disabled", 1);
    $('.kecamatan-wrapper').hide();


    $('#role_id').on('change', function () {
        var role_id = $(this).val();

        if (role_id != 0) {
            $('#id_kota').removeAttr('disabled');
            if (role_id == 2) {
                $('.kecamatan-wrapper').hide();
            } else {
                $('.kecamatan-wrapper').show();
            }
        } else {
            $('#id_kota').attr("disabled", 1);
            $('.kecamatan-wrapper').hide();
        }
    })

    $('#id_kota').on('change', function () {
        var id_kota = $(this).val();
        if (id_kota != 0) {
            $('#id_kecamatan')
                .find('option')
                .remove()
                .end()
                .append('<option value="0">Pilih Kecamatan</option>')
                .val('whatever');
            $('#id_kecamatan').removeAttr('disabled');

            $.ajax({
                url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' + id_kota,
                type: 'GET',
                dataType: 'json',
                success: function (result) {
                    $.each(result['kecamatan'], function (key, value) {
                        $('#id_kecamatan')
                            .append($("<option></option>")
                                .attr("value", value['id'])
                                .text(value['nama']));
                    });
                },
                error: err => console.log(err),
            })
        } else {
            $('#id_kecamatan').attr("disabled", 1);
        }
    })
})