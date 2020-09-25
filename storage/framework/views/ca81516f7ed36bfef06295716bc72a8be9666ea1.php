

<script type="text/javascript" src="/admin-asset/drobsone/js/main.js"></script>
		



	
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
	
</script>

	
	





	<?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/__block/footer.blade.php ENDPATH**/ ?>