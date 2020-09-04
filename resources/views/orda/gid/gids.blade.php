
<!-- -->
    <div class="about__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <span>Гиды и туроператоры</span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
                    Гиды и туроператоры
                </h1>
            </div>

            <div class="section__filter">
                <div class="row">

                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="slct0" id="slct0" class="slct-0 js--select js--select-0">
                                  <option selected disabled>Регионы</option>
                                  <option value="1">Категория 1</option>
                                  <option value="2">Категория 2</option>
                                  <option value="3">Категория 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="slct1" id="slct1" class="slct-1 js--select js--select-1">
                                  <option selected disabled>Языки</option>
                                  <option value="1">Регион 1</option>
                                  <option value="2">Регион 2</option>
                                  <option value="3">Регион 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="slct2" id="slct2" class="slct-2 js--select js--select-2">
                                  <option selected disabled>Специализация</option>
                                  <option value="1">Регион 1</option>
                                  <option value="2">Регион 2</option>
                                  <option value="3">Регион 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">

                        <div class="filter__slider">
                            <div class="filter">
                                <div data-current-min-value="2000" data-current-max-value="9000" data-min-value="1000" data-max-value="10000" class="range-widget js-range">
                                <div class="range-widget__slider"></div>
                                <input type="hidden" value="1000" name="arrFilter_P1_MIN" class="range-widget-min range-widget__input">
                                <input type="hidden" value="10000" name="arrFilter_P1_MAX" class="range-widget-max range-widget__input">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="page__description--text">

                <div class="sights__block gid__block">
                    <div class="row">
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
									{{URL::asset($item->photo)}}
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
							@include('orda.gid.components.item-lang',$item)
								@endif
								
                                    </div>
                                </div>

                            </div>
                            <div class="gid__item--body">
                                <div class="gid__item--price">
                                    Стоимость: от          @if(isset($item->price))
									{{$item->price}}
								    @endif тг / 
				          @include('orda.components.sposob-oplaty',$item)

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
				{!! $gid->appends($request->all())->links('paginate') !!}

            


            </div>

        </div>
    </div>
