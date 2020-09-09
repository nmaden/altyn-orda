<script>


	var keys = Object.keys(json_model);
     var ar =[];
        keys.forEach(key=>{
			
	    var coord=json_model[key].coord;
		var index = coord.indexOf(',');
        var coord_a_1 = coord.substr(0,index);
        var coord_a_2 = coord.substr(index+1);
		ar.push(new Array(coord_a_1,coord_a_2)); 

  
		})
		
        window.onload = function () {
            setTimeout(function () { getYaMap(); }, 3000);
        }

        function getYaMap() {

            var multiRoute = new ymaps.multiRouter.MultiRoute({
                referencePoints: ar,
                params: {
                    results: 1,
                    reverseGeocoding: true
                }

            }, {
                boundsAutoApply: true,

                wayPointStartIconLayout: "default#image",
                wayPointStartIconImageHref: "",
                wayPointIconLayout: "default#image",
                wayPointIconImageHref: "",
                wayPointFinishIconLayout: "default#image",
                wayPointFinishIconImageHref: "",


                routeStrokeWidth: 2,
                routeStrokeColor: "#0A8232",
                routeActiveStrokeWidth: 6,
                routeActiveStrokeColor: "#0A8232",
            });


            multiRoute.model.events.add('requestsuccess', function () {
                var activeRoute = multiRoute.getActiveRoute();
                var activeRoutePaths = activeRoute.getPaths();
              
                var i = 0;
                var distance = [];
                var distance2 = [];
                activeRoutePaths.each(function (path) {
                    distance[i] = path.properties.get("distance").value/1000;
                    distance2[i] = 0;
                    i++;
                    /*console.log("Distance: " + path.properties.get("distance").text);
                    console.log("Travel time: " + path.properties.get("duration").text);*/
                });
                for(var i = 0; i<distance.length; i++){
                    for(var j = i; j<distance.length; j++){
                        distance2[i] += distance[j];
                    }
                    distance2[i] = Math.ceil(distance2[i]);
                    document.getElementById('route'+i).textContent = distance2[i] + ' км';
                }
                //console.log(distance2);
            });

            // Создаем карту с добавленными на нее кнопками.
            var map_m = new ymaps.Map('maps', {
                center: [43.21032757450292, 76.8788819999999],
                zoom: 14,
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

var size = keys.length;

 

           keys.forEach(key=>{
			   
	    var coord=json_model[key].coord;
		var index = coord.indexOf(',');
        var coord_a_1 = coord.substr(0,index);
        var coord_a_2 = coord.substr(index+1);
		var coord_name = json_model[key].coord_name;
		
			if((size-1) == key){
				
				var t='<div class="route__miker--block route__miker--active"><div class="route__miker--m"><img src="/img/bus-4.svg" alt=""></div><div class="route__miker--title">'+coord_name+'</div></div>'
				
			}else{
				var t = '<div class="route__miker--block"><div class="route__miker--m"></div><div class="route__miker--title">'+coord_name+'</div></div>'
				
			}

	        map_m.geoObjects.add(
			new ymaps.Placemark(
                [coord_a_1, coord_a_2],
                {
                    hintContent: ''
                }, {
                iconLayout: ymaps.templateLayoutFactory.createClass(t),
            }
            ));
		
	       })
   

            map_m.behaviors.disable('scrollZoom');
            // Добавляем мультимаршрут на карту.
            map_m.geoObjects.add(multiRoute);

        }

  
  
  
  
</script>