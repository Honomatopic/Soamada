$("#fos_user_registration_form_Adresse").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "https://api-adresse.data.gouv.fr/search/?label=" + $("input[name='fos_user_registration_form[Adresse]']").val(),
            data: { q: request.term },
            dataType: "json",
            success: function (data) {
                var label = [];
                response($.map(data.features, function (item) {
                    // Ici on est obligé d'ajouter les adresses complètes dans un array pour ne pas avoir plusieurs fois le même
                    if ($.inArray(item.properties.label, label) == -1) {
                        label.push(item.properties.label);
                        return { label: item.properties.label, 
                                 city: item.properties.city,
                                 postcode: item.properties.postcode,
                                 value: item.properties.name
                        };
                    }
                }));
            }
        });
    },
    
    // On remplit aussi le cp et la ville
    select: function(event, ui) {
        $('#fos_user_registration_form_Cp').val(ui.item.postcode);
        $('#fos_user_registration_form_Ville').val(ui.item.city);
    }
});

$("#fos_user_registration_form_Cp").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "https://api-adresse.data.gouv.fr/search/?postcode=" + $("input[name='fos_user_registration_form_Cp']").val(),
            data: { q: request.term },
            dataType: "json",
            success: function (data) {
                var postcodes = [];
                response($.map(data.features, function (item) {
                    // Ici on est obligé d'ajouter les CP dans un array pour ne pas avoir plusieurs fois le même
                    if ($.inArray(item.properties.postcode, postcodes) == -1) {
                        postcodes.push(item.properties.postcode);
                        return { label: item.properties.postcode + " - " + item.properties.city, 
                                 city: item.properties.city,
                                 value: item.properties.postcode
                        };
                    }
                }));
            }
        });
    },
    // On remplit aussi la ville
    select: function(event, ui) {
        $('#fos_user_registration_form_Ville').val(ui.item.city);
    }
});