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
								<a href="{{route('gids-item',$item)}}">
                                    <div class="gid__item--toptext">
									@if(isset($item->name))
									{{$item->name}}
								    @endif
                                    </div>
									</a>
                                    <div class="gid__item--title">
                                        <a href="{{route('gids-item',$item)}}">
                                            @if(isset($item->imya))
									{{$item->imya}}
								    @endif
                                        </a>
                                    </div>
                                    <div class="gid__item--lang">
                               @if($item->getArLangId >= 0)
							      @include('orda.gid.components.item-lang',$item)
								@endif
										
                                    </div>
                                </div>

                            </div>
                            <div class="gid__item--body">
							<a href="{{route('gids-item',$item)}}">
                                <div class="gid__item--price">
            @if(isset($item->price))
			@lang('front_main.price') {{$item->price}}
				@if($item->currency)
					{{$item->currency}}
				@else
					тнг		 
				@endif
				
			@include('orda.gid.components.sposob-oplaty',$item)
             @endif
			 
									
                                </div>
								</a>
                            </div>
                            <div class="gid__item--bottom">
                                <div class="gid__bottom--item">
                                    <div class="gid__bottom--img">
                                        <img src="/img/map-icon.svg" alt="">
                                    </div>
									@if(isset($item->relCity->name))
										<a href="{{route('gids-item',$item)}}">
                                    <div class="gid__bottom--text">
                                        
									{{$item->relCity->name}}
								   
                                    </div>
									</a>
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
