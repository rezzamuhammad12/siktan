$('#addPenyuluh').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var title = button.data('title')
    var btn = button.data('button')

    var id = button.data('id')
    var nama = button.data('nama')
    var status = button.data('status')
    var nip = button.data('nip')
    var nik = button.data('nik')

    console.log(id)
    console.log(nama)
    console.log(status)
    console.log(nip)
    console.log(nik)

    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.action').text(btn);

    if (btn == 'Add') {
        $('.modal-content form').attr('action', "penyuluh")
    } else {
        $('.modal-content form').attr('action', "penyuluh/edit")
    }
})