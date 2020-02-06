$( document ).ready(function() {
    $(document).on('click', '.showModalButton', function(){
        var button = $(this);
        var modal = $('#modal').modal('show');
        var find = modal.find('#backendModalContent');
        $.ajax({
            url: button.attr('value'),
        }).done(function(data) {
            find.html(data);
        });
        // document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
        // $('#modalHeader').prepend('<span>' + $(this).attr('title') + '</span>');
    });
});