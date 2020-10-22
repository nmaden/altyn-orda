
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
						@lang('front_main.sights.title')
                      </span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
					@lang('front_main.sights.title')

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
								<a href="{{route('sights-item',$item)}}">
                                    <img src="{{URL::asset($item->photo)}}" alt="">
									</a>
								@endif
                                       
                                    
                                </div>
                                <div class="sights__item--info">
                                    <div class="sights__item--title">
									@if(isset($item->name))
                                        <a href="{{route('sights-item',$item)}}">
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
										 @if(isset($item->introtext))
                                            <div class="sights__list--img">
										        <a href="{{route('sights-item',$item)}}#d3tours">
                                                    <img src="/img/3d-list-icon.svg" alt="">
												</a>
                                            </div>
                                            <div class="sights__list--text">
                                         
							{!! mb_substr($item->introtext,0,80) !!}
												
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

<!---------------------гиды и туроператоры------------------------->
@if(isset($gid))
    <div class="section__gid">
        <div class="container">
           @include('orda.gid.components.slider',$gid)
     </div>
    </div>
@endif

