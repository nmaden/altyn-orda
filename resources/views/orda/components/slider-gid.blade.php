          <div class="gid__slider">
                <div class="row swiper-wrapper">
              @foreach($gid as $item)
                    <div class="col-lg-4 swiper-slide">
                        <div class="gid__item">
                            <div class="gid__item--top">

                                <div class="gid__item--img">
                                    <a href="{{route('gid-item',$item)}}">
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
                                        <a href="{{route('gid-item',$item)}}">
                                            @if(isset($item->imya))
									{{$item->imya}}
								    @endif
                                        </a>
                                    </div>
                                    <div class="gid__item--lang">
                               @if($item->getLangAr() >= 0)
							      @include('orda.components.item-lang',$item)
								@endif
										
                                    </div>
                                </div>

                            </div>
                            <div class="gid__item--body">
                                <div class="gid__item--price">
                                    Стоимость: от          @if(isset($item->price))
									{{$item->price}}
								     тг / 
																@include('orda.components.sposob-oplaty
					',$item)
@endif
									
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
