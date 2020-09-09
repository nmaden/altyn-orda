<template>
    <div>
	  <div class="filter" id="filter">
			  <h5 class="filter-title">
			  <span v-if="lang ==2">Сүзгі</span>
			  <span v-if="lang ==1">ФИЛЬТР</span>
			   <span v-if="lang ==3">ФИЛЬТР</span>
             
             </h5>

			 
			 <div class="filter-type">
			 
            <select @change="kurs" id='razdel'>
          <option some-data="key" v-for="(item, key) in filters" :value="key">
			    {{item}}
				</option>
              </select>
            <div class="select-icon">
              <img src="/images/more.png">
            </div>
          </div>
		  
		  <div class="filter-type">
            <select @change="filters_smena" id='filers_smena'>
              <option some-data="key" v-for="(item, key) in filter_smena" :value="key">
			    {{item}}
			  </option>
             </select>
            <div class="select-icon">
              <img src="/images/more.png">
            </div>
          </div>
		  
		  
		  
		  
		  	 <div class="filter-type">
			 
            <select @change="filters_class" id='filers_class'>
          <option some-data="key" v-for="(item, key) in filter_class2" :value="key">
			    {{item}}
				</option>
              </select>
            <div class="select-icon">
              <img src="/images/more.png">
            </div>
          </div>
	
		  
		  			
		  <div class="filter-type">
              <select @change="languages" id="languages">
			  
			      <option v-if="lang ==1" value="0" >Все языки</option>
			      <option v-if="lang ==2" value="0" >Барлық тілдер</option>
                  <option v-if="lang ==3" value="0" >все языки</option>
				  
				  <option v-if="lang ==1" selected value="1" >Русский</option>
				  <option v-if="lang ==2" value="1" >Орысша</option>
				  <option v-if="lang ==3" value="1" >Русский</option>

                  <option v-if="lang ==2" selected value="2" >Қазақша</option>
				  <option v-if="lang ==1" value="2" >Казахский</option>
				  <option v-if="lang ==3" value="2" >Казахский</option>

				  

                 
                 
                  
                </select>
                <div class="select-icon">
                  <img src="/images/more.png">
                </div>
              </div>
		  
		  
		  
		  
		  
		  </div>
		  <div class='ppp'></div>
				<pagination :data="kurses" @pagination-change-page="getResults"></pagination>

<div v-if="loader">
{{ load(true) }}
</div>
<div v-else="loader">
{{ load(false) }}
</div>

</div>
</template>

<script>
  export default {
	 
     data(){
	  return {kurses:{},loader:true,filters:{},filter:'',razdel:0,page:10,lang:1,filter_class2:0,filter_class_flag:0,filter_smena_flag:0,filter_smena:{}
	  }
	},
	
	props: [
'id_razdel'
	],
	mounted() {
		this.razdel= this.id_razdel;
		this.getkurses();
		this.filterrazdel();
     },
	watch: {
      lang: function(val) {
	      if(val == 1){ var lang_filter = 'Выбрать класс';var smena = 'Выбрать смену';var razdel = 'Выбрать раздел';}
		  if(val == 3){var lang_filter = 'Выбрать класс';var smena = 'Выбрать смену';var razdel = 'Выбрать раздел';}
		  if(val == 2){var lang_filter = 'Тандау класс';var smena = 'Тандау смена';var razdel = 'Бөлімді таңдау';}
          this.filter_class2[0] = lang_filter;this.filter_smena[0] = smena;this.filters[0] = razdel;
      }
	  
    },
    methods: {
       getResults(page = 1) {
		   
		   this.loader = false;
		if(this.id_razdel && this.id_razdel!=false){
			this.razdel = this.id_razdel;
		}
	    this.loader = false;
		   axios({
			   method: 'get', //you can set what request you want to be
               url: '/video-kurses-ajax?page='+page,
			   params:{filter: 'filter',pages: this.page,razdel: this.razdel,lang: this.lang,filter_class:this.filter_class_flag},
           headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            })
			.then(response => {
	          	this.kurses = response.data.kurs;
				this.lang = response.data.lang;
				document.querySelector('.ppp').innerHTML = response.data.content;
				this.loader = true;
            })
		},
			
				
			filterrazdel(){//загрузка массива разделов
			 axios({
			   method: 'post', //you can set what request you want to be
               url: '/video-kurses-ajax',
			   data: {filters: 'filter'},
             headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              })
			.then(response => {
	          	this.filter_smena = response.data.smena;
                this.filters = response.data.razdel;
				this.filter_class2 = response.data.classf;

              })
			 
			 
		    },
		 
	filters_smena: function(event){
			 
			 this.loader = false;
			 this.filter_smena_flag = event.target.value;
			  axios({
			   method: 'get', 
               url: '/video-kurses-ajax',
			   params:{filter:'filter',filter_class:this.filter_class_flag,razdel: this.razdel,pages: this.page,smena:this.filter_smena_flag},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
			.then(response => {
	          this.kurses = response.data.kurs;
			  this.lang = response.data.lang;
             
              this.loader = true;
              document.querySelector('.ppp').innerHTML = response.data.content;
            })
			 
			 
		 },
		 
		
	  
	   load(param){if(param == true){$('.overlay').removeClass('over');}else{$('.overlay').addClass('over');}},
		  getkurses(){//массив курсов по умолчанию
	   		  this.loader = false;
           axios({
			   method: 'get', 
               url: '/video-kurses-ajax',
			   params: {filter:'filter',razdel: this.razdel,pages:this.page},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
			.then(response => {
	          			console.log(response.data.kurs);

                this.filter='default',
				this.kurses = response.data.kurs;
				this.lang = response.data.lang;
				document.querySelector('.ppp').innerHTML = response.data.content;
                this.loader = true;
           })
			
		     return this.kurses;
		 },
		 
         languages: function(event){
			 let language = event.target.value;
			 
			 if(language == 0){language = 3}
			 this.lang = language;
			 this.loader = false;
             axios({
			   method: 'get', 
               url: '/video-kurses-ajax',
			   params:{filter:'filter',razdel: this.razdel,pages: this.page,lang:language,language:language,filter_class:this.filter_class_flag},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
	    .then(response => {
		  //console.log(response.data)
             this.kurses = response.data.kurs;
			 this.lang = response.data.lang;
             this.loader = true;
            document.querySelector('.ppp').innerHTML = response.data.content;

				})
				
			 },
         filters_class: function(event){
			 
			 this.loader = false;
			
			this.filter_class_flag = event.target.value;
			
			 //this.filter_class = event.target.value;
			 	axios({
			   method: 'get', //you can set what request you want to be
               url: '/video-kurses-ajax',
			   params:{filter:'filter',filter_class:this.filter_class_flag,razdel: this.razdel,pages: this.page},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
			.then(response => {
	          //console.log(response.data.class_filter)
			  
			  this.kurses = response.data.kurs;
			  this.lang = response.data.lang;
             this.loader = true;
              document.querySelector('.ppp').innerHTML = response.data.content;

				})
			 
			 
		 },
		 
         kurs: function(event) {//фильтр раздел
		
		 	this.loader = false;
            this.razdel = event.target.value;
            //this.razdel = val;
			axios({
			   method: 'get', //you can set what request you want to be
               url: '/video-kurses-ajax',
			   params:{filter:'filter','razdel':this.razdel, pages: this.page,filter_class:this.filter_class_flag},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
			.then(response => {
	          //console.log(response.data)
			  this.filter = 'razdel';
			  this.kurses = response.data.kurs;
			  this.lang = response.data.lang;
              this.loader = true;
              document.querySelector('.ppp').innerHTML = response.data.content;

				})
				},
			
			
			
		
			
			
			
		 
	}

    }
</script>
