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
                 <div class="alert alert-danger" style='text-align:center'>
                    <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                     </ul>
                 </div>
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
