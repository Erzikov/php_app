function deleteUser(i){
    if (confirm('Вы уверены?')) {
        id = $(i).attr('data-id');
        $.post("/admin/users/delete/" + id, {}, function(data){
            $("#main").html(data);
        });   
    }
};

function deleteProduct(i){
    if (confirm('Вы уверены?')) {
        id = $(i).attr('data-id');
        $.post("/admin/products/delete/" + id, {}, function(data){
            $("#main").html(data);
        });
    }
};

function deleteCategory(i){
    if (confirm('Вы уверены?')) {
        id = $(i).attr('data-id');
        $.post("/admin/categories/delete/" + id, {}, function(data){
            $("#main").html(data);
        });
    }
}

$( "#status" ).change(function() {
    status = $(this).val();
    id = $(this).attr('data-id');
    $.post('/admin/orders/edit/'+id, {status}, function(data){});
});

