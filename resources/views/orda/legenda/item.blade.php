
    <div class="route__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                       <a href="/">
						    @lang('front_main.bread.home')
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('legenda')}}">
						   @lang('front_main.legenda.title')
                        </a>
                    </li>
                    <li>
                        <span>
						@if($item->name)
						{{$item->name}}
						@endif
                        </span>
                    </li>
                </ul>
            </div>

            <div class="section__title--desc">
                <h1 class="section__title">
                   @if($item->name)
						{{$item->name}}
						@endif
                </h1>
            </div>

            <div class="calendar__list--list">
                <!-- Скрыто в верстке
                <div class="calendar__list--item">
                    <strong>Поделиться:</strong>
                    <div class="ya-share2" data-limit="3"></div>
                </div>
                -->
             
            </div>

            <div class="row">

                <div class="col-lg-9">

                    <div class="page__gallery page__img--main">

                        <div class="page__gallery--item">
                            <div class="page__gallery--img page__legenda--img">
                                <img src="{{URL::asset($item->photo)}}" alt="">
                            </div>
                        </div>
        
                    </div>
        
                    <div class="page__description--text">
                        <div class="about__text">
                            <!-- Опционально
                            <div class="legenda__text--title">
                                Есть в близ Зайсана гора Манырак. Заезжие люди дивятся: что за странное название? А дива тут нет никакого.
                            </div>
                            -->
                         @if($item->description)
						 {!! $item->description !!}
						 @endif
                        </div>
                    </div>

                </div>
				
				
                <div class="col-lg-3">
                    
                    <div class="legenda__right">
					@if(isset($item->photo_unserialize))
                     @foreach($item->photo_unserialize as $k=>$val)
                        <div class="sights__item legenda__item">
                            <div class="sights__item--img">
                                <a href="/about/legenda-item">
								 
                                    <img src="{{URL::asset($val)}}" alt="">
                                </a>
                            </div>
                            <div class="sights__item--info">
                                <div class="sights__item--title">
                                   
                                    @if($item->hint_unserialize[$k])
								    <a href="">
									{{$item->hint_unserialize[$k]}}
									 </a>
                                    @endif
                                   
                                </div>
                            </div>
                        </div>
                        @endforeach
					@endif
                        <!--
                        <div class="sights__item legenda__item">
                            <div class="sights__item--img">
                                <a href="/about/legenda-item">
                                    <img src="/img/karagandy-alash_1.jpg" alt="">
                                </a>
                            </div>
                            <div class="sights__item--info">
                                <div class="sights__item--title">
                                    <a href="/about/legenda-item">
                                        «Гора Манырак - Блеяние овцы»
                                    </a>
                                </div>
                            </div>
                        </div>
                        -->

                    </div>
                    
                </div>

            </div>

            

           


        </div>
        
        
    
      
    </div>
