
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

            <div class="section__filter">

				<form action="" method='get' style='width:100%'>

                <div class="row">
				
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="city_id" id="city_id" class="slct-0 js--select js--select-0" 
								  onchange="filter()"
								>
								<option value="all_city">
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
                </div>

				</form>
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
										<a href="{{route('sights-item',$item)}}">
                                            <div class="sights__list--img">
                                                <img src="/img/map-list-icon.svg" alt="">
                                            </div>
											</a>
											 @if(isset($item->relCity->name))
											<a href="{{route('sights-item',$item)}}">
                                            <div class="sights__list--text">
                                            
												{{$item->relCity->name}}
												
                                            </div>
											</a>
											@endif
                                        </div>
                                        <div class="sights__list--item">
										 @if(isset($item->introtext))
                                            <div class="sights__list--img">
										        <a href="{{$item->href_tyr}}">
                                                    <img src="/img/3d-list-icon.svg" alt="">
												</a>
                                            </div>
							<a href="{{route('sights-item',$item)}}">			
                             <div class="sights__list--text">
                                         
							{!! mb_substr($item->introtext,0,80) !!}
												
                                            </div>
							</a>
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
<script>
function filter() {
var lang = "{{$lang}}";
	
console.log(lang);
 $('form').attr('action','/'+lang+'/sights');

  $('form').submit();
  
  }
      

</script>


