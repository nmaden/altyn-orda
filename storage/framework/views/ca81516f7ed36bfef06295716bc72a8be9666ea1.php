

<script type="text/javascript" src="/admin-asset/drobsone/js/main.js"></script>
		
<script src="/ckeditor/ckeditor.js" 
type="text/javascript" charset="utf-8" >
</script>

<script>
	
      CKEDITOR.replace('editor', {
  filebrowserUploadUrl: "<?php echo e(route('uploads2')); ?>",
 
  //filebrowserUrl: "<?php echo e(asset('/uploads')); ?>",
  //filebrowserUrl: "<?php echo e(asset('uploads')); ?>",
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

	





	<?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/__block/footer.blade.php ENDPATH**/ ?>