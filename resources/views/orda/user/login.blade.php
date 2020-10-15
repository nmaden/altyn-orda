
    

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

