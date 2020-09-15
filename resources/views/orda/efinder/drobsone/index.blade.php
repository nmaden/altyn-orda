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
         <!DOCTYPE html>

<meta charset="utf-8">

<title>Dropzone simple example</title>


<!--
  DO NOT SIMPLY COPY THOSE LINES. Download the JS and CSS files from the
  latest release (https://github.com/enyo/dropzone/releases/latest), and
  host them yourself!
-->
<script type="text/javascript" src="/admin-asset/drobsone/js/dropzone.js"></script>
	
<link rel="stylesheet" href="/admin-asset/drobsone/css/style.css">

<link rel="stylesheet" href="/admin-asset/drobsone/css/dropzone.css">


<p>
  This is the most minimal example of Dropzone. The upload in this example
  doesn't work, because there is no actual server to handle the file upload.
</p>

<!-- Change /upload-target to your upload address 
<form action="/file-upload" class="dropzone" id="my-amesome-dropzone"></form>
    </div>

-->
	<form action="{{route('drobsone-send')}}" method='post' enctype="multipart/form-data"> 
                    <div class="col-md-12">
					  <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="file" name="upload"/>
                           <textarea name="editor1" id="editor1">
                           </textarea>
						   <div id="file" name='file' class="upload"></div>
                   </div>
				   
				   <input type='submit' value='отправить'/>
				   </form>
<!---<form action="/upload-target" class="dropzone"></form>--->
    </div>
	



</body>
	<script type="text/javascript" src="/admin-asset/drobsone/js/main.js"></script>

</html>