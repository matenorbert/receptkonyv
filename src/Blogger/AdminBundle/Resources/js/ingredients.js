$(document).ready(function(){
    $('[name=deleteingredient]').click(function(){
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

    $('[name=addingredient]').click(function(){
        $('#ingredient_table tr:last').after('<tr><td colspan="2"><input type="text" name="ingredientfield"></td></tr>');
    });

    $('[name=saveingredient]').click(function(){
        var ingredients = new Array();
        $('[name=ingredientfield]').each(function(){
            ingredients.push($(this).val());
        });
        console.log(ingredients);
    })
});


