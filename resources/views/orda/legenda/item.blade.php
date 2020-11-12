
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
                        <a href="/">
						    @lang('front_main.calendar.title')
                        </a>
                    </li>
                    <li>
                        @if(isset($calendar->name))
                            <span>
                                {{$calendar->name}}
                            </span>
                        @endif
                    </li>
                </ul>
            </div>

            <div class="section__title--desc">
                <h1 class="section__title">
                    «Гора Манырак - Блеяние овцы»
                </h1>
            </div>

            <div class="calendar__list--list">

                <div class="calendar__list--item">
                    <strong>Поделиться:</strong>
                    <div class="ya-share2" data-limit="3"></div>
                </div>
             
            </div>


            <div class="page__gallery page__img--main">

                <div class="page__gallery--item">
                    <div class="page__gallery--img">
					
                        @if(isset($calendar->photo))
                            <img src="{{URL::asset($calendar->photo)}}" alt="">
                        @endif
					
                    </div>
                </div>

            </div>

            <div class="page__description--text">
                <div class="about__text">
                    <p>
                        @if(isset($calendar->text))
                            {!! $calendar->text !!}
                        @endif
                    </p>
                </div>
            </div>

           


        </div>
        
        
    
      
    </div>
