

		



	<script type="text/javascript" src="/admin-asset/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="/admin-asset/jquery-3.5.1.min.js"></script>
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

<script type="text/javascript" src="/admin-asset/drobsone/js/main.js"></script>

		<script type="text/javascript" src="/admin-asset/drobsone/js/dropzone.js"></script>
		
		
<script>

   $('#autosearch').on('keyup',function(){
	 
	   var query = $(this).val();
	   if(query != ''){
	     var path = $(this).attr('data-path');
		 var model = $(this).attr('data-model');
		 
		  $.ajax({
	      url:'/admin/admin_filter',
		  data:{'q':query,'path':path,'model':model},
		  headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		  type:'POST',
		  datatype:'JSON',
		  success: function(html) {
			  console.log(html);
			  if(html =='ok'){
				  
			  }else{
			  $('.wrapper-ajax').html(html);
			  }
					
		},

		});
		   
	   }
   })
/*
   $.ajax({
	 url:$('#commentform').attr('action'),
		data:data,
		headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type:'POST',
		datatype:'JSON',
		success: function(html) {
								
		},

		});
	*/					
</script>

	





	