/**
 * Save user comment 
 * @param : id (Selected Comment Id (Optional))
 * @return : Non
 */
function saveComment(parent_id, phone) {
    var description = $('textarea[name=description_sub]').val();
    var product_id = $('input[name=product_id]').val();
    var cmt_name = $('input[name=cmt_name]').val();
    var cmt_phone = $('input[name=cmt_phone]').val();
    
    $.ajax({
        context: this,
        type: "POST",
        url: '/home/addComment',
        data: {
            _token: $('input[name=_token]').val(),
            description:description,
            name: cmt_name,
            phone: cmt_phone,
            parent_id:parent_id,
            product_id:product_id,
            slug: 'iphone-12-mini-215gb-chinh-hang-vna',
        },  

        success:function(htmlPage)
        {
            location.reload();
        }
    });
}