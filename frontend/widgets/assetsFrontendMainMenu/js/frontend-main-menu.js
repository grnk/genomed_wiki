$( document ).ready(function() {
    $('li.dropdown').hover(
        function() {
            $( this ).addClass( "open" );
        }, function() {
            $( this ).removeClass( "open" );
        }
    );
});