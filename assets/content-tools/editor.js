window.addEventListener('load', function() {
    var editor;

    ContentTools.StylePalette.add([
      new ContentTools.Style('Author', 'author', ['p'])
    ]);

    editor = ContentTools.EditorApp.get();
    ContentTools.IMAGE_UPLOADER = imageUploader;

    xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://raw.githubusercontent.com/GetmeUK/ContentTools/master/translations/nl.json', true);

    function onStateChange (ev) {
        var translations;
        if (ev.target.readyState == 4) {
            // Convert the JSON data to a native Object
            translations = JSON.parse(ev.target.responseText);

            // Add the translations for the French language
            ContentEdit.addTranslations('nl', translations);

            // Set French as the editors current language
            ContentEdit.LANGUAGE = 'nl';
        }
    }

    xhr.addEventListener('readystatechange', onStateChange);

    // Load the language
    xhr.send(null);

    editor.init('*[data-editable]', 'data-name');

    //var imgControl = ContentTools
    // var tools = ContentTools.DEFAULT_TOOLS;
    //console.log(tools);
    // tools.splice(2,1);
    // editor.toolbox().tools(tools);

    editor.addEventListener('saved', function (ev) {
        var name, payload, regions, xhr;

        // Check that something changed
        regions = ev.detail().regions;

        if (Object.keys(regions).length == 0) {
            return;
        }

        // Set the editor as busy while we save our changes
        this.busy(true);

        // Collect the contents of each region into a FormData instance
        payload = new FormData();
        for (name in regions) {
            if (regions.hasOwnProperty(name)) {
                payload.append(name, regions[name]);
            }
        }

        // Send the update content to the server to be saved
        function onStateChange(ev) {
            // Check if the request is finished
            if (ev.target.readyState == 4) {
                editor.busy(false);
                if (ev.target.status == '200') {
                    // Save was successful, notify the user with a flash
                    //console.log(ev.target.response);
                    new ContentTools.FlashUI('ok');
                } else {
                    // Save failed, notify the user with a flash
                    new ContentTools.FlashUI('no');
                }
            }
        };

        xhr = new XMLHttpRequest();
        xhr.addEventListener('readystatechange', onStateChange);
        xhr.open('POST', 'model/ct-content.php');
        xhr.send(payload);
    });


    function imageUploader(dialog) {
     var image, xhr, xhrComplete, xhrProgress;


    // Set up the event handlers

    dialog.addEventListener('imageuploader.cancelupload', function () {
        // Cancel the current upload
        //console.log('Cancel de upload');
        // Stop the upload
        if (xhr) {
            xhr.upload.removeEventListener('progress', xhrProgress);
            xhr.removeEventListener('readystatechange', xhrComplete);
            xhr.abort();
        }

        // Set the dialog to empty
        dialog.state('empty');
    });
    dialog.addEventListener('imageuploader.save', function () {
      var clearBusy;
      dialog.busy(true);
      clearBusy = (function(_this) {
        return function() {
          dialog.busy(false);
          //console.log(image);
          return dialog.save(image.url, image.size, {
            alt: image.alt
          });
        };
      })(this);
      return setTimeout(clearBusy, 1500);
    });

    dialog.addEventListener('imageuploader.clear', function () {
        // Clear the current image
        //console.log('Clear de image');
        dialog.clear();
        image = null;
    });

    dialog.addEventListener('imageuploader.fileready', function (ev) {
         // Upload a file to the server
         var formData;
         var file = ev.detail().file;

         //console.log(ev);


         // Define functions to handle upload progress and completion
         xhrProgress = function (ev) {
             // Set the progress for the upload
             dialog.progress((ev.loaded / ev.total) * 100);
         }

         xhrComplete = function (ev) {
             var response;

             // Check the request is complete
             if (ev.target.readyState != 4) {
                 return;
             }

             // Clear the request
             xhr = null
             xhrProgress = null
             xhrComplete = null

             // Handle the result of the upload
             if (parseInt(ev.target.status) == 200) {
                 // Unpack the response (from JSON)
                 response = JSON.parse(ev.target.responseText);
                 // Store the image details
                 image = {
                     url: response.url,
                     size: response.size,
                     alt: response.alt
                   };
                 // Show the preview image in the dialog
                 dialog.populate(image.url, image.size);

             } else {
                 // The request failed, notify the user
                 new ContentTools.FlashUI('no');
             }
         }

         // Set the dialog state to uploading and reset the progress bar to 0
         dialog.state('uploading');
         dialog.progress(0);

         // Build the form data to post to the server
         formData = new FormData();
         formData.append('image', file);

         // Make the request
         xhr = new XMLHttpRequest();
         xhr.upload.addEventListener('progress', xhrProgress);
         xhr.addEventListener('readystatechange', xhrComplete);
         xhr.open('POST', 'model/ct-upload-image.php', true);
         xhr.send(formData);
     });

    }

});
