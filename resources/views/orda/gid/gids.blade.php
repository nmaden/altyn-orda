

    <div class="about__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <span>Гиды и туроператоры</span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
                    Гиды и туроператоры
                </h1>
            </div>

            <div class="section__filter">
                <form class="row">

                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="city_id" id="city_id" class="slct-0 js--select js--select-0" onchange="send_to_search('city_id')">
                                  <option selected disabled>Регионы</option>
                                
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
                    <div class="col-lg-3 col-md-6 col-6">

                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="lang_id" id="lang_id" class="slct-1 js--select js--select-1" onchange="send_to_search('lang_id')">
                                
                                  <option selected disabled>Языки</option>
                                 
                                    <option  value="all_lang">Весь язык</option>
                                  

                                    
                                    @foreach($languages as $key=>$lang)
                                        @if(isset($_GET['lang_id']))
                                            @if($_GET['lang_id']==$lang->id)
                                                <option value="{{$lang->id}}" selected>{{$lang->name}}</option>
                                            @else
                                                <option value="{{$lang->id}}">{{$lang->name}}</option>
                                            @endif
                                        @else
                                            <option value="{{$lang->id}}">{{$lang->name}}</option>
                                        @endif
                                    
                                    @endforeach
                                  
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="category_id" id="category_id"  class="slct-2 js--select js--select-2" onchange="send_to_search('category_id')">
                               
                                  <option selected disabled>Специализация</option>
                                  <option value="all_category">Все специализации</option>
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
                    <div class="col-lg-3 col-md-6 col-6">

                        <div class="filter__slider">
                            <div class="filter">
                                <div data-current-min-value="2000" data-current-max-value="9000" data-min-value="1000" data-max-value="10000" class="range-widget js-range">
                                <div class="range-widget__slider"></div>
                                <input type="hidden" value="1000" name="arrFilter_P1_MIN" class="range-widget-min range-widget__input">
                                <input type="hidden" value="10000" name="arrFilter_P1_MAX" class="range-widget-max range-widget__input">
                                </div>
                            </div>
                        </div>

                    </div>

                </form>
            </div>

            <div class="page__description--text">

                <div class="sights__block gid__block">
                    <div class="row">
              @foreach($gid as $item)
                   
                    <div class="col-lg-4 swiper-slide">
                        <div class="gid__item">
                            <div class="gid__item--top">

                                <div class="gid__item--img">
                                   <a href="{{route('gids-item',$item)}}">
                               @if(isset($item->photo))
                                    <img src="{{URL::asset($item->photo)}}" alt="">
								@endif
                                    </a>
                                </div>
                                <div class="gid__item--info">
                                    <div class="gid__item--toptext">
									@if(isset($item->name))
									{{$item->name}}
								    @endif
                                    </div>
                                    <div class="gid__item--title">
                                        <a href="{{route('gids-item',$item)}}">
                                            @if(isset($item->imya))
									{{$item->imya}}
								    @endif
                                        </a>
                                    </div>
                                    <div class="gid__item--lang">
							
                                  	
							@if($item->getLangAr() >= 0)
							    @include('orda.gid.components.item-lang',$item)
							@endif
								
                                    </div>
                                </div>

                            </div>
                            <div class="gid__item--body">
                                <div class="gid__item--price">
                                    Стоимость: от          @if(isset($item->price))
									{{$item->price}}
								    @endif тг / 
				          @include('orda.components.sposob-oplaty',$item)

                                </div>
                            </div>
                            <div class="gid__item--bottom">
                                <div class="gid__bottom--item">
                                    <div class="gid__bottom--img">
                                        <img src="/img/map-icon.svg" alt="">
                                    </div>
									@if(isset($item->relCity->name))
                                    <div class="gid__bottom--text">
                                        
									{{$item->relCity->name}}
								   
                                    </div>
									 @endif
                                </div>
                                <div class="gid__bottom--item">
                                    <div class="gid__bottom--img">
                                        <img src="/img/phone-icon.svg" alt="">
                                    </div>
								 @if(isset($item->phone))
									
								  <div class="gid__bottom--text">
                                        <a href="tel:{{$item->phone}}">
										{{$item->phone}}
										</a>
                                    </div>
								    @endif
									
                                  
                                </div>
                            </div>
                        </div>
                    </div>
@endforeach


                    </div>

                </div>
				{!! $gid->appends($request->all())->links('paginate') !!}

            


            </div>

        </div>
    </div>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
<script>

function send_to_search(param) {
       
        let value = document.querySelector("#"+param).value;
      
       
        var url = new URL(window.location["href"]);

        var search_params = url.searchParams;
    
      
        if(value=="all_lang") {
            
            search_params.delete(param);
           
        }
        else if(value=="all_city") {
            
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
       
        console.log(new_url);
        window.location.replace(new_url);
    
      
    }
      

</script>