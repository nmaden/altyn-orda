

<div class="register__page">

    <div class="register__page--header">
        <div class="container">
            <div class="register__header--row">
                <div class="register__header--logo">
                    <a href="/">
                        <img src="/img/logo-footer.svg" alt="">
                    </a>
                </div>

                <div class="header__lang register__header--lang">
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

            </div>
        </div>
    </div>

    <div class="register__page--body">
        <div class="container">

            <div class="register__body--absol">
                <h1 class="register__body--title">
                    Вход
                </h1>
                <div class="register__body--form">
                    <form class="form-horizontal" method="POST" action="{{ route('check_login') }}">
                        {{ csrf_field() }}

                        <div class="register__form--item">
                            <div class="form__item--input {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" placeholder="E-mail" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--input {{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" placeholder="Пароль (мин 6 символов)" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--passtext">
                                <a href="#" class="passtext">
                                    Забыли пароль?
                                </a>
                            </div>
                            <div class="form__item--submit">
                                <button type="submit" class="form__submit">
                                    Войти
                                </button>
                                <div class="form__item--submit-linck">
                                    <a href="{{route('registration')}}" class="form__item--linck">
                                        Регистрация
                                    </a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            

        </div>
    </div>

</div>



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Авторизация</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('check_login') }}">
                        {{ csrf_field() }}
                        
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
								
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                      <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    авторизация
                                </button>
								
						<p><a href ="{{route('registration')}}">регистрация</a></p>
							
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


