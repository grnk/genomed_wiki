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
            //console.log(this);
            //console.log(event);
            var section = $(this);
            var children = section.children();
            console.log("data-item-id = " + section.attr("data-item-id"));
            // console.log(section.children());

            var childrenIds = [];
            children.each(function () {
                childrenIds[childrenIds.length] = $(this).attr("data-id");
            });
            console.log("children array = " + childrenIds);

            var data_send = {"section-id" : section.attr("data-item-id"), 'item-ids' : childrenIds};
            $.ajax({
                url: "menu/update",
                type: 'POST',
                dataType: 'JSON',
                data: data_send,
                cache: false,
            });
        }
    });
});

