
    <footer>
        <div class="container">
            <div class="header__row">

                <div class="header__logo">
                    <a href="/">
                        <img src="/img/logo-footer.svg" alt="">
                    </a>
                </div>
                <div class="header__right">
                    <div class="header__menu">
                       <?php echo $__env->make('orda'.'.navigate-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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


<?php
 $route = Route::currentRouteName();
//dd($route);
?>

<?php if($route == 'home' || $route == 'route-item' || $route == 'map' || $route =='filter-map' || $route == 'sights-map' || $route === 'routes-map'): ?>
	 <script src="https://api-maps.yandex.ru/2.1/?apikey=e65e00dd-dbe3-4020-a0f5-272019ac69a9&lang=ru_RU"
        type="text/javascript">
	</script>
<script>	
var json_model= JSON.parse(decodeURIComponent(json));
    var keys = Object.keys(json_model);

</script>

<?php endif; ?>
<!------интерактивная 1 routes------>
<?php if($route === 'routes-map' || $route === 'route-item'): ?>
	  <?php echo $__env->make('orda.map.interactiv.karta1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
  <?php endif; ?>

<!------конвертация json php------>
<?php if($route == 'home' || $route == 'map' || $route =='sights-map'): ?>
	<?php echo $__env->make('orda.map.interactiv.sights', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php endif; ?>

<!------интерактивная 2 sights------>
<?php if($route == 'home' || $route =='sights-map' || $route =='map'): ?>
	<?php echo $__env->make('orda.map.interactiv.karta2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php endif; ?>
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
<?php /**PATH /home/vagrant/code/orda/resources/views/orda/layouts/footer.blade.php ENDPATH**/ ?>