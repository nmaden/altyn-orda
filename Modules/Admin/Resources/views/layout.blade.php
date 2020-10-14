<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="/admin-asset/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="/admin-asset/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="/admin-asset/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="/admin-asset/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="/admin-asset/assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="/vendor/footable.bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/admin-asset/assets/custom.css" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="/admin-asset/drobsone/css/style.css">
    <link rel="stylesheet" href="/admin-asset/drobsone/css/dropzone.css">

    @section('css_block')
    @show
    
	<script type="text/javascript" src="/admin-asset/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="/admin-asset/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="/admin-asset/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="/admin-asset/assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="/admin-asset/assets/js/plugins/forms/selects/select2.min.js"></script>
	

	<script type="text/javascript" src="/admin-asset/assets/js/plugins/editors/wysihtml5/wysihtml5.min.js"></script>
	<script type="text/javascript" src="/admin-asset/assets/js/plugins/editors/wysihtml5/toolbar.js"></script>
	<script type="text/javascript" src="/admin-asset/assets/js/plugins/editors/wysihtml5/parsers.js"></script>
	<script type="text/javascript" src="/admin-asset/assets/js/plugins/editors/wysihtml5/locales/bootstrap-wysihtml5.ua-UA.js"></script>
	<script type="text/javascript" src="/admin-asset/assets/js/pages/editor_wysihtml5.js"></script>
	
	<script type="text/javascript" src="/admin-asset/assets/js/plugins/forms/styling/uniform.min.js"></script>
	
	<script type="text/javascript" src="/admin-asset/assets/js/plugins/uploaders/fileinput/plugins/purify.min.js"></script>
	<script type="text/javascript" src="/admin-asset/assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
	<script type="text/javascript" src="/admin-asset/assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>
	<script type="text/javascript" src="/admin-asset/assets/js/plugins/notifications/pnotify.min.js"></script>
    
	<script type="text/javascript" src="/admin-asset/assets/js/core/app.js"></script>
	<script type="text/javascript" src="/admin-asset/assets/js/plugins/ui/ripple.min.js"></script>
	<script type="text/javascript" src="/vendor/sweetalert.min.js"></script>
	<script type="text/javascript" src="/vendor/footable.min.js"></script>
	
	<!------
	<script type="text/javascript" src="/admin-asset/custom/js/main.js"></script>
	------->

<script src="/ckeditor/ckeditor.js" 
type="text/javascript" charset="utf-8" >
</script>

    @section('js_block')
    @show
		<script type="text/javascript" src="/admin-asset/drobsone/js/dropzone.js"></script>
		
		
</head>
<body>

    @include('admin::__block.main_navbar')
	<div class="page-container">
	
		<div class="page-content">
            @include('admin::__block.sidebar')
            
			<div class="content-wrapper">
                @include('admin::__block.page_header')
                
				<div class="content">
               @if (count($errors) > 0)
				   <!------
                 <div class="alert alert-danger" style='text-align:center'>
                    <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                     </ul>
                 </div>
				 ------------->
               @endif

                    @yield('content')
					@yield('left_lang')
                    
                    @include('admin::__block.footer')
				
				</div>
			</div>
		</div>
	</div> 
	
    @include('vendor.sweet.alert')
	
</body>
</html>
