
    <div class="about__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <span>Календарь мероприятий</span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
                    Календарь мероприятий
                </h1>
            </div>

            <div class="section__filter">
                <form class="row" action="/calendars" method="get">
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="sort_date" id="slct" onchange="this.form.submit();">
                                  <option selected disabled >По дате</option>
                                  @foreach($sort_calendars as $key=>$sort_calendar) 
                                    <option  value="{{$key}}">{{$sort_calendar}}</option>
                                
                                  @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="city_id" id="slct" type="submit" onchange="this.form.submit();">
                                  <option selected disabled>По региону</option>
                                  @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{ $city->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="category_id" id="slct" onchange="this.form.submit();">
                                  <option selected disabled>По категории</option>
                                  @foreach($categories as $category)
                                  <option value="{{  $category->id}}">{{ $category->name }}</option>
                                  @endforeach 
                                </select>
                            </div>
                        </div>
                    </div>

                </form>
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
                                   <a href="{{route('calendar-item',$item)}}">
                                        <img src="{{URL::asset($item->photo)}}" alt="">
                                    </a>
									@endif
                                </div>
                                <div class="calendar__item--info">
                                    <div class="calendar__item--date">
									@if(isset($item->text))
									  {{$item->date}}
                                        
									@endif
                                    </div>
									@if(isset($item->headers_title))
                                    <div class="calendar__item--title">
                                        <a href="{{route('calendar-item',$item)}}">
									
						                 {!! mb_substr($item->headers_title,0,65) !!}
										
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

    

