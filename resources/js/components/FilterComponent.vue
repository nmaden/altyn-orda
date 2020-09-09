<template>

    <div class="row">
	{{routes}}
      <div class="col-lg-3 col-md-6 col-6">
         <div class="filter__item">
           <div class="filter--select">
             <select 
			 name="regions" 
			 id="slct-2" 
			 class="js--select js--select-d js--select-2"
			 @change="city_func()"
			 v-model="selectedCity"

			 >
                <option selected disabled>Регионы</option>
                 <option value="all">Все регионы</option>
				 <option 
				 v-for="(item, key) in city"
				 :key="key"
				 :value="item.id"
				 
				 >
				 {{item.name}}
				 </option>

              </select>
             </div>
            </div>
           </div>
							
							
							
                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="filter__item">
                                    <div class="filter--select">
                                        <select name="object" id="slct-0" class="js--select js--select-d js--select-0">
                                            <option selected disabled>Объекты</option>
                
                                           
											
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="filter__item">
                                    <div class="filter--select">
                                        <select name="category" id="slct-1" class="js--select js--select-d js--select-1">
                                            <option selected disabled>Маршруты</option>
                                 <option value="all">Все маршруты</option>
                                            
				
											
											
											
                                        </select>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
						
</template>

<script>
    export default {
	data(){
	  return {
		  selectedCity:'Регионы',
		  map_m:'',
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
	},
	
props: [
'city'
	],
      computed:{
	 
	 
	 
	 city_func() {
			 
		 	axios({
			   method: 'get', //you can set what request you want to be
               url: '/map-city',
			   params:{city_id:this.selectedCity},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
			.then(response => {
			  var json_model = response.data.data;
		//var json_model= JSON.parse(decodeURIComponent(json));
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

		

		var cat =[];
		cat.push({
			id:key,
			coordinates:[coord_a_1,coord_a_2],
			title:json_model[key].name,
			photo,
			linck:'/sight-item.html'
			});
			
		   routes.push(new Ad2(12,cat));
		

	})
     this.routes = routes;
	 this.sights = sights;
	 
this.map_m.container.fitToViewport();
  


       //myMap1.container.fitToViewport();

	 //this.start();
	 
     //console.log(this.routes);
	

	})


				
		 
		 
		 
		 
		
		 	
				},
			
	 
  },
  
        mounted() {
			this.start();
			
			
			
			
			
        },
		
		methods:{
			
			start(){
				
				
				
				
				
				
				
				
				
				
				
				
				
        $(".interactive__map--plus").click(function () {
            zoomIn();
        });


        var object = {
            sights: this.sights,
            routes: this.routes
                
        }




        window.onload = function () {
            setTimeout(function () {

                this.map_m = new ymaps.Map('inter__map', {
                    center: [48.21007904239703, 59.48365294121707],
                    zoom: 4,
                    controls: [],
                });
                this.map_m.behaviors.disable('scrollZoom');

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
                var ZoomLayout = ymaps.templateLayoutFactory.createClass('<div class="interactive__map--controller">' +
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
                var myRectangle = new ymaps.Rectangle([
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

			
		 
		 
		 
	 },
	 
			
		}
    }
</script>
