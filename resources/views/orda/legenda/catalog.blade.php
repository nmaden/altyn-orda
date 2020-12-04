


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
							@lang('front_main.legenda.title')

						    
                       </span>
                    </li>
                </ul>
            </div>

            <div class="section__title--block">
                <h1 class="section__title">
                    @lang('front_main.legenda.title')
                </h1>
            </div>

            <div class="page__description--text">

                <div class="sights__block calendar__block legenda__block">
                    <div class="row">
                     @foreach($items as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="sights__item legenda__item">
                                <div class="sights__item--img">
                                    <a href="{{route('legenda-item',$item)}}">
                                        <img src="{{URL::asset($item->photo_catalog)}}" alt="">
									</a>
                                </div>
                                <div class="sights__item--info">
                                    <div class="sights__item--title">
									    <a href="{{route('legenda-item',$item)}}">
										{{$item->name}}
                                        </a>
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

