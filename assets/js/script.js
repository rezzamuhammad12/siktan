$('#detailKelompokTani').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var nama = button.data('nama')
    var penyuluh = button.data('penyuluh')
    var alamat = button.data('alamat')
    var desa = button.data('desa')
    var kecamatan = button.data('kecamatan')
    var kota = button.data('kota')
    var tahun_pembentukan = button.data('tahun_pembentukan')
    var kelas = button.data('kelas')
    var skor = button.data('skor')
    var teknologi = button.data('teknologi')

    // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Data Kelompok ' + nama)
    modal.find('.penyuluh').text(penyuluh)
    modal.find('.alamat').text(alamat)
    modal.find('.desa').text(desa)
    modal.find('.kecamatan').text(kecamatan)
    modal.find('.kota').text(kota)
    modal.find('.tahun_pembentukan').text(tahun_pembentukan)
    modal.find('.kelas').text(kelas)
    modal.find('.skor').text(skor)
    modal.find('.teknologi').text(teknologi)
})

$(document).ready(function () {
    var idKota = $("#id_kota").prop("selectedIndex", 0).val();
    var idKecamatan = $("#id_kecamatan").prop("selectedIndex", 0).val();
    console.log(idKota)
    console.log(idKecamatan)
    if (idKota != 0) {
        $('#id_kota').attr('disabled', 1)

        $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kota/' + idKota,
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $("#id_kota").find('option').html(result['nama'])
            },
            error: err => console.log(err),
        })

        if (idKecamatan != 0) {
            $('#id_kecamatan').attr('disabled', 1)

            $.ajax({
                url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan/' + idKecamatan,
                type: 'GET',
                dataType: 'json',
                success: function (result) {
                    $("#id_kecamatan").find('option').html(result['nama'])
                },
                error: err => console.log(err),
            })
        } else {
            $.ajax({
                url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' + idKota,
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
        }


    } else {

    }

    if (idKota != 0 && idKecamatan != 0) {
        $('#id_desa').removeAttr('disabled');

        $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' + idKecamatan,
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
    }
})