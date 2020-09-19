	      <?php
		      $coord1 = $item->address2[0];
			  $coord2 = $item->address2[1];
		    ?>
		

	  <script src="https://api-maps.yandex.ru/2.1/?apikey=e65e00dd-dbe3-4020-a0f5-272019ac69a9&lang=ru_RU" type="text/javascript"></script>

    <script>
        window.onload = function() {
            setTimeout(function(){ getYaMap(); }, 3000);
        }
        function getYaMap(){															   
            var map_m = new ymaps.Map('maps', {
                center: [<?php echo e($coord1); ?>,<?php echo e($coord2); ?>],
                zoom: 17,
                controls: [],
            });
            var polygonLayout_m = ymaps.templateLayoutFactory.createClass('<img src="/img/map-icon.png" >');
            var polygonPlacemark_m = new ymaps.Placemark(
                [<?php echo e($coord1); ?>,<?php echo e($coord2); ?>],
                {
                    hintContent: 'Как найти нас в Алматы'
                }, {
                    iconLayout: 'default#image',
                    iconImageHref: '/img/marker.svg',
                    iconImageSize: [73, 91],
                    iconImageOffset: [-36, -91]
                }
            );
            map_m.geoObjects.add(polygonPlacemark_m);
            map_m.behaviors.disable('scrollZoom');
        }		
    
    </script>
<?php /**PATH /home/vagrant/code/orda/resources/views/orda/script.blade.php ENDPATH**/ ?>