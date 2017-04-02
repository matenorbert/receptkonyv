$(document).ready(function(){
    $('body').on('click', '[name=receipt_addingredient]', function(){
        $('.ingredientrow:first').clone().insertAfter('.ingredientrow:last').append('<button type="button" name="receipt_deleteingredient">-</button>');
    });
    $('body').on('click', '[name=receipt_deleteingredient]', function(){
            $(this).parent().remove();
    });
});