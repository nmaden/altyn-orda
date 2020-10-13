    <a href="/page-map" class="modal__fixed">
        <img src="/img/Vector.svg" alt="">
    </a>
    
    <div class="footer__partners">
        <div class="container">
            <div class="footer__partners--row">

                <div class="footer__partners--item">
                    <div class="footer__partners--img">
                        <a href="/">
                            <img src="/img/gerb_sm1.png" alt="">
                        </a>
                    </div>
                    <div class="footer__partners--text">
                        <a href="/">
                            Министерство культуры и спорта Республики Казахстан
                        </a>
                    </div>
                </div>
                <div class="footer__partners--item">
                    <div class="footer__partners--img">
                        <a href="/">
                            <img src="/img/gerb_sm2.png" alt="">
                        </a>
                    </div>
                    <div class="footer__partners--text">
                        <a href="/">
                            АО «Национальная компания «Kazakh Tourism»
                        </a>
                    </div>
                </div>
                <div class="footer__partners--item">
                    <div class="footer__partners--img">
                        <a href="/">
                            <img src="/img/gerb_sm3.png" alt="">
                        </a>
                    </div>
                    <div class="footer__partners--text">
                        <a href="/">
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
                        <a href="">
                            <img src="/img/icon-youtube.svg" alt="">
                        </a>
                        <a href="">
                            <img src="/img/icon-facebook-f.svg" alt="">
                        </a>
                        <a href="">
                            <img src="/img/icon-instagram-f.svg" alt="">
                        </a>
                    </div>
                    <div class="header__menu">
                    
                        @include('orda'.'.footer.navigatitem',['items'=>$menu->roots()])

                    </div>
                </div>

            </div>
        </div>
    </footer>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-------------->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.2.0/wNumb.min.js"
        integrity="sha512-igVQ7hyQVijOUlfg3OmcTZLwYJIBXU63xL9RC12xBHNpmGJAktDnzl9Iw0J4yrSaQtDxTTVlwhY730vphoVqJQ=="
        crossorigin="anonymous"></script>
		
		    <script src="/js/nouislider.min.js"></script>

<!-------------->		
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="/js/swiper-bundle.min.js"></script>
<script src="/js/script.js?v=0.0.1"></script>


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
        });
    </script>
	
</body>

</html>
