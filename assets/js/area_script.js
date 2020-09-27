function idDesaToVal(tag) {
    $.each(tag.find(".desa"), function (key, value) {
        $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan/' + $(value).text(),
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $(value).text(result['nama']);
            },
            error: err => console.log(err),
        })
    })
}

function idKecToVal(tag) {
    $.each(tag.find(".kecamatan"), function (key, value) {
        $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan/' + $(value).text(),
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $(value).text(result['nama']);
            },
            error: err => console.log(err),
        })
    })
}

function idKotaToVal(tag) {
    $.each(tag.find(".kota"), function (key, value) {
        $.ajax({
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kota/' + $(value).text(),
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $(value).text(result['nama']);
            },
            error: err => console.log(err),
        })
    })
}

$(document).ajaxStop(function () {
    idDesaToVal($(".tabel-kelompok-tani"))
    idKotaToVal($(".tabel-kelompok-tani"))
    idKecToVal($(".tabel-kelompok-tani"))
})