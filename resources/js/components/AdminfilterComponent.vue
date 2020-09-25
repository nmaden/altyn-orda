<template>
<div>
	
 </div>				

   
</template>

<script>
  export default {
	 
     data(){
	  return {inputValue:'',datacity:[],country:[]}
	  },
	
	props: [
     //'city','ids'
	],
	mounted() {
		/*
	this.datacity = this.city;
	this.changeName();
   $('body').on('click','.select2-selection',function(e){
  $('.select2-search__field').replaceWith('<input id="dunam" type"text" style="display:block;margin:0 auto;margin-bottom:5px;border:1px solid #ccc;border-radius:20px;height:35px;padding:0 5px;">');
  $("body").on('keyup','#dunam',function(event){
	 this.inputValue= event.target.value;
	   const filter = this.datacity.filter((v)=>{
		      return v.name.toLowerCase().indexOf( this.inputValue.toLowerCase()) >= 0;
			  })
			 this.city = filter;
   })})
		*/
		
     },
	watch: {
      
    },
	computed: {
		changeName(){
			  //return this.city;
			}
		
	},

    methods: {}

    }
</script>
