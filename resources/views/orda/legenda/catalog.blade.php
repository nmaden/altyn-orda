


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
                    История в легендах
                </h1>
            </div>

            <div class="page__description--text">

                <div class="sights__block calendar__block">
                    <div class="row">
                        
                    </div>

                </div>


                {!! $items->appends($request->all())->links('paginate') !!}



            </div>

        </div>
    </div>

