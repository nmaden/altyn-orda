<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="57x57" href="/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <title>Золотая Орда</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="/css/nouislider.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/media.css">
</head>

<body>

    <header>
        <div class="container">
            <div class="header__row">

                <div class="header__logo">
                    <a href="/">
                        <img src="/img/logo.svg" alt="">
                    </a>
                </div>
                <div class="header__right">
                    <div class="header__menu">
                        <ul class="menu">
                            <li><a href="/about.html">О золотой орде</a></li>
                            <li><a href="/sights.html">Достопримечательности</a></li>
                            <li><a href="/calendars.html">Календарь мероприятий</a></li>
                            <li><a href="/routes.html">Маршруты</a></li>
                            <li><a href="/gids.html">Гиды и туроператоры</a></li>
                        </ul>
                    </div>
                    <div class="header__lang">
                        <ul class="lang__menu">
                            <li><a href="#">ru</a>
                                <ul class="lang__menu--children">
                                    <li><a href="#">kz</a></li>
                                    <li><a href="#">en</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="header__burger">
                        <div class="burger__menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>


    <div class="page__map page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <span>Интерактивная карта</span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
                    Интерактивная карта
                </h1>
            </div>

            <div class="interactive__map--absol interactive__map--absol--mobile">
                <div class="row">

                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="object" id="slct-m0" class="js--select js--select-m js--select-0">
                                    <option selected disabled>Объекты</option>
                                    <option value="sights">Объекты</option>
                                    <option value="routes">Маршруты</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="category" id="slct-m1" class="js--select js--select-m js--select-1">
                                    <option selected disabled>Категории</option>
                                    <option value="all">Все категории</option>
                                    <option value="sightseeing">Экскурсионный тур</option>
                                    <option value="weekend">Тур выходного дня</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="regions" id="slct-m2" class="js--select js--select-m js--select-2">
                                    <option selected disabled>Регионы</option>
                                    <option value="all">Все регионы</option>
                                    <option value="nur-sultan">Нур-Султан</option>
                                    <option value="almaty">Алматы</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="interactive__map--fulscrin">
                <div class="interactive__map" id="interactive__map-main">

                    <div class="interactive__map--absol">
                        <div class="row">

                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="filter__item">
                                    <div class="filter--select">
                                        <select name="regions" id="slct-2" class="js--select js--select-d js--select-2">
                                            <option selected disabled>Регионы</option>
                                            <option value="all">Все регионы</option>
                                            <option value="nur-sultan">Нур-Султан</option>
                                            <option value="almaty">Алматы</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="filter__item">
                                    <div class="filter--select">
                                        <select name="object" id="slct-0" class="js--select js--select-d js--select-0">
                                            <option selected disabled>Объекты</option>
                                            <option value="sights">Объекты</option>
                                            <option value="routes">Маршруты</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="filter__item">
                                    <div class="filter--select">
                                        <select name="category" id="slct-1" class="js--select js--select-d js--select-1">
                                            <option selected disabled>Категории объектов</option>
                                            <option value="all">Все объекты</option>
                                            <option value="sightseeing">Обект Алаш хана</option>
                                            <option value="sightseeing">Обект Алаш хана2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                    
                </div>
            </div>


        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.2.0/wNumb.min.js"
        integrity="sha512-igVQ7hyQVijOUlfg3OmcTZLwYJIBXU63xL9RC12xBHNpmGJAktDnzl9Iw0J4yrSaQtDxTTVlwhY730vphoVqJQ=="
        crossorigin="anonymous"></script>
    <script src="/js/nouislider.min.js"></script>

    <script src="/js/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


    <script src="https://api-maps.yandex.ru/2.1/?apikey=e65e00dd-dbe3-4020-a0f5-272019ac69a9&lang=ru_RU" type="text/javascript"></script>

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
                    '<a class="interactive__map--enlarge interactive__map--cont" id="zoom-enlarge"><img src="/img/maximize.svg" alt=""> </a></div>', {
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

    <script src="/js/script.js"></script>

</body>

</html>