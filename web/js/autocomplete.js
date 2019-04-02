$("#adresse").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "https://api-adresse.data.gouv.fr/search/?label="+$("input[name='adresse']").val(),
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
        $('#cp').val(ui.item.postcode);
        $('#ville').val(ui.item.city);
    }
});

$("#cp").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "https://api-adresse.data.gouv.fr/search/?postcode="+$("input[name='cp']").val(),
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
        $('#ville').val(ui.item.city);
    }
});