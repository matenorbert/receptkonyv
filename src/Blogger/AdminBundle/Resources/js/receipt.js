$(document).ready(function(){
    $('body').on('click', '[name=addingredient]', function(){
        $('.ingredientrow:last').clone().insertAfter('.ingredientrow:last');
    });
});