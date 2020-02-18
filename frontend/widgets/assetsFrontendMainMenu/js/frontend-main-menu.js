$( document ).ready(function() {
    console.log( "ready!" );

    $('li.dropdown').hover(
        function() {
            $( this ).addClass( "open" );
        }, function() {
            $( this ).removeClass( "open" );
        }
    );
});