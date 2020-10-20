<script>
    /*-*/
   
    window.onload = function () {
        setTimeout(function () {
            ymaps.ready(function () { 
                
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

                $('.inter__map--preloader').addClass("inter__map-act");
            });
            function mapinterSights(mas_object, map_m, objectManager) {

                var i = 0;
                mas_object.forEach(element => {
                    var polygonLayout_m = ymaps.templateLayoutFactory.createClass(
                        '<div class="section__map--item" id="section__map--item-' + element['id'] + '">' +
                        '<div class="section__map--mark"></div>' +
                        '</div>');
                    /*var MyBalloonLayout = ymaps.templateLayoutFactory.createClass(
                        '$[[options.contentLayout]]', {
                        onCloseClick: function (e) {
                            e.preventDefault();

                            this.events.fire('userclose');
                        },
                    });*/
                    var MyBalloonLayout = ymaps.templateLayoutFactory.createClass(
                            '<div class="section__map--info section__map--baloon popover top">' +
                                '<a class="close" href="#">&times;</a>' +
                                '<div class="arrow"></div>' +
                                '<div class="section__map--img">' +
                                    '<img src="' + element['img'] + '" alt="">' +
                                '</div>' +
                                '<div class="section__map--title">' +
                                    element['title'] +
                                '</div>' +
                                '<a href="' + element['linck'] + '" class="section__map--linck">Подробнее</a>' +
                            '</div>', {
                            /**
                             * Строит экземпляр макета на основе шаблона и добавляет его в родительский HTML-элемент.
                             * @see  https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/layout.templateBased.Base.xml#build
                             * @function
                             * @name  build
                             */
                            build: function () {
                                this.constructor.superclass.build.call(this);

                                this._$element = $('.popover', this.getParentElement());

                                this._$element.find('.close')
                                    .on('click', $.proxy(this.onCloseClick, this));
                            },

                            /**
                             * Удаляет содержимое макета из DOM.
                             * @see  https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/layout.templateBased.Base.xml#clear
                             * @function
                             * @name  clear
                             */
                            clear: function () {
                                this._$element.find('.close')
                                    .off('click');

                                this.constructor.superclass.clear.call(this);
                            },

                            /**
                             * Метод будет вызван системой шаблонов АПИ при изменении размеров вложенного макета.
                             * @see  https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/IBalloonLayout.xml#event-userclose
                             * @function
                             * @name  onSublayoutSizeChange
                             */
                            onSublayoutSizeChange: function () {
                                MyBalloonLayout.superclass.onSublayoutSizeChange.apply(this, arguments);

                                if(!this._isElement(this._$element)) {
                                    return;
                                }


                                this.events.fire('shapechange');
                            },


                            /**
                             * Закрывает балун при клике на крестик, кидая событие "userclose" на макете.
                             * @see  https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/IBalloonLayout.xml#event-userclose
                             * @function
                             * @name  onCloseClick
                             */
                            onCloseClick: function (e) {
                                e.preventDefault();
                                $('.section__map--item').removeClass('section__map--active');
                                this.events.fire('userclose');
                            },

                            /**
                             * Используется для автопозиционирования (balloonAutoPan).
                             * @see  https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/ILayout.xml#getClientBounds
                             * @function
                             * @name  getClientBounds
                             * @returns  {Number[][]} Координаты левого верхнего и правого нижнего углов шаблона относительно точки привязки.
                             */
                            getShape: function () {
                                if(!this._isElement(this._$element)) {
                                    return MyBalloonLayout.superclass.getShape.call(this);
                                }

                                var position = this._$element.position();

                                return new ymaps.shape.Rectangle(new ymaps.geometry.pixel.Rectangle([
                                    [position.left, position.top], [
                                        position.left + this._$element[0].offsetWidth,
                                        position.top + this._$element[0].offsetHeight + this._$element.find('.arrow')[0].offsetHeight
                                    ]
                                ]));
                            },

                            /**
                             * Проверяем наличие элемента (в ИЕ и Опере его еще может не быть).
                             * @function
                             * @private
                             * @name  _isElement
                             * @param  {jQuery} [element] Элемент.
                             * @returns  {Boolean} Флаг наличия.
                             */
                            _isElement: function (element) {
                                return element && element[0] && element.find('.arrow')[0];
                            }
                    });
                    /*var MyBalloonContentLayout = ymaps.templateLayoutFactory.createClass(
                        '<div class="section__map--info section__map--baloon">' +
                            '<a class="close">&times;</a>' +
                            '<div class="section__map--img">' +
                                '<img src="' + element['img'] + '" alt="">' +
                            '</div>' +
                            '<div class="section__map--title">' +
                                element['title'] +
                            '</div>' +
                            '<a href="' + element['linck'] + '" class="section__map--linck">Подробнее</a>' +
                        '</div>',{

                        }
                    );*/


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
                            //balloonContentLayout: MyBalloonContentLayout,
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
<?php /**PATH /home/vagrant/code/orda/resources/views/orda/map/interactiv/karta2.blade.php ENDPATH**/ ?>