


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
						@lang('front_main.figures.title')
                       </span>
                    </li>
                </ul>
            </div>

            <div class="section__title--block">
                <h1 class="section__title">
                    @lang('front_main.figures.title')

                </h1>
            </div>

            <div class="page__description--text">

                <div class="sights__block calendar__block">
                    <div class="row">
                  @if(isset($items[0]))
					  @foreach($items as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="sights__item">
                                <div class="sights__item--img">
								@if(isset($item->photo))
                                    <a href="{{route('figures-item',$item)}}">
                                        <img src="{{URL::asset($item->photo)}}" alt="">
									</a>
									@endif
                                </div>
                                <div class="sights__item--info">
                                    <div class="sights__item--title">
									@if(isset($item->namefigure))
									    <a href="#">
										{{$item->namefigure}}
                                        </a>
									@endif
									</div>
                                    <div class="sights__item--list">
                                        <div class="sights__list--item">
										@if(isset($item->birth))
                                            <div class="sights__list--text">
											{{$item->birth}}
                                            </div>
											@endif
                                        </div>
                                        <div class="sights__list--item">
                                            <div class="sights__list--text">
												@if(isset($item->status))
													{{$item->status}}
												@endif
                                            </div>
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

