<!-- -->
    <div class="about__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <span>Достопримечательности</span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
                    Достопримечательности
                </h1>
            </div>

            <div class="page__description--text">

                <div class="sights__block">
                    <div class="row">
					@if(count($items) > 0)
                    @foreach($items as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="sights__item">
                                <div class="sights__item--img">
                                    
							@if(isset($item->photo))
								<a href="{{route('sight-item',$item)}}">
                                    <img src="{{URL::asset($item->photo)}}" alt="">
									</a>
								@endif
                                       
                                    
                                </div>
                                <div class="sights__item--info">
                                    <div class="sights__item--title">
									@if(isset($item->name))
                                        <a href="{{route('sight-item',$item)}}">
										{{$item->name}}
                                        </a>
										@endif
                                    </div>
                                    <div class="sights__item--list">

                                        <div class="sights__list--item">
                                            <div class="sights__list--img">
                                                <img src="/img/map-list-icon.svg" alt="">
                                            </div>
                                            <div class="sights__list--text">
                                             @if(isset($item->relCity->name))
												{{$item->relCity->name}}
												@endif
                                            </div>
                                        </div>
                                        <div class="sights__list--item">
										 @if(isset($item->props_1))
                                            <div class="sights__list--img">
										        <a href="{{route('sight-item',$item)}}#d3tours">
                                                    <img src="/img/3d-list-icon.svg" alt="">
												</a>
                                            </div>
                                            <div class="sights__list--text">
                                                
												{{$item->props_1}}
												
                                            </div>
											@endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
				@endif

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

