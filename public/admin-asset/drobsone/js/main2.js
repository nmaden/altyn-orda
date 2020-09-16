$(function(){
    var myDropzone = new Dropzone("div#file", {
        url: "drobsone-send",
        maxFiles: 2,
        dictMaxFilesExceeded: "Достигнут лимит загрузки файлов, разрешено {{maxFiles}}",
        init: function(){
            $(this.element).html(this.options.dictDefaultMessage);
        },
        dictDefaultMessage: '<div class="dz-message">Нажмите здесь или перетащите сюда файлы для загрузки</div>',
        acceptedFiles: '.jpg, .jpeg, .png, .gif',
        success: function(file, responce){
            //console.log(file);
            console.log(responce);
            var url = file.dataURL,
                res = JSON.parse(responce);
            //console.log(res.answer);
            //$('.preview').html('<img src="' + url + '">')
        }
    });

});