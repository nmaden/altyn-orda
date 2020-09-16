<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CKEditor</title>
     {{-- Bootstrap --}}
	<link href="/admin-asset/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
		
	<link href="/ckeditor/contents.css" rel="stylesheet" type="text/css">

        {{-- jQuery --}}
       <script type="text/javascript" src="/admin-asset/assets/js/core/libraries/jquery.min.js"></script>
        {{-- JS Bootstrap --}}
       	<script type="text/javascript" src="/admin-asset/assets/js/core/libraries/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
            <h1>Добавляем поддержку CKEditor</h1>
            <div class="row">
			<form action="{{route('efinder2')}}" method='post' enctype="multipart/form-data"> 
                    <div class="col-md-12">
					  <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="file" name="upload"/>
                           <textarea name="editor1" id="editor1">
                           </textarea>
                   </div>
				   <input type='submit' value='отправить'/>
				   </form>
           </div>
    </div>
	
<script src="/ckeditor/ckeditor.js" 
type="text/javascript" charset="utf-8" ></script>
<script>
	
      CKEDITOR.replace('editor1', {
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


</body>
</html>