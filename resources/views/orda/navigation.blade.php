
	    <header>
        <div class="container">
            <div class="header__row">

                <div class="header__logo">
                    <a href="/{{app()->getLocale()}}">
                        <img src="/img/logo.svg" alt="">
                    </a>
                </div>
                <div class="header__right">
                    <div class="header__menu">
                @include('orda'.'.navigatitem',['items'=>$menu->roots()])

                       

                    </div>
                    <div class="header__lang">
                          <ul class="lang__menu">
                            <li><a class='current' href="#">
							{{ $q_lang->get() ? $q_lang->get() : 'ru'}}
							</a>
                                <ul class="lang__menu--children">
                                @foreach ($q_lang->getAr() as $k => $v)
                                  <li><a id="{{$k}}" href="/{{$k}}/change_lang">{{$v}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="header__burger">
                        <div class="burger__menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
	
		
	

