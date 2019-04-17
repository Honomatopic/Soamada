$(document).ready(function () {
    $('#enregistrer').click(function () {
        //Afficher Le titre de popup
        $('#modal-title').html('Veuillez vous enregistrer');
        // ATTENTION POUR LES apostrophes ET les guillemets
        $.ajax({
            type: 'post',
            url: 'register',
            success: function (data) {
                // résultat de action edit : formulaire inclure dans popup
                $('#membre').html(data);
                //Affichage de nouvelle popup
                $('#membre').modal('show');
            }
        });
    });
});
