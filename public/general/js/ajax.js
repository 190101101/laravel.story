function ajaxGet(url, arg, method = 'Get')
{
    return $.ajax({
        beforeSend: function(){
            $('.data-get').prop('disabled', true);
        },
        type: method,
        url: url,
        complete: function(){
            $('.data-get').prop('disabled', false);
        }
    });
}

/*------------------------------------------------*/
$('body').on('click', '.data-delete', function(e) {
    arg = this;
    
    get = $(arg).attr("data-get");

    alertify.confirm('Are you sure you want to delete???', function(){ 
        ajaxGet(get, arg, 'delete').done(function(data){

            if(data == true){
                $(arg).parents('.table tr').hide();
                alertify.success('deleted successfully', 1);   
            }else{
                alertify.error('Is there something wrong', 1);
            }
        });
    });
});

/*------------------------------------------------*/
$('body').on('click', '.data-get', function(e) {
    arg = this;
    
    get = $(arg).attr("data-get");

    ajaxGet(get, arg).done(function(data){

        data == true 
            ? alertify.success('operation success', 1)
            : alertify.error('Is there something wrong', 1);
    });
});
