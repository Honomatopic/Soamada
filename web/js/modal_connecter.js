$(document).ready(function () {
    $('#connecter').click(function () {
        $('#modal-title').html('Veuillez vous connecter');
        $.ajax({
            type: 'post',
            url: 'login',
            success: function (data) {
                $('#membre').html(data);
                $('#membre').modal('show');
            }
        });
    });
});
