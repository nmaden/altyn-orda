<script>

var json_model_mame= JSON.parse(decodeURIComponent(name_json));
console.log('мы здесь');
console.log(json_model);
console.log(json_model_mame);

console.log(keys);
	
     var ar =[];
        keys.forEach(key=>{
			
	    var coord=json_model[key];
		var index = coord.indexOf(',');
        var coord_a_1 = coord.substr(0,index);
			

        var coord_a_2 = coord.substr(index+1);
				coord_a_2 = coord_a_2.replace(/\+/g, ' ');

		ar.push(new Array(coord_a_1,coord_a_2)); 

  
		})
		
		//console.log(ar[0][0]);
        window.onload = function () {
            setTimeout(function () { getYaMap(); }, 3000);
        }

        function getYaMap() {

            // Создаем карту с добавленными на нее кнопками.
            var map_m = new ymaps.Map('maps', {
                center: [ar[0][0], ar[0][1]],
                zoom: 10,
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
			   
	    var coord=json_model[key];
		var index = coord.indexOf(',');
        var coord_a_1 = coord.substr(0,index);
        var coord_a_2 = coord.substr(index+1);
		var coord_name = json_model_mame[key];
		if(coord_name){
		coord_name = coord_name.replace(/\+/g, ' ');
		}else{
			coord_name ='';
		}

		//coord_name = coord_name.replace(/\+/g, ' ');
		coord_a_2 = coord_a_2.replace(/\+/g, ' ');

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
   
var geometry = ar,
			
			properties = {
				hintContent: "Ломаная линия"
			},
			options = {
				draggable: true,
				strokeColor: '#0A8232',
				strokeWidth: 5
        
			},
			
			polyline = new ymaps.Polyline(geometry, properties, options);
			
            map_m.behaviors.disable('scrollZoom');
            // Добавляем мультимаршрут на карту.
            map_m.geoObjects.add(polyline);
			$('.inter__map--preloader').addClass("inter__map-act");

	       map_m.setBounds(map_m.geoObjects.getBounds(),{checkZoomRange:true, zoomMargin:9});
        }

  
  
  
  
</script>