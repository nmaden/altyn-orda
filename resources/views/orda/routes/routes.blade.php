

    <div class="about__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <span>Маршруты</span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
                    Маршруты
                </h1>
            </div>

            <div class="section__filter">
                <div class="row">

                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="category_id" id="category_id" class="slct-2 js--select js--select-2" onchange="send_to_search('category_id')">
                                  <option selected disabled>По категории</option>
                                  <option value="all_category">Все категории</option>
                                  @foreach($categories as $key=>$category)
                                  
                                    @if(isset($_GET['category_id']))
                                        @if($_GET["category_id"]==$key)
                                            <option value="{{$key}}" selected>{{$category->name}}</option>
                                        @else
                                            <option value="{{$key}}">{{$category->name}}</option>
                                        @endif
                                    @else
                                        <option value="{{$key}}">{{$category->name}}</option>
                                    @endif


                                  @endforeach
                               
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="city_id" id="city_id" class="slct-1 js--select js--select-1" onchange="send_to_search('city_id')">
                                  <option selected disabled>По региону</option>
                                  <option  value="all_city">Весь регион</option>
                                  @foreach($cities as $key=>$city)
                                  
                                  @if(isset($_GET['city_id']))
                                    @if($_GET["city_id"]==$city->id)
                                        <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                    @else
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endif
                                  @else
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                  @endif
                                  
                                  @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="page__description--text">

                <div class="sights__block">
                    <div class="row">
                  @foreach($items as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="sights__item">
                                <div class="sights__item--img">
								@if(isset($item->photo))
                                    <a href="{{route('route-item',$item)}}">
                                        <img src="{{URL::asset($item->photo)}}" alt="">
                                    </a>
									@endif
                                </div>
                                <div class="sights__item--info">
								@if(isset($item->name))
                                    <div class="sights__item--title">
                                        <a href="{{route('route-item',$item)}}">

										{{$item->name}}
                                        </a>
                                    </div>
									@endif
                                    <div class="sights__item--list">
                                   @if(isset($item->relCity->name))
                                        <div class="sights__list--item">
                                            <div class="sights__list--img">
                                                <img src="/img/map-list-icon.svg" alt="">
                                            </div>
                                            <div class="sights__list--text">
											{{$item->relCity->name}}
                                            </div>
                                        </div>
									@endif
								@if(isset($item->price))
                                        <div class="sights__list--item">
                                            <div class="sights__list--price">
                                                Стоимость маршрута: {{$item->price}} тнг. 
                                            </div>
                                        </div>
                                 @endif
                                    </div>
                                </div>
                            </div>
                        </div>
             @endforeach
                    </div>


                </div>
				{!! $items->appends($request->all())->links('paginate') !!}

            </div>

        </div>
    </div>


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


    <script>
        function send_to_search(param) {
       
                let value = document.querySelector("#"+param).value;


                var url = new URL(window.location["href"]);

                var search_params = url.searchParams;


                if(value=="all_city") {
                    
                    search_params.delete(param);
                
                }
                else if( value=="all_category") {
                    search_params.delete(param);
                    
                }
                else {
                    search_params.set(param, value);
                }


                    url.search = search_params.toString();
                    var new_url = url.toString();
                    window.location.replace(new_url);


                }


</script>
    </script>