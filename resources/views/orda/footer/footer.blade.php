    <div class="modal__fixed">
        <div class="modal__fixed--img">
            <img src="/img/Vector.svg" alt="">
        </div>  
        <span>
            @lang('front_main.title.map')
        </span>
        <a href="/page-map" class="modal__fixed--linck">Подробнее</a>
    </div>
        

    <div class="footer__partners">
        <div class="container">
            <div class="footer__partners--row">

                <div class="footer__partners--item">
                    <div class="footer__partners--img tooltip__item" title="Министерство культуры и спорта Республики Казахстан">
                        <a href="https://www.gov.kz/memleket/entities/mcs?lang=kk">
                            <img width="80px" src="/logo/logo1.png" alt="">
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
                        
                    </div>
					
                    <div class="header__menu">
                    
					   @include('orda'.'.footer.logotips')
<div class='clearfix'></div>

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
    window.smoothScrollTo = (function () {
        var timer, start, factor;
        
        return function (target, duration) {
            var offset = window.pageYOffset,
                delta  = target - window.pageYOffset; // Y-offset difference
            duration = duration || 1000;              // default 1 sec animation
            start = Date.now();                       // get start time
            factor = 0;
            if( timer ) {
                clearInterval(timer); // stop any running animations
            }
            function step() {
                var y;
                factor = (Date.now() - start) / duration; // get interpolation factor
                if( factor >= 1 ) {
                    clearInterval(timer); // stop animation
                    factor = 1;           // clip to max 1.0
                } 
                y = factor * delta + offset;
                window.scrollBy(0, y - window.pageYOffset);
            }
            timer = setInterval(step, 10);
            return timer;
        };
    }());
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
<!------вывод маршрутов------>
<!------вывод карты на странице маршруты и на странице интерактивная карта------>

@if($route === 'routes-map' || $route === 'routes-item')
	  @include('orda.map.interactiv.karta1')
  @endif


<!------вывод достопримечательностей на главной и на странице интерактивная карта------>
@if($route == 'home' || $route =='sights-map' || $route =='map')
	@include('orda.map.interactiv.karta2')<!--первая часть zoom, center--->
	@include('orda.map.interactiv.sights')<!--вторая часть координаты часть zoom, center--->

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
