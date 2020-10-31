<div class="header__social" style="float:right;margin-bottom:10px;">
					
					@if(is_array($social))
                      @foreach($social as $v)

                        
						@if(isset($v[app()->getLocale()]))
							@if($v[app()->getLocale()]['name'] =='vhod')
								@php
							continue;
							    @endphp
							@endif
					   <div class="header__social--item tooltip__item" title="{{$v[app()->getLocale()]['hint']}}">
                            <a href="{{ $v[app()->getLocale()]['name'] }}">
								
                                <img src="{{ URL::asset($v[app()->getLocale()]['photo']) }}" alt="">
                            </a>
						</div>

						@endif
                      @endforeach
                     @endif
                    </div>
                    