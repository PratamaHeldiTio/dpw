$(document).ready(function () {

    $('.edit').on('click', function () {
        const isbn = $(this).data('id');

        $.get(`http://localhost/dpw/ubah.php?keyword=${isbn}`, function (data) {
            $('.modal-body').html(data);
        });

    });


    $('#keyword').on('keyup', function () {
        const keyword = $('#keyword').val()

        $.get(`http://localhost/dpw/search.php?keyword=${keyword}`, function (data) {
            $('.table').html(data);
        });
    });
});
