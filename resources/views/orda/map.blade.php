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

            
            <div class="interactive__map">
                <div id="inter__map">

                </div>
            </div>


        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.2.0/wNumb.min.js" integrity="sha512-igVQ7hyQVijOUlfg3OmcTZLwYJIBXU63xL9RC12xBHNpmGJAktDnzl9Iw0J4yrSaQtDxTTVlwhY730vphoVqJQ==" crossorigin="anonymous"></script>
    <script src="/js/nouislider.min.js"></script>

    <script src="/js/swiper-bundle.min.js"></script>
    
    
    <script src="https://api-maps.yandex.ru/2.1/?apikey=e65e00dd-dbe3-4020-a0f5-272019ac69a9&lang=ru_RU" type="text/javascript"></script>

    <script>
        window.onload = function() {
            setTimeout(function(){ getYaMap(); }, 3000);
        }
        function getYaMap(){															   
            var map_m = new ymaps.Map('inter__map', {
                center: [43.21032757450292,76.8788819999999],
                zoom: 17,
                controls: [],
            });
            var polygonLayout_m = ymaps.templateLayoutFactory.createClass('<img src="/img/map-icon.png" >');
            var polygonPlacemark_m = new ymaps.Placemark(
                [43.21032757450292,76.8788819999999],
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
	