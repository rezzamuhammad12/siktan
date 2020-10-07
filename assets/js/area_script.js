function idDesaToVal(tag) {
    $.each(tag.find(".desa"), function (key, value) {
        $.ajax({
            url: base_url + '/api/kelurahan/' + $(value).text(),
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
            url: base_url + '/api/kecamatan/' + $(value).text(),
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
            url: base_url + '/api/kota/' + $(value).text(),
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                $(value).text(result['nama']);
            },
            error: err => console.log(err),
        })
    })
}

$(document).ready(function () {
    idDesaToVal($(".tabel-kelompok-tani"))
    idKotaToVal($(".tabel-kelompok-tani"))
    idKecToVal($(".tabel-kelompok-tani"))
})