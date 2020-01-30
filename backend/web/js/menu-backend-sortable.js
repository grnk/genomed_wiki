$( document ).ready(function() {
    $( ".sortable-section" ).sortable({
        connectWith:".connectedSortable",
        handle:".item-header",
        cancel: ".item-toggle",
        placeholder: "item-placeholder ui-corner-all",
        cursor: "move"
    }).disableSelection();

    $( ".sortable-section" )
        .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
        .find( ".item-header" )
        .addClass( "ui-widget-header ui-corner-all" )
        .prepend( "<span class='glyphicon glyphicon-minus item-toggle'></span>");

    $( ".item-toggle" ).on( "click", function() {
        var icon = $( this );
        icon.toggleClass("glyphicon-minus glyphicon-plus");
        icon.closest( ".item" ).find( ".item-body" ).toggle();
    })

    // обработка события update
    $(".sortable-section").sortable({
        update: function(event, ui) {
            // console.log(this);
            console.log(ui);
        }
    });
});

