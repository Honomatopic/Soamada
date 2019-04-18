$(document).ready(function () {
    $('#enregistrer').click(function () {
        $('#modal-title').html('Veuillez vous enregistrer');
        $.ajax({
            type: 'post',
            url: 'register',
            success: function (data) {
                $('#membre').html(data);
                $('#membre').modal('show');
            }
        });
    });
});
