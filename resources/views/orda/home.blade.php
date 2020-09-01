
<div class="section__home--bg">
 @if(isset($home->description))
	{!!  $home->description !!}
 @endif
	


	@if(isset($home->sights))
      <div id="inter__map" class="section__map--home"></div>
    @endif

    </div>

    <div class="section__calendar">
		

	<div class="container">

            <div class="section__title--block">
                <div class="section__title">
                    Календарь мероприятий
                </div>
            </div>
					@include('orda.components.calendar-slider',$gid)
        </div>
		
        
    </div>
@if(isset($gid))

    <div class="section__gid">
        <div class="container">

            <div class="section__title--block">
                <div class="section__title">
                    Гиды и туроператоры
                </div>
            </div>
			@include('orda.components.slider-gid',$gid)
           <div class="calendar__all">
                <a href="{{route('gids')}}" class="calendar__all--linck">Смотреть все</a>
            </div>

        </div>
    </div>
	
@endif


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    <script src="/js/swiper-bundle.min.js"></script>
    <script src="/js/script.js"></script>

    <script src="https://api-maps.yandex.ru/2.1/?apikey=e65e00dd-dbe3-4020-a0f5-272019ac69a9&lang=ru_RU" type="text/javascript"></script>

@php
$a= $home->getArMapPoint();
$php_json = urlencode(json_encode($a));
//dd($php_json);
@endphp
<script>

var json = "{{$php_json}}";
	var json_model= JSON.parse(decodeURIComponent(json));
	var keys = Object.keys(json_model);
	var obj = {};
	var sights =[];
			//var Ad = {name:'s',coord:'coord'};
			function Ad(name,coord){
				this.name= name;
				this.coord= coord;

			}; 

//console.log(Ad);
	keys.forEach(key => {
		var name=json_model[key].name;
		var coord=json_model[key].coord;
        sights.push(new Ad(name,coord));

	})
				console.log(sights);

</script>


    <script>

        $(".interactive__map--plus").click(function () {
            zoomIn();
        });


        var object = {
            sights: [
                {
                    id: 0,
                    coordinates: [43.21032757450292, 76.8788819999999],
                    title: "Мавзолей Алаша-хана1",
                    img: "/img/sights__item1.jpg",
                    linck: "/sight-item.html"
                }, {
                    id: 1,
                    coordinates: [44.21032757450292, 77.8788819999999],
                    title: "Мавзолей Алаша-хана2",
                    img: "/img/sights__item1.jpg",
                    linck: "/sight-item.html"
                }, {
                    id: 5,
                    coordinates: [45.21032757450292, 78.8788819999999],
                    title: "Мавзолей Алаша-хана5",
                    img: "/img/sights__item1.jpg",
                    linck: "/sight-item.html"
                }, {
                    id: 4,
                    coordinates: [46.21032757450292, 78.8788819999999],
                    title: "Мавзолей Алаша-хана5",
                    img: "/img/sights__item1.jpg",
                    linck: "/sight-item.html"
                }
            ],
            routes:
                [
                    {
                        id: 12,
                        object: [
                            {
                                id: 0,
                                coordinates: [43.21032757450292, 76.8788819999999],
                                title: "Мавзолей Алаша-хана1",
                                img: "/img/sights__item1.jpg",
                                linck: "/sight-item.html"
                            }, {
                                id: 1,
                                coordinates: [44.21032757450292, 77.8788819999999],
                                title: "Мавзолей Алаша-хана2",
                                img: "/img/sights__item1.jpg",
                                linck: "/sight-item.html"
                            }, {
                                id: 5,
                                coordinates: [45.21032757450292, 78.8788819999999],
                                title: "Мавзолей Алаша-хана5",
                                img: "/img/sights__item1.jpg",
                                linck: "/sight-item.html"
                            }, {
                                id: 4,
                                coordinates: [46.21032757450292, 78.8788819999999],
                                title: "Мавзолей Алаша-хана5",
                                img: "/img/sights__item1.jpg",
                                linck: "/sight-item.html"
                            }
                        ]
                    }, {
                        id: 12,
                        object: [
                            {
                                id: 0,
                                coordinates: [43.21032757450292, 76.8788819999999],
                                title: "Мавзолей Алаша-хана1",
                                img: "/img/sights__item1.jpg",
                                linck: "/sight-item.html"
                            }, {
                                id: 1,
                                coordinates: [44.21032757450292, 77.8788819999999],
                                title: "Мавзолей Алаша-хана2",
                                img: "/img/sights__item1.jpg",
                                linck: "/sight-item.html"
                            }, {
                                id: 5,
                                coordinates: [45.21032757450292, 78.8788819999999],
                                title: "Мавзолей Алаша-хана5",
                                img: "/img/sights__item1.jpg",
                                linck: "/sight-item.html"
                            }, {
                                id: 4,
                                coordinates: [46.21032757450292, 78.8788819999999],
                                title: "Мавзолей Алаша-хана5",
                                img: "/img/sights__item1.jpg",
                                linck: "/sight-item.html"
                            }
                        ]
                    },

                ]
        }




        window.onload = function () {
            setTimeout(function () {

                var map_m = new ymaps.Map('inter__map', {
                    center: [48.21007904239703, 59.48365294121707],
                    zoom: 6,
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

