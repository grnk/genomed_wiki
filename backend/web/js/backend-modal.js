$( document ).ready(function() {
    $(document).on('click', '.showModalButton', function(){
        var button = $(this);
        var modal = $('#modal').modal('show');
        var find = modal.find('#backendModalContent');
        $.ajax({
            url: button.attr('value'),
        }).done(function(data) {
            if(data === 'close') {
                console.log('close');
            } else {
                find.html(data);
            }
        });
        // document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
        // $('#modalHeader').prepend('<span>' + $(this).attr('title') + '</span>');
    });

    $(document).on('submit', '#create-ajax-form', function(e){
        e.preventDefault();
        var form = $(this);
        var find = $('#backendModalContent');
        console.log(form);
        $.ajax({
            url: form.data('url'),
            type: 'POST',
            // data: JSON.stringify($('#update-ajax-form input'))
            data: form.serialize(),
        }).done(function(data) {
            if(data.substr(0, 5) === 'close') {
                // find.html(data);
                // find.html('Раздел создан');
                console.log('Раздел создан');
                location.reload();
            } else {
                find.html(data);
            }
        });
    });

});