


    <div class="about__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/">Генеалогические дерево</a>
                    </li>
                    <li>
                        <span>
						@if(isset($item->namefigure))
							
						@endif
						</span>
                    </li>
                </ul>
            </div>

            <div class="page__description--text">

                <div class="sights__block figures__block">
                    <div class="row">

                        <div class="col-lg-4">
						@if(isset($item->photo))
                            <div class="figures__page--img">
                                <img src="{{URL::asset($item->photo)}}" alt="">
                            </div>
						@endif
                        </div>
                        <div class="col-lg-8">
                            <div class="figures__page--desc">

                                <div class="figures__page--top">
								@if(isset($item->namefigure))
                                    <h1 class="section__title figures__block--title">
                                       	{{$item->namefigure}}
                                    </h1>
								  @endif
									@if(isset($item->birth))
                                    <div class="figures__block--data">
									{{$item->birth}}
                                    </div>
									@endif
									@if(isset($item->subtitle))
                                    <div class="figures__block--who">
									  {{$item->subtitle}}
                                         
                                    </div>
								     @endif
                                    <div class="figures__block--burial">
									@if(isset($item->subtitle))
									{{$item->introtext}}
									@endif
                                    </div>
                                </div>
								@if(isset($item->descriptionfigure))
                                <div class="figures__page--text">
							      {!! $item->descriptionfigure !!}
                                   
                                </div>
								@endif
                            </div>
                        </div>
          
                    </div>

                </div>




            </div>

        </div>
    </div>

