    <div class="modal__fixed">
        <img src="/img/Vector.svg" alt="">
        <span>
            @lang('front_main.title.map')
        </span>
        <a href="/page-map" class="modal__fixed">Подробнее</a>
    </div>
        

    <div class="footer__partners">
        <div class="container">
            <div class="footer__partners--row">

                <div class="footer__partners--item">
                    <div class="footer__partners--img tooltip__item" title="Министерство культуры и спорта Республики Казахстан">
                        <a href="https://www.gov.kz/memleket/entities/mcs?lang=kk">
                            <img width="80px" src="/logo/logo1.jpeg" alt="">
                        </a>
                    </div>
                    <div class="footer__partners--text">
                        <a href="https://www.gov.kz/memleket/entities/mcs?lang=kk">
                            Министерство культуры и спорта Республики Казахстан
                        </a>
                    </div>
                </div>
                <div class="footer__partners--item">
                    <div class="footer__partners--img tooltip__item" title="АО «Национальная компания «Kazakh Tourism»">
                        <a href="https://qaztourism.kz/ru">
                            <img src="/img/gerb_sm2.png" alt="">
                        </a>
                    </div>
                    <div class="footer__partners--text">
                        <a href="https://qaztourism.kz/ru" >
                            АО «Национальная компания «Kazakh Tourism»
                        </a>
                    </div>
                </div>
                <div class="footer__partners--item">
                    <div class="footer__partners--img tooltip__item" title="Вдохновит вас на путешествие в Казахстан">
                        <a href="https://kazakhstan.travel">
                            <img src="/img/gerb_sm3.png" alt="">
                        </a>
                    </div>
                    <div class="footer__partners--text">
                        <a href="https://kazakhstan.travel">
                            Вдохновит вас на путешествие в Казахстан
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="header__row">

                <div class="header__logo">
                    <a href="/">
                        <img src="/img/logo-footer.svg" alt="">
                    </a>
                </div>
                <div class="header__right">
                    <div class="footer__social">
                        @include('orda'.'.footer.logotips',['items'=>$menu->roots(),'social'=>$social])
                        
                    </div>
					
                    <div class="header__menu">
                    
                        @include('orda'.'.footer.navigatitem',['items'=>$menu->roots()])

                    </div>
                </div>

            </div>
        </div>
    </footer>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
    $( function() {
        $( '.tooltip__item' ).tooltip({
            position: {
                my: "center bottom-20",
                at: "center top",
            },
        });
    });
</script>
<!-------------->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.2.0/wNumb.min.js"
        integrity="sha512-igVQ7hyQVijOUlfg3OmcTZLwYJIBXU63xL9RC12xBHNpmGJAktDnzl9Iw0J4yrSaQtDxTTVlwhY730vphoVqJQ=="
        crossorigin="anonymous"></script>
		
		    <script src="/js/nouislider.min.js"></script>

<!-------------->		
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="/js/swiper-bundle.min.js"></script>
<script src="/js/script.js?v=0.0.2"></script>


@php
 $route = Route::currentRouteName();
//dd($route);
@endphp

@if($route == 'home' || $route == 'routes-item' || $route == 'map' || $route =='filter-map' || $route == 'sights-map' || $route === 'routes-map')
	 <script src="https://api-maps.yandex.ru/2.1/?apikey=e65e00dd-dbe3-4020-a0f5-272019ac69a9&lang=ru_RU"
        type="text/javascript">
	</script>
<script>	
var json_model= JSON.parse(decodeURIComponent(json));
    var keys = Object.keys(json_model);

</script>

@endif
<!------интерактивная 1 routes------>
@if($route === 'routes-map' || $route === 'routes-item')
	  @include('orda.map.interactiv.karta1')
  @endif


<!------интерактивная 2 sights------>
@if($route == 'home' || $route =='sights-map' || $route =='map')
	@include('orda.map.interactiv.karta2')
	@include('orda.map.interactiv.sights')

@endif


<script>


        $( document ).ready(function() {
            $('.lang__menu .lang__menu--children li a').on('click',function(e){
				
				var v = $(this).attr('id');

				$('.current').text(v);
				
                //$(this).parent().parent().submit();
            });
			
			

			
		$('#search').on('click',function(e){
			e.preventDefault();
		})

$('#autosearch').on('keyup',function(){
	if(!route){
	  route =false;
	}
	//alert($('meta[name="csrf-token"]').attr('content'))
  var query = $(this).val();
  if(query != ''){
     $.ajax({
	      url:'/calendars',
		  data:{'q':query,'route':route},
		  headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		  type:'POST',
		  datatype:'JSON',
		  success: function(html) {
			  alert(html);
			  console.log(html);
			  if(html =='ok'){
				  
			  }else{
			  $('.wrapper-ajax').html(html);
			  }
					
		},

		});
		   
	   }
   })
	
			
			
			
			
			
        });
		
		
		
		
		
		
    </script>
	
</body>

</html>
