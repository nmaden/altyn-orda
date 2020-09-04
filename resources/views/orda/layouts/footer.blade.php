
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
                       @include('orda'.'.navigate-item')
                    </div>
                </div>

            </div>
        </div>
    </footer>



<!-- -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="/js/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.2.0/wNumb.min.js" integrity="sha512-igVQ7hyQVijOUlfg3OmcTZLwYJIBXU63xL9RC12xBHNpmGJAktDnzl9Iw0J4yrSaQtDxTTVlwhY730vphoVqJQ==" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script src="/js/nouislider.min.js"></script>
<script src="/js/script.js"></script>


@php
 $route = Route::currentRouteName();
//dd($route);
@endphp
@if($route == 'home' || $route == 'route-item' || $route == 'map')
	 <script src="https://api-maps.yandex.ru/2.1/?apikey=e65e00dd-dbe3-4020-a0f5-272019ac69a9&lang=ru_RU"
        type="text/javascript">
	</script>
@else
	
@endif
@if($route == 'home' || $route == 'map')

<script>

	var json_model= JSON.parse(decodeURIComponent(json));
	var keys = Object.keys(json_model);
	var sights =[];
	var routes =[];
        function Ad(id,coordinates,title,photo,linck){
				this.id = id;
				this.coordinates = coordinates;
                this.title = title;
				this.img = photo;
                this.linck = linck;
			}; 
			function Ad2(id,object){
				this.id= id;
				this.object= object;

			}; 
			

	keys.forEach(key => {
		var name=json_model[key].name;
		var coord=json_model[key].coord;
		var index = coord.indexOf(',');
        var coord_a_1 = coord.substr(0,index);
        var coord_a_2 = coord.substr(index+1);

		//alert(json_model[key].photo);
	    var photo = json_model[key].photo;
	    sights.push(new Ad(
		key,
		[coord_a_1,coord_a_2],
		json_model[key].name,
		photo,
		'/sight-item/'+json_model[key].id
		
		));

		

		cat =[];
		cat.push({
			id:key,
			coordinates:[coord_a_1,coord_a_2],
			title:json_model[key].name,
			photo,
			linck:'/sight-item.html'
			});
			
		   routes.push(new Ad2(12,cat));
		

	})

        $(".interactive__map--plus").click(function () {
            zoomIn();
        });
var object = {
            sights: sights,
			routes:routes
          }
		  

</script>
@endif


@if($route == 'home')
<script>

        window.onload = function () {
            setTimeout(function () {

                var map_m = new ymaps.Map('inter__map', {
                    center: [48.21007904239703, 59.48365294121707],
                    zoom: 4,
                    controls: [],
                });
                // Увеличение, уменьшение масштаба
                ZoomLayout = ymaps.templateLayoutFactory.createClass('<div class="interactive__map--controller">' +
                    '<a class="interactive__map--plus interactive__map--cont" id="zoom-in"><img src="/img/plus.svg" alt=""></a>' +
                    '<a class="interactive__map--minus interactive__map--cont" id="zoom-out"><img src="/img/minus.svg" alt=""></a>', {
                    build: function () {
                        ZoomLayout.superclass.build.call(this);
                        this.zoomInCallback = ymaps.util.bind(this.zoomIn, this);
                        this.zoomOutCallback = ymaps.util.bind(this.zoomOut, this);
                        $('#zoom-in').bind('click', this.zoomInCallback);
                        $('#zoom-out').bind('click', this.zoomOutCallback);
                    },
                    zoomIn: function () {
                        var map = this.getData().control.getMap();
                        map.setZoom(map.getZoom() + 1, { checkZoomRange: true });
                    },
                    zoomOut: function () {
                        var map = this.getData().control.getMap();
                        map.setZoom(map.getZoom() - 1, { checkZoomRange: true });
                    }
                }),
                zoomControl = new ymaps.control.ZoomControl({ options: { layout: ZoomLayout } });
                map_m.controls.add(zoomControl);
                
                map_m.behaviors.disable('scrollZoom');

                var objectManager = new ymaps.ObjectManager({ clusterize: false });
                ymaps.ready(mapinterSights(object['sights'], map_m, objectManager));

                // Фон карты
                myRectangle = new ymaps.Rectangle([
                    [33.93833575587559, 29.952402941217045],
                    [62.931169581282674, 84.23774690361466]
                ], {
                }, {
                    fillImageHref: '/img/map__bg2.svg',
                    strokeOpacity: 0,
                    strokeWidth: 0,
                    borderRadius: 0
                });
                map_m.geoObjects.add(myRectangle);





                function mapinterSights(mas_object, map_m, objectManager) {

                    var i = 0;
                    mas_object.forEach(element => {
                        var polygonLayout_m = ymaps.templateLayoutFactory.createClass(
                            '<div class="section__map--item" id="section__map--item-' + element['id'] + '">' +
                            '<div class="section__map--mark"></div>' +
                            '</div>');
                        var MyBalloonLayout = ymaps.templateLayoutFactory.createClass(
                            '$[[options.contentLayout]]', {
                            onCloseClick: function (e) {
                                e.preventDefault();

                                this.events.fire('userclose');
                            },
                        });
                        var MyBalloonContentLayout = ymaps.templateLayoutFactory.createClass(
                            '<div class="section__map--info section__map--baloon">' +
                            '<div class="section__map--img">' +
                            '<img src="' + element['img'] + '" alt="">' +
                            '</div>' +
                            '<div class="section__map--title">' +
                            element['title'] +
                            '</div>' +
                            '<a href="' + element['linck'] + '" class="section__map--linck">Подробнее</a>' +
                            '</div>'
                        );


                        // Добавим единичный объект.
                        objectManager.add({
                            type: 'Feature',
                            id: element['id'],
                            geometry: {
                                type: 'Point',
                                coordinates: element['coordinates']
                            },
                            properties: {
                                //hintContent: '',
                            },
                            options: {
                                balloonShadow: true,
                                balloonLayout: MyBalloonLayout,
                                balloonContentLayout: MyBalloonContentLayout,
                                balloonPanelMaxMapArea: 1,

                                iconLayout: 'default#imageWithContent',
                                iconImageHref: ' ',
                                iconImageSize: [26, 26],
                                iconImageOffset: [-13, -13],
                                iconContentLayout: polygonLayout_m,

                                hideIconOnBalloonOpen: false
                            }
                        });

                        map_m.geoObjects.add(objectManager);

                        i++;
                    });
                    objectManager.objects.events.add(['click'], onObjectEvent);
                }
             
                function onObjectEvent(e) {
                    var objectId = e.get('objectId');
                    
                    $(".section__map--item").removeClass('section__map--active');
                    $("#section__map--item-" + objectId).addClass('section__map--active');
                }




            }, 3000);
        }

</script>
@endif

@if($route == 'map')

<script>
   



        window.onload = function () {
            setTimeout(function () {

                var map_m = new ymaps.Map('inter__map', {
                    center: [48.21007904239703, 59.48365294121707],
                    zoom: 4,
                    controls: [],
                });
                map_m.behaviors.disable('scrollZoom');

                var balloonLayout = ymaps.templateLayoutFactory.createClass(
                    "<div>", {
                        build: function () {
                            this.constructor.superclass.build.call(this);
                        }
                    }
                );

                var objectManager = new ymaps.ObjectManager({ clusterize: false });
                var objectManager2 = new ymaps.ObjectManager({ clusterize: false });
                var multiRoute = new ymaps.multiRouter.MultiRoute(
                    {
                        referencePoints: [],
                       
                    }, {
                    boundsAutoApply: true,
                    viaPointDraggable: true,

                    balloonLayout: balloonLayout,
                    balloonPanelMaxMapArea: 0,
                    

                    wayPointStartIconLayout: balloonLayout,
                    wayPointStartIconImageHref: "",
                    wayPointIconLayout: balloonLayout,
                    wayPointIconImageHref: "",
                    wayPointFinishIconLayout: balloonLayout,
                    wayPointFinishIconImageHref: "",


                    routeStrokeWidth: 2,
                    routeStrokeColor: "#0A8232",
                    routeActiveStrokeWidth: 6,
                    routeActiveStrokeColor: "#0A8232",
                });

                //ymaps.ready(mapinterInit(object, map_m, objectManager));
                ymaps.ready(mapinterSights(object['sights'], map_m, objectManager));

                // Увеличение, уменьшение масштаба
                ZoomLayout = ymaps.templateLayoutFactory.createClass('<div class="interactive__map--controller">' +
                    '<a class="interactive__map--plus interactive__map--cont" id="zoom-in"><img src="/img/plus.svg" alt=""></a>' +
                    '<a class="interactive__map--minus interactive__map--cont" id="zoom-out"><img src="/img/minus.svg" alt=""></a>' +
                    '<a class="interactive__map--enlarge interactive__map--cont" id="zoom-enlarge"><img src="/img/maximize.svg" alt=""> </a></div>',
					{
                    build: function () {
                        ZoomLayout.superclass.build.call(this);
                        this.zoomInCallback = ymaps.util.bind(this.zoomIn, this);
                        this.zoomOutCallback = ymaps.util.bind(this.zoomOut, this);
                        $('#zoom-in').bind('click', this.zoomInCallback);
                        $('#zoom-out').bind('click', this.zoomOutCallback);
                    },
                    zoomIn: function () {
                        var map = this.getData().control.getMap();
                        map.setZoom(map.getZoom() + 1, { checkZoomRange: true });
                    },
                    zoomOut: function () {
                        var map = this.getData().control.getMap();
                        map.setZoom(map.getZoom() - 1, { checkZoomRange: true });
                    }
                }),
                    zoomControl = new ymaps.control.ZoomControl({ options: { layout: ZoomLayout } });
                map_m.controls.add(zoomControl);


                // Фон карты
                myRectangle = new ymaps.Rectangle([
                    [33.93833575587559, 29.952402941217045],
                    [62.931169581282674, 84.23774690361466]
                ], {
                }, {
                    fillImageHref: '/img/map__bg2.svg',
                    strokeOpacity: 0,
                    strokeWidth: 0,
                    borderRadius: 0
                });
                map_m.geoObjects.add(myRectangle);


                $('.interactive__map--absol select.js--select').on('change', function () {
                    
                    if($(this).attr('name') == 'object'){
                        objectManager.removeAll();
                        objectManager2.removeAll();
                        multiRoute.model.setReferencePoints([]);
                        
                        if ($(this).val() == 'sights') {
                            mapinterSights(object['sights'], map_m, objectManager);
                        } else if ($(this).val() == 'routes') {
                            mapinterRoutes(object['routes'], map_m, objectManager2, multiRoute, ymaps);
                        }
                    }

                });
                                
                $(document).on('click', "#zoom-enlarge", function(){
                    /* -------------- Тут планируеться ajax -------------- */
                    if($(this).hasClass('zoom-active')){
                        $(this).removeClass("zoom-active");
                        $('#interactive__map-main').removeClass("interactive__map-active");
                        $('body').removeClass("bodymap-active");
                        //exitFullscreen('interactive__map-main');
                        $(this).html('<img src="/img/maximize.svg">');
                    }else{
                        $(this).addClass("zoom-active");
                        $('#interactive__map-main').addClass("interactive__map-active");
                        $('body').addClass("bodymap-active");
                        //enterFullscreen('interactive__map-main');
                        $(this).html('<img src="/img/minimize.svg">');
                    }

                    setTimeout(function () {
                        map_m.container.fitToViewport();
                    }, 600);
                                        
                });




                function mapinterSights(mas_object, map_m, objectManager) {

                    var i = 0;
                    mas_object.forEach(element => {
                        var polygonLayout_m = ymaps.templateLayoutFactory.createClass(
                            '<div class="section__map--item" id="section__map--item-' + element['id'] + '">' +
                            '<div class="section__map--mark"></div>' +
                            '</div>');
                        var MyBalloonLayout = ymaps.templateLayoutFactory.createClass(
                            '$[[options.contentLayout]]', {
                            onCloseClick: function (e) {
                                e.preventDefault();

                                this.events.fire('userclose');
                            },
                        });
                        var MyBalloonContentLayout = ymaps.templateLayoutFactory.createClass(
                            '<div class="section__map--info section__map--baloon">' +
                            '<div class="section__map--img">' +
                            '<img src="' + element['img'] + '" alt="">' +
                            '</div>' +
                            '<div class="section__map--title">' +
                            element['title'] +
                            '</div>' +
                            '<a href="' + element['linck'] + '" class="section__map--linck">Подробнее</a>' +
                            '</div>'
                        );


                        // Добавим единичный объект.
                        objectManager.add({
                            type: 'Feature',
                            id: element['id'],
                            geometry: {
                                type: 'Point',
                                coordinates: element['coordinates']
                            },
                            properties: {
                                //hintContent: '',
                            },
                            options: {
                                balloonShadow: true,
                                balloonLayout: MyBalloonLayout,
                                balloonContentLayout: MyBalloonContentLayout,
                                balloonPanelMaxMapArea: 1,

                                iconLayout: 'default#imageWithContent',
                                iconImageHref: ' ',
                                iconImageSize: [26, 26],
                                iconImageOffset: [-13, -13],
                                iconContentLayout: polygonLayout_m,

                                hideIconOnBalloonOpen: false
                            }
                        });

                        map_m.geoObjects.add(objectManager);

                        i++;
                    });
                    objectManager.objects.events.add(['click'], onObjectEvent);
                }
                function mapinterRoutes(mas_object, map_m, objectManager, multiRoute, ymaps) {
                    var i = 0;
                    var coordinates1 = new Array();

                    var objectManager2 = new ymaps.ObjectManager({ clusterize: false });

                    mas_object.forEach(element1 => {

                        var j = 0;
                        element1['object'].forEach(el_object => {
                            coordinates1[j] = el_object['coordinates'];
                            j++;
                        });
                        multiRoute.model.setReferencePoints(coordinates1);
                        map_m.geoObjects.add(multiRoute);

                        mapinterSights(element1['object'], map_m, objectManager);
                        i++;
                    });


                }

                function onObjectEvent(e) {
                    var objectId = e.get('objectId');
                    
                    $(".section__map--item").removeClass('section__map--active');
                    $("#section__map--item-" + objectId).addClass('section__map--active');
                }




            }, 3000);
        }

    </script>
@endif
  
</body>

</html>
