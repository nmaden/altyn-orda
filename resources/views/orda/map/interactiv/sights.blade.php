  <script>
 
	
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
		'/sights-item/'+json_model[key].id
		
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
