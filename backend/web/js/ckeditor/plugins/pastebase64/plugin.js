(function () {
    'use strict';

    CKEDITOR.plugins.add('pastebase64', {
        init: init
    });

    function init(editor) {
        if (editor.addFeature) {
            editor.addFeature({
                allowedContent: 'img[alt,id,!src]{width,height};'
            });
        }

        editor.on("contentDom", function () {
            var editableElement = editor.editable ? editor.editable() : editor.document;
            editableElement.on("paste", onPaste, null, {editor: editor});
        });


    }

    function onPaste(event) {
        var editor = event.listenerData && event.listenerData.editor;
        var $event = event.data.$;
        var clipboardData = $event.clipboardData;
        var found = false;
        var imageType = /^image/;

        if (!clipboardData) {
            return;
        }

        return Array.prototype.forEach.call(clipboardData.types, function (type, i) {
            if (found) {
                return;
            }

            if (type.match(imageType) || clipboardData.items[i].type.match(imageType)) {
                readImageAsBase64(clipboardData.items[i], editor);
                return found = true;
            }
        });
    }

    function readImageAsBase64(item, editor) {
        if (!item || typeof item.getAsFile !== 'function') {
            return;
        }

        var file = item.getAsFile();
        var reader = new FileReader();

        reader.onload = function (evt) {
            var data_send = { };
            // data_send[param] = token;
            data_send['input'] = evt.target.result;
            $.ajax({
                url: this_host + "/task/save_screenshot",
                async: false,
                type: 'POST',
                dataType: 'JSON',
                data: data_send,
                cache: false,
                success: function (msg) {
                    var content = '<img src="'+msg.msg+'">';
                    var element = editor.document.createElement('img', {
                        attributes: {
                            src: msg.msg
                        }
                    });

                    setTimeout(function () {
                        editor.insertElement(element);
                    }, 10);

                }
            });
        };
        reader.readAsDataURL(file);
    }


})();
