CKEDITOR.plugins.addExternal('pastebase64', '/js/ckeditor/plugins/pastebase64/');

CKEDITOR.editorConfig = function( config ) {
    config.language = 'ru';
    config.extraPlugins = 'pastebase64';
    config.allowedContent = true;
};