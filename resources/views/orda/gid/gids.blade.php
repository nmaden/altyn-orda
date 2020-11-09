

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
						@lang('front_main.gid.title')
                       </span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
                    @lang('front_main.gid.title')

                </h1>
            </div>

            <div class="section__filter">
                <form class="row">

                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="city_id" id="city_id" class="slct-0 js--select js--select-0" onchange="send_to_search('city_id')">
                                  <option selected disabled>
								  	@lang('front_main.filter.regions')

								  </option>
                                
                                  <option  value="all_city">
								  		@lang('front_main.filter.all_region')


								  </option>
                                  @foreach($cities as $key=>$city)
                                  
                                  @if(isset($_GET['city_id']))
                                    @if($_GET["city_id"]==$city->id)
                                        <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                    @else
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endif
                                  @else
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                  @endif
                                  
                                  @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">

                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="lang_id" id="lang_id" class="slct-1 js--select js--select-1" onchange="send_to_search('lang_id')">
                                
                                  <option selected disabled>
								  		@lang('front_main.filter.lang')

								  </option>
                                 
                                    <option  value="all_lang">								  		
									@lang('front_main.filter.all_lang')
                                   </option>
                                  

                                    
                                    @foreach($languages as $key=>$lang)
                                        @if(isset($_GET['lang_id']))
                                            @if($_GET['lang_id']==$lang->id)
                                                <option value="{{$lang->id}}" selected>{{$lang->name}}</option>
                                            @else
                                                <option value="{{$lang->id}}">{{$lang->name}}</option>
                                            @endif
                                        @else
                                            <option value="{{$lang->id}}">{{$lang->name}}</option>
                                        @endif
                                    
                                    @endforeach
                                  
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="category_id" id="category_id"  class="slct-2 js--select js--select-2" onchange="send_to_search('category_id')">
                               
                                  <option selected disabled>								  		
								  @lang('front_main.filter.prof')
                                  </option>
                                  <option value="all_category">
								  @lang('front_main.filter.prof_all')

								  </option>
                                  @foreach($categories as $key=>$category)
                                  
                                    @if(isset($_GET['category_id']))
                                        @if($_GET["category_id"]==$key)
                                            <option value="{{$key}}" selected>{{$category->name}}</option>
                                        @else
                                            <option value="{{$key}}">{{$category->name}}</option>
                                        @endif
                                    @else
                                        <option value="{{$key}}">{{$category->name}}</option>
                                    @endif


                                  @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        
                        <div class="filter__main--slider">
                            <div class="filter__slider">
                                <div class="filter">
                                  <p id='range'></p>
                                    <div id="slider" class="range-widget__slider"></div>
                                    <input type="hidden" id="search_min" value="2000">
                                    <input type="hidden"  id="search_max" value="9000">
    
                                  {{-- <div data-current-min-value="2000" data-current-max-value="9000" data-min-value="1000" data-max-value="10000" class="range-widget js-range">
                                 --}}
                                        {{--
                                    <div class="slider range-widget__slider"></div>
                                    <input type="hidden" value="1000" name="arrFilter_P1_MIN" class="range-widget-min range-widget__input">
                                    <input type="hidden" value="10000" name="arrFilter_P1_MAX" class="range-widget-max range-widget__input">
                                    
                                 
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                     

                    </div>

                </form>
            </div>

            <div class="page__description--text">

                <div class="sights__block gid__block">
                    <div class="row">
				    @include('orda.gid.components.slider-foreach',['page'=>'page_gids'])
                    </div>

                </div>
				{!! $gid->appends($request->all())->links('paginate') !!}

            


            </div>

        </div>
    </div>

    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

    
<style>
    .filter__slider--main {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        
    }
    .filter__slider {
        width: 90%;
        position: absolute;
        top:0;
    }
    #range {
    color: #737373;
    font-size: 18px;
       position: absolute;
       top:-30px;
       left: 80px;
    }

    .cur__price {
        border: 2px;
        width: 10px;
        height: 20px;
    }

    .ui-widget.ui-widget-content {
        z-index: 0 !important;
    }
    .ui-slider-handle {
        background-color: blue !important;

        width: 21px !important;
        height: 32px !important;
        top: -13px !important;

        border-radius: 20px !important;
        background-color: #B77F0B !important;
    }
    .ui-slider-range {
        background-color: #0a8232 !important;
    }
    .range-widget__slider {
        height: 7px !important;
        background-color: #d8d8d8 !important;
    }
    #search_min {
        display: none;
    }
    #search_max {
        display: none;
    }
</style>
<script>


      

</script>