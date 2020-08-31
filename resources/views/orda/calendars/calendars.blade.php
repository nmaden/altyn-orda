
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
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="slct" id="slct">
                                  <option selected disabled>По дате</option>
                                  <option value="1">Категория 1</option>
                                  <option value="2">Категория 2</option>
                                  <option value="3">Категория 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="slct" id="slct">
                                  <option selected disabled>По региону</option>
                                  <option value="1">Регион 1</option>
                                  <option value="2">Регион 2</option>
                                  <option value="3">Регион 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="slct" id="slct">
                                  <option selected disabled>По категории</option>
                                  <option value="1">Регион 1</option>
                                  <option value="2">Регион 2</option>
                                  <option value="3">Регион 3</option>
                                </select>
                            </div>
                        </div>
                    </div>

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

