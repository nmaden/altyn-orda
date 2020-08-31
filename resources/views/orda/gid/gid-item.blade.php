
    <div class="route__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/">Гиды и туроператоры</a>
                    </li>
                    <li>
                        <span>
						@if(isset($item->name))
						{{$item->name}}
					     @endif
					</span>
                    </li>
                </ul>
            </div>

            <div class="section__title--block gid__title--block">
                <h1 class="section__title">
                    @if(isset($item->imya))
						{{$item->imya}}
					     @endif
                </h1>

                <div class="gid__title--list">
                    <div class="gid__bottom--item">
                        <div class="gid__bottom--img">
                            <img src="/img/icon-mail.svg" alt="">
                        </div>
                        <div class="gid__bottom--text">
						@if(isset($item->email))
							 <a href="mailto:{{$item->email}}">{{$item->email}}</a>
						
					     @endif
                           
                        </div>
                    </div>
                    <div class="gid__bottom--item">
                        <div class="gid__bottom--img">
                            <img src="/img/phone-icon.svg" alt="">
                        </div>
						@if(isset($item->imya))
							<div class="gid__bottom--text">
                            <a href="tel:{{$item->phone}}">
							{{$item->phone}}
							</a>
                        </div>
						
						
					     @endif
                        
                    </div>
                </div>
                
            </div>


            <div class="page__description--text">
                <div class="sights__block gid__block">
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="gid__page--item">
							       @if(isset($item->photo))
                                    <img src="{{URL::asset($item->photo)}}" alt="">
								@endif
                            </div>
                        </div>
						
                        <div class="col-lg-9">
                            
                            <div class="gid__about--title">
                                О гиде
                            </div>

                            <div class="gid__about--list">

                                <div class="gid__about--item ">
                                    <strong>Возраст гида:</strong> 
									 @if(isset($item->vosrast))
						{{$item->vosrast}}
					@else 
						не указано
					     @endif
                                </div>
                                <div class="gid__about--item">
                                    <strong>Опыт работы (годы):</strong> 
									 @if(isset($item->opyt))
						{{$item->opyt}}
					@else не указано
					     @endif
                                </div> 
                           
                            </div>
                     @if(isset($item->description))
                            <div class="gid__about--desc">
                                <p>
                                    
						{{$item->description}}
					    
                                </p>
                            </div>
							 @endif

                            <div class="gid__about-lang--block">
                                <div class="gid__aboutlang--title">
                                    Языки:
                                </div>
                                <div class="gid__aboutlang--desc">
				
					@if($item->getLangAr() >= 0)
					@include('orda.components.item-lang',$item)
                    @endif
								
                                </div>
                            </div>

                            <div class="gid__about-price--block">
                                <div class="gid__aboutprice--title">
                                    Стоимость:
                                </div>
                                <div class="gid__aboutprice--desc">
                                     
						@if(isset($item->price))
						от 
						{{$item->price}}
						тг / 
					@include('orda.components.sposob-oplaty
					',$item)

					     @endif 
                                </div>
                            </div>

                            
                        </div>

                    </div>
                </div>
            </div>


        </div>
        
        
        
    </div>
