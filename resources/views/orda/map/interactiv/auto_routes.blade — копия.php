<script>


	
			
        var ar =[];
	    keys.forEach(key=>{
			
	    var coord=json_model[key];
		var index = coord.indexOf(',');
        var coord_a_1 = coord.substr(0,index);
			

        var coord_a_2 = coord.substr(index+1);
				coord_a_2 = coord_a_2.replace(/\+/g, ' ');

		ar.push(new Array(coord_a_1,coord_a_2)); 

  
		})
		        window.onload = function () {
            setTimeout(function () { getYaMap(); }, 3000);
        }

        function getYaMap() {
				   var center=[ar[0][0],ar[0][1]];

            var myMap = new ymaps.Map('maps', {
                    // При инициализации карты, обязательно нужно указать
                    // ее центр и коэффициент масштабирования
                    center: center, // Нижний Новгород
                    zoom: 8
                });
				
				
				try {
                    ar_coor = [];
                } catch (err) {
                    ar_coor = [];
                }

				
				
			
				
			var geometry = ar,
			
			properties = {
				hintContent: "Ломаная линия"
			},
			options = {
				draggable: true,
				strokeColor: '#ff0000',
				strokeWidth: 5
        
			},
			polyline = new ymaps.Polyline(geometry, properties, options);
             myMap.geoObjects.add(polyline);
			     $.each( ar, function( key, value ) {
					console.log(value);
                    var myPlacemark = new ymaps.Placemark(value);
                    myPlacemark.unix_id = ar_coor.length - 1;
                    myMap.geoObjects.add(myPlacemark);

                    myPlacemark.events.add('click', function (e) {
                        var pl = e.get('target');

                        ar_coor.splice(pl.unix_id, 1);
                        myMap.geoObjects.remove(pl);

                        
                        $('#data_coor').val(JSON.stringify(ar_coor));
                    });
                    
                });

                
				
				
        }

  
  
  
  
</script>