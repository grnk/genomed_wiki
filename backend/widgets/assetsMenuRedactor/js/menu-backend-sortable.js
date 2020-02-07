$( document ).ready(function() {
    $( ".sortable-section" ).sortable({
        connectWith:".connectedSortable",
        handle:".item-header",
        cancel: ".action-buttons",
        placeholder: "item-placeholder ui-corner-all",
        cursor: "move"
    }).disableSelection();

    $( ".sortable-section" )
        .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
        .find( ".item-header" )
        .addClass( "ui-widget-header ui-corner-all" );
        // .prepend( "<span class='action-buttons'><span class='glyphicon glyphicon-minus item-toggle '></span></span>");

    $( ".item-toggle" ).on( "click", function() {
        var icon = $( this );
        icon.toggleClass("glyphicon-resize-small glyphicon-resize-full");
        icon.closest( ".item" ).find( ".item-body" ).toggle();
    });

    // обработка события update
    $(".sortable-section").sortable({
        update: function(event, ui) {
            var section = $(this);
            var children = section.children();

            var childrenIds = [];
            children.each(function () {
                childrenIds[childrenIds.length] = $(this).attr("data-id");
            });

            var data_send = {"section-id" : section.attr("data-item-id"), 'item-ids' : childrenIds};
            $.ajax({
                url: "/menu/update",
                type: 'POST',
                dataType: 'JSON',
                data: data_send,
                cache: false,
            });
        }
    });

    $('#button-close-all').on("click", function () {
        $('.item-header .action-buttons .glyphicon.item-toggle').each(function(i, elem) {
            if($(this).hasClass("glyphicon-resize-small")) {
                $(this).click();
            }
        });
    });

    $('#button-open-all').on("click", function () {
        $('.item-header .action-buttons .glyphicon.item-toggle').each(function(i, elem) {
            if($(this).hasClass("glyphicon-resize-full")) {
                $(this).click();
            }
        });
    });
});

