

<script type="text/javascript" src="/admin-asset/drobsone/js/main.js"></script>
		
<script src="/ckeditor/ckeditor.js" 
type="text/javascript" charset="utf-8" >
</script>

<script>
	
      CKEDITOR.replace('editor', {
  filebrowserUploadUrl: "{{route('uploads2')}}",
 
  //filebrowserUrl: "{{asset('/uploads')}}",
  //filebrowserUrl: "{{asset('uploads')}}",
  disallowedContent: 'a[href]',
            height: 300,
		  //filebrowserUploadMethod:'form'
        });
		CKEDITOR.on('instanceReady', function (ev) {
    var editor = ev.editor;
    editor.on('change', function(v) {
	console.log(v);
		
       
    });
});
</script>

	





	