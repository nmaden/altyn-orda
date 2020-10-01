
    <div class="about__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">            
						@lang('front_main.bread.home')
                         </a>
                    </li>
                    <li>
                        <span>                                
						@lang('front_main.calendar.title')
                       </span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
                    	@lang('front_main.calendar.title')

                </h1>
            </div>

            <div class="section__filter">
                <form class="row">
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="date" id="sort_date" class="slct-0 js--select js--select-0" onchange="send_to_search('sort_date')">
                                  <option selected disabled>                    	
								  @lang('front_main.filter.date')
                                  </option>
                                  @foreach($sort_calendars as $key=>$sort_calendar)
                                        @if(isset($_GET['sort_date'])) 
                                            @if($_GET['sort_date']==$key and $key==0)
                                                <option value="all_date" selected>{{$sort_calendar}}</option>
                                            @elseif($_GET['sort_date']==$key and $key!=0)
                                                <option value="{{$key}}" selected>{{$sort_calendar}}</option>
                                            @elseif($_GET['sort_date']==$key and $_GET['sort_date']=="all_date")
                                                <option value="all_date" >{{$sort_calendar}}</option>
                                            @else
                                                <option value="{{$key}}">{{$sort_calendar}}</option>
                                            @endif
                                        @else
                                            @if($key==0)
                                                <option value="all_date">{{$sort_calendar}}</option>
                                            @else
                                                <option value="{{$key}}">{{$sort_calendar}}</option>
                                            @endif
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
                                  <option selected disabled>						
								  @lang('front_main.filter.regions')
                                  </option>
                                  <option  value="all_city">						
								  @lang('front_main.filter.all_region')
                                  </option>
                                
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
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                        
                                <select name="category_id" id="category_id" class="slct-2 js--select js--select-2" onchange="send_to_search('category_id')">
                                  <option selected disabled>
								  @lang('front_main.filter.all_category')
                                  </option>
                                  <option value="all_category">								  
								  @lang('front_main.filter.category')
                                  </option>
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
                    </form>

                </div>
            </div>

            <div class="page__description--text">

                <div class="sights__block calendar__block">
                    <div class="row">
                   @foreach($items as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="calendar__item">
                                <div class="calendar__item--cat">
								@if(isset($item->relCity->name))
								{{$item->relCity->name}}
							    @endif
                                </div>
                                <div class="calendar__item--img">
								@if(isset($item->photo))
                                   <a href="{{route('calendars-item',$item)}}">
                                        <img src="{{URL::asset($item->photo)}}" alt="">
                                    </a>
									@endif
                                </div>
                                <div class="calendar__item--info">
                                    <div class="calendar__item--date">
									@if(isset($item->date))
									  {{$item->date}}
                                        
									@endif
                                    </div>
									@if(isset($item->name))
                                    <div class="calendar__item--title">
                                        <a href="{{route('calendars-item',$item)}}">
									
						{!! mb_substr($item->name,0,65) !!}
										
                                        </a>
                                    </div>
									@endif
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
    <input id="root_adress" type="hidden" value="{{$protocol.''.$_SERVER['HTTP_HOST']}}" name="root_adress"></input>

<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
<script>

function send_to_search(param) {

      
        let value = document.querySelector("#"+param).value;
      
       
        var url = new URL(window.location["href"]);

        var search_params = url.searchParams;
    
      
        if(value=="all_date") {
            
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