$(".create").click(function(){
    $('.createModal').modal('show');

})

$(".update").click(function(){
    var id = $(this).data('id');
    var name = $(this).data('name');
    var status = $(this).data('status');

    $('.updateModal').find('.TaskName').val(name);
    $('.updateModal').find('.form-select').val(status);
    
    $('.updateModal form').attr('action', '/update/' + id);

    $('.updateModal').modal('show');
});


$(".delete").click(function(){
    if (confirm("Do you want to delete ?")) {
        $(this).closest("form").submit(); 
    } else {
        return false
    }
});