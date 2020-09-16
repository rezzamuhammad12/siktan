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

    modal.find('#id').text(id);
    modal.find('#nama').val(nama);
    modal.find('#status option[value="' + status + '"]').prop('selected', true)
    modal.find('#nip').val(nip);
    modal.find('#nik').val(nik);

    if (btn == 'Add') {
        $('.modal-content form').attr('action', "penyuluh")
    } else {
        $('.modal-content form').attr('action', "editPenyuluh")
    }
})