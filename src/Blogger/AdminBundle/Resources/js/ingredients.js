$(document).ready(function(){
    $('body').on('click', '[name=deleteingredient]', function(){
        if(confirm('Biztosan törlöd?')){
            $.ajax({
                url: 'ingredient/delete/' + $(this).val(),
                dataType: 'json',
                success: function(resp){
                    $.get('ingredient/select', function(data){
                        $('#ingredientbox').html(data);
                    })
                },
                error: function(jqXHR){
                    console.log(jqXHR.status + ': ' + jqXHR.statusText);
                }
            })
        }
    });

    $('body').on('click', '[name=addingredient]', function(){
        $('#ingredient_table tr:last').after('<tr><td colspan="2"><input type="text" name="ingredientfield"></td></tr>');
    });

    $('body').on('click', '[name=saveingredient]', function(){
        var ingredients = new Array();
        $('[name=ingredientfield]').each(function(){
            $(this).css('background-color', 'white');

            if(!$(this).val()) {
                $(this).css('background-color', 'red');
                alert('Igredient name is mandatory!');
                return false;
            }
            ingredients.push({name: $(this).val(), id: $(this).attr('data-id')});
        });

        $.ajax({
            url: 'ingredient/editAll',
            method: 'POST',
            dataType: 'json',
            data: {'rows' : ingredients},
            success: function(resp){
                if(resp.ret !== true) {
                    alert(resp.error);
                    return false;
                }
                $.get('ingredient/select', function(data){
                    $('#ingredientbox').html(data);
                })
            },
            error: function(jqXHR){
                console.log(jqXHR.status + ': ' + jqXHR.statusText);
            }
        })
    })
});


