function deleteUser(i){
    if (confirm('Вы уверены?')) {
        var id = i.getAttribute('data-id');
        var user = i.parentNode.parentNode;
        user.remove();
        $.post("/admin/users/delete/" + id, {}, function(data){});
    }
};

function deleteProduct(i){
    if (confirm('Вы уверены?')) {
        var id = i.getAttribute('data-id');
        product = i.parentNode.parentNode;
        product.remove();

        $.post("/admin/products/delete/" + id, {}, function(data){});
    }
};

function deleteCategory(i){
    if (confirm('Вы уверены?')) {
        var id = i.getAttribute('data-id');
        var category = i.parentNode.parentNode;
        category.remove();

        $.post("/admin/categories/delete/" + id, {}, function(data){});
    }
};

function deleteOrder(i){
    if (confirm('Вы уверены?')) {
        var id = i.getAttribute('data-id');
        var order = i.parentNode.parentNode
        order.remove();

        $.post("/admin/orders/delete/" + id, {}, function(data){});
    }
};

$( "#status" ).change(function() {
    status = $(this).val();
    id = $(this).attr('data-id');
    $.post('/admin/orders/edit/'+id, {status}, function(data){});
});

