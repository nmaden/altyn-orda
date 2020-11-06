$(function(){
var page = $('#file').attr('data-path');

$('body').on('click','.slider_remove',function(e){
	var path = $(this).attr('href');
	var id = $(this).attr('id');
	
	e.preventDefault();
	 var ctx = $(this);
		$.ajax({
		  url:'/slider-remove'+'-'+page,
		  data:{path:path,id:id },
		  type:'POST',
		  datatype:'JSON',
		    beforeSend: function() {
			ctx.replaceWith('<span  class="replace" style="color:"#000">выполняется..</span>');
           
          },
		  success: function(html) {
			  $(this).remove();
			  var r = $('.replace');
	r.replaceWith('<span style="color:red">удалено</span>');

			  console.log(html);
		  },
		});
})


    var myDropzone = new Dropzone("div#file", {
		
        url: "/drobsone-send"+"-"+page,
        maxFiles: 20,
        //maxFilesize: 2,
	
        dictFileTooBig: "Максимальный размер файла - 1 Мб",
        dictMaxFilesExceeded: "Достигнут лимит загрузки файлов, разрешено {{maxFiles}}",
        init: function(){
            $(this.element).html(this.options.dictDefaultMessage);
        },
        dictDefaultMessage: '<div class="dz-message">Нажмите здесь или перетащите сюда файлы для загрузки (Слайдер в карточке)</div>',
        acceptedFiles: '.jpg, .jpeg, .png, .gif',
        dictInvalidFileType: 'Разрешены к загрузке файлы: .jpg, .jpeg, .png, .gif',
        success: function(file, responce){
		
	    $('#drobzone-photo').html(responce); 
        //this.removeFile(file);		
        //console.log(responce);
        }
    });

});