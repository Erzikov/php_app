function deleteUser(i){
    if (confirm('Вы уверены?')) {
        id = $(i).attr('data-id');
        $.post("admin/deleteUser/" + id, {}, function(data){
            $("#main").html(data);
        });
    }

    return false;
};
