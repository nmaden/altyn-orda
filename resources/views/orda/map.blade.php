@php
 $route = Route::currentRouteName();
//dd($route);
@endphp
    <div class="page__map page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">@lang('front_main.bread.home')</a>
                    </li>
                    <li>
                        <span>@lang('front_main.title.map')</span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
					<br>
					@if($php_json === 0)
						@lang('front_main.title.result') 
					@else
						@lang('front_main.title.map')
					@endif
					
					<br>
					
					@if(isset($count_map))
                    
				    @endif
                </h1>
            </div>
            <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">--->
						

            <div class="interactive__map--fulscrin">
                <div class="interactive__map" id="interactive__map-main">

                    <div class="interactive__map--absol">
						<form action="" method='get' style='width:100%'>
                            <div class="row">
                            

                                <div class="col-lg-3 col-md-6 col-6">
                                    <div class="filter__item">
                                        <div class="filter--select">
                                            <select name="regions" id="slct-2" class="js--select slct-2 js--select-d js--select-2 region"
                                            onchange="filter('region')"
                                            >
                                                <option selected disabled>
												  @lang('front_main.filter.regions')
                                                </option>
                                                <option value="0">
												  @lang('front_main.filter.all_region')
                                                </option>
                                                @if(isset($city[0]))
                                                @foreach($city as $k=>$item)
                                            
                                                @if(isset($ids->regions))
                                                <option {{$item->id == $ids->regions ? 'selected' : ''}} value="{{$item->id}}">
                                                {{$item->name}}
                                                
                                                </option>
                                                
                                                @else
                                                <option value="{{$item->id}}">
                                                {{$item->name}}
                                                
                                                </option>
                                                
                                                @endif
                                                
                                                @endforeach
                                                @endif
                                                
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6">
                                    <div class="filter__item">
                                        <div class="filter--select">
                                            <select name="sights" id="slct-0" class="js--select slct-0 js--select-d js--select-0 sights"
                                            onchange="filter('sights')"

                                            >
                                                <option selected disabled>
												  @lang('front_main.filter.object')
                                                </option>
                                                                                                                                                                                                                

                                                <option value="0">
												 @lang('front_main.filter.all_object')
                                                 </option>
                                                
                                                @if(isset($sights_lib[0]))
                                                @foreach($sights_lib as $k=>$item)
                                                                                                                                @if(isset($ids->sights))

                                                <option {{$item->id == $ids->sights ? 'selected' : ''}} value="{{$item->id}}">
                                                <a href="">{{$item->name}}</a>
                                                </option>
                                                @else
                                                    
                                                <option value="{{$item->id}}">
                                                <a href="">{{$item->name}}</a>
                                                </option>
                                                @endif
                                                @endforeach
                                                @endif
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6">
                                    <div class="filter__item">
                                        <div class="filter--select">
                                            <select name="routes" id="slct-1" class="js--select slct-1 js--select-d js--select-1"
                                            onchange="filter('routes')"
                                            >
                                                <option selected disabled>
												 @lang('front_main.routes.title')

												</option>
                                                <option value="0">
													@lang('front_main.filter.all_routes')

												</option>
                                                
                                                
                                                @if(isset($routes_lib[0]))
                                                @foreach($routes_lib as $k=>$item)
                                            
                                                @if(isset($ids->routes))
                                                <option {{$item->id == $ids->routes ? 'selected' : ''}} value="{{$item->id}}">
                                                {{$item->name}}
                                                
                                                </option>
                                                
                                                @else
                                                <option value="{{$item->id}}">
                                                {{$item->name}}
                                                
                                                </option>
                                                
                                                @endif
                                                
                                                @endforeach
                                                @endif
                                                
                                                
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
						</form>
                    </div>
					
                    @if($route == 'routes-map')
                        <div class="route__line--block" style='display:none'>
                            <div class="route__line">

                                <div class="route__line--li">
                                    <div class="route__line--item">
                                        <div class="route__item--absol">
                                            <div class="route__item--img">
                                                <img src="/img/bus-1.svg" alt="">
                                            </div>
                                            <div class="route__item--km" id="route0">
                                                0 км
                                            </div>
                                        </div>
                                        <div class="route__item--btn">
                                            <a>
                                                По следам Золотой Орды
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="route__line--li">
                                    <div class="route__line--item">
                                        <div class="route__item--absol">
                                            <div class="route__item--img">
                                                <img src="/img/bus-1.svg" alt="">
                                            </div>
                                            <div class="route__item--km"  id="route1">
                                                0 км
                                            </div>
                                        </div>
                                        <div class="route__item--btn">
                                            <a>
                                                По следам Золотой Орды
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="route__line--li">
                                    <div class="route__line--item">
                                        <div class="route__item--absol">
                                            <div class="route__item--img">
                                                <img src="/img/bus-1.svg" alt="">
                                            </div>
                                            <div class="route__item--km" id="route2">
                                                0 км
                                            </div>
                                        </div>
                                        <div class="route__item--btn">
                                            <a>
                                                По следам Золотой Орды
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="route__line--li">
                                    <div class="route__line--item route__line--active">
                                        <div class="route__item--absol">
                                            <div class="route__item--img">
                                                <img src="/img/bus-4.svg" alt="">
                                            </div>
                                            <div class="route__item--km" id="route3">
                                                0 км
                                            </div>
                                        </div>
                                        <div class="route__item--btn">
                                            <a>
                                                Мавзолей Алаша хана
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="route__line--maps">
                            <div id="maps"></div>
                        </div>
                    @else
                        <div id="inter__map"></div>

                    @endif	

                </div>
            </div>
					


        </div>
    </div>
	

@if(isset($name))
	<script>
	var name_json = "{{$name}}";
</script>
@endif

<script>var json = "{{$php_json}}";</script>
@if($route == 'routes-map')
<script>
console.log('kaks');
console.log(json);
    var url = new URL(window.location["href"]);
    var search = url.searchParams;
	var v = /routes=[\d]+/i;
	var req= search.toString().match(v);
	if(req[0]){
		history.pushState('', '', '/routes-map?'+req[0]);

	}
	
	//alert(search);
	//var arr = search.toString().split('&');
	     //history.pushState('', '', '/routes-map?');


</script>
@else
	<script>

   var url = new URL(window.location["href"]);
    var search = url.searchParams;
	var v = /regions=[\d]+/i;
	var req= search.toString().match(v);
	var address ='';
	
	if(req[0]){address = '?'+req[0]}
	
	var v = /sights=[\d]+/i;
    var req2= search.toString().match(v);
	if(req2[0]){address += '&'+req2[0]}
    history.pushState('', '', address);

	</script>

@endif

<script>

     //history.pushState('', '', '/page-map');
function filter(param) {
	
  $('form').attr('action','sights-map');
  if(param == 'routes'){
	  //alert($(this).val()
  $('form').attr('action','routes-map');
       //history.pushState('', '', '/routes-map?routes=');

   }
  $('form').submit();}
      

</script>


     

 
  

 
	

