$(document).ready(function(){
    $('[name=deleteingredient]').click(function(){
        if(confirm('Biztosan törlöd?')){
            $.ajax({
                url: 'ingredient/delete/' + $(this).val(),
                dataType: 'json',
                success: function(resp){
                    console.log(resp.test);
                },
                error: function(jqXHR){
                    console.log(jqXHR.status + ': ' + jqXHR.statusText);
                }
            })
        }
    });
});
