
    <header>
        <div class="container">
            <div class="header__row">
                <div class="header__logo">
                    <a href="/{{app()->getLocale()}}">
                        <img src="/img/logo.svg" alt="">
                    </a>
                </div>
                <div class="header__right">
                    
                    <div class="header__serch">
                        <form role="search" method="get" id="searchform" class="searchform" action="" style="right: -10px; width: 0px;">
                            <input type="text" value="" placeholder="Поиск" name="s" id="s">
                            <button type="submit">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#0e4f32"></path>
                                    <path d="M21 21L16.65 16.65" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#0e4f32"></path>
                                </svg>
                            </button>
                        </form>
                        <a class="header__serch--click">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M21 21L16.65 16.65" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div>

                    <!-- 1-->
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
                    <div class="header__social">
                        <a href="">
                            <img src="/img/icon-youtube.svg" alt="">
                        </a>
                        <a href="">
                            <img src="/img/icon-facebook-f.svg" alt="">
                        </a>
                        <a href="">
                            <img src="/img/icon-instagram-f.svg" alt="">
                        </a>
                    </div>

                    <div class="header__menu">
                        <div class="header__menu--burger header__menu--click">
                            <div class="burger--left">
                                Меню
                            </div>
                            <div class="burger--right">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <div class="header__menu--container">
        <div class="container">
            <div class="header__menu--row">
                <div class="header__menu--li">
                    @include('orda'.'.navigatitem',['items'=>$menu->roots()])
                </div>
                <div class="header__menu--close header__menu--click">
                    <div class="burger--right">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>