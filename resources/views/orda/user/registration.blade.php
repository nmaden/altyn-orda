
@if(session('error'))
    <div class="alert alert-danger" style='text-align:center'>
        {{session('error') }}
    </div>
@endif

<div class="register__page--body">
    <div class="container">

        <div class="register__body--absol">
            <h1 class="register__body--title">
                Регистрация
            </h1>

            <div class="register__body--tab">
                <div class="register__tab--item register__tab--active" data-tab="tab-1">
                    Гиды
                </div>
                <div class="register__tab--item"  data-tab="tab-2">
                    Туроператор
                </div>
            </div>
            <div class="register__body--form register__content--tab-1 register__content--active">
                <form class="form-horizontal" method="POST" action="{{ route('registration_save') }}">
                    {{ csrf_field() }}
                    <div class="register__form--item-block">

                        
                        <div class="register__form--item">
                            <div class="form__item--input">
                                <input id="famaly" type="text" 
								placeholder="Фамилия" 
								name="family"
								class="form-control">
                            </div>
							@if ($errors->has('family'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('family') }}</strong>
                                    </span>
                                @endif
								
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--input">
                                <input id="name" 
								type="text" 
								name="name"
								placeholder="Имя" 
								class="form-control">
                            </div>
							@if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
								
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--input">
                                <input id="phone" 
								type="text" 
								name="phone"
								placeholder="Номер телефона" 
								class="form-control">
                            </div>
							@if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
								
                        </div>



                        <div class="register__form--item">
                            <div class="form__item--input {{ $errors->has('login') ? ' has-error' : '' }}">
                                <input id="login" type="text" placeholder="Login"  class="form-control" name="login" value="{{ old('login') }}" required>
                                @if ($errors->has('login'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
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
                                <p class="password-textinfo">
                                    Пароль должен содержать хотя бы одну цифру и заглавную букву
                                </p>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
								
                            </div>
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--input">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Повторите пароль" name="password_confirmation" required>
                            </div>
                        </div>


                    </div>
                    
                    <label class="register__form--check">
                        <div class="register__ckeck">
                            <input type="checkbox" 
                            name="confirm"							
							required
							>
                            <span class="register__ckeck--span"></span>
                        </div>
                        <div class="register__ckeck--title">
                            Я ознакомился и согласен с условиями пользовательского соглашения и соглашения об использовании и обработки персональных данных
                        </div>
						@if ($errors->has('confirm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confirm') }}</strong>
                                    </span>
                                @endif
								
                    </label>

                    <div class="register__form--submit">
                        <div class="form__item--submit">
                            <button type="submit" class="form__submit">
                                Зарегистрироваться
                            </button>
                            <div class="form__item--submit-linck">
                                <a href="{{route('login')}}" class="form__item--linck">
                                    Вход
                                </a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="register__body--form register__content--tab-2">
                <form class="form-horizontal" method="POST" action="{{ route('registration_save') }}">
                    {{ csrf_field() }}
                    <div class="register__form--item-block">

                        
                        <div class="register__form--item">
                            <div class="form__item--input">
                                <input id="famaly" 
								name='family'
								type="text" placeholder="Название туроператора" class="form-control">
                            </div>
							@if ($errors->has('family'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('family') }}</strong>
                                    </span>
                                @endif
								
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--input">
                                <input id="phone" 
								type="text" 
								name="phone"
								placeholder="Номер телефона" 
								class="form-control">
                            </div>
							@if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
								
                        </div>


                        
                        <div class="register__form--item">
                            <div class="form__item--input {{ $errors->has('login') ? ' has-error' : '' }}">
                                <input id="login" type="text" placeholder="Login"  class="form-control" name="login" value="{{ old('login') }}" required>
                                @if ($errors->has('login'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
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
                                <p class="password-textinfo">
                                    Пароль должен содержать хотя бы одну цифру и заглавную букву
                                </p>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--input">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Повторите пароль" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>

                    <label class="register__form--check">
                        <div class="register__ckeck">
                            <input type="checkbox" 
							name='confirm'
							required>
                            <span class="register__ckeck--span"></span>
                        </div>
                        <div class="register__ckeck--title">
                            Я ознакомился и согласен с условиями пользовательского соглашения и соглашения об использовании и обработки персональных данных
                        </div>
						@if ($errors->has('confirm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confirm') }}</strong>
                                    </span>
                                @endif
								
                    </label>
                    
                    <div class="register__form--submit">
                        <div class="form__item--submit">
                            <button type="submit" class="form__submit">
                                Зарегистрироваться
                            </button>
                            <div class="form__item--submit-linck">
                                <a href="{{route('login')}}" class="form__item--linck">
                                    Вход
                                </a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        

    </div>
</div>
