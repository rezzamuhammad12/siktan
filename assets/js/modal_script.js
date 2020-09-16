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
    var luas = button.data('luas')
    var status = button.data('status')

    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.action').text(btn);

    modal.find('#id').val(id);
    modal.find('#id_kelompok option[value="' + nama + '"]').prop('selected', true)
    modal.find('#luas').val(luas);
    modal.find('#id_status_kepemilikan option[value="' + status + '"]').prop('selected', true)

    if (btn == 'Add') {
        $('.modal-content form').attr('action', "lahan")
        modal.find('#id').val("");
        modal.find('#id_kelompok option:eq(0)').prop('selected', true)
        modal.find('#luas').val(luas);
        modal.find('#id_status_kepemilikan option:eq(0)').prop('selected', true)
    } else {
        $('.modal-content form').attr('action', "editLahan")
    }
})

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
        modal.find('#id').val(id);
        modal.find('#id_kelompok option:eq(0)').prop('selected', true)
        modal.find('#nama').val(nama);
        modal.find('#id_sumber_perolehan option:eq(0)').prop('selected', true)
        modal.find('#jumlah').val(jumlah);
        modal.find('#tahun_perolehan').val(tahun);
    } else {
        $('.modal-content form').attr('action', "editAset")
    }
})