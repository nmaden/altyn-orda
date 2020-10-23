


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
                                value="{{old('family') ? old('family') : ''}}"								
								placeholder="Фамилия" 
								name="family"
								class="form-control">
                            </div>
							@if ($errors->has('family'))
                                    <span style='color:red;font-size:12px;font-style:italic'>
                                        <strong>{{ $errors->first('family') }}</strong>
                                    </span>
                                @endif
								
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--input">
                                <input id="name" 
								type="text" 
								name="name"
								value="{{old('name') ? old('name') : ''}}"								
                                placeholder="Имя" 
								class="form-control">
                            </div>
							@if ($errors->has('name'))
                                    <span style='color:red;font-size:12px;font-style:italic'>
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
								value="{{old('phone') ? old('phone') : ''}}"
								class="form-control">
                            </div>
							@if ($errors->has('phone'))
                                    <span style='color:red;font-size:12px;font-style:italic'>
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
								
                        </div>



                        <div class="register__form--item">
                            <div class="form__item--input {{ $errors->has('login') ? ' has-error' : '' }}">
                                <input id="login" 
								type="text" placeholder="Login"  
								class="form-control" 
								name="login" 
								value="{{old('login') ? old('login') : ''}}">
                                @if ($errors->has('login'))
                                    <span style='color:red;font-size:12px;font-style:italic'>
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--input {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" placeholder="E-mail" class="form-control" name="email"
								value="{{old('email') ? old('email') : ''}}">
                                @if ($errors->has('email'))
                                    <span style='color:red;font-size:12px;font-style:italic'>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--input {{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" placeholder="Пароль (мин 6 символов)" class="form-control" name="password">
                                <p class="password-textinfo">
									@if ($errors->has('password'))
                                    <span style='color:red;font-size:12px;font-style:italic;display:block'>
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
									
                                @endif
								
                                </p>
                                
                            </div>
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--input">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Повторите пароль" name="password_confirmation">
                            </div>
                        </div>


                    </div>
                    
                    <label class="register__form--check">
                        <div class="register__ckeck">
                            <input type="checkbox" 
                            name="confirm"							
							
							>
                            <span class="register__ckeck--span"></span>
                        </div>
                        <div class="register__ckeck--title">
                            Я ознакомился и согласен с условиями пользовательского соглашения и соглашения об использовании и обработки персональных данных
                        </div>
						
                    </label>
                             @if ($errors->has('confirm'))
                                    <span style='color:red;font-size:12px;font-style:italic'>
                                        <strong>{{ $errors->first('confirm') }}</strong>
                                    </span>
                                @endif
								
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
								name='name'
								type="text" placeholder="Название туроператора" 
								class="form-control"
								value="{{old('name') ? old('name') : ''}}">
                            </div>
							@if ($errors->has('name'))
                                    <span style='color:red;font-size:12px;font-style:italic'>
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
								class="form-control"
								value="{{old('phone') ? old('phone') : ''}}"
								>
                            </div>
							@if ($errors->has('phone'))
                                    <span style='color:red;font-size:12px;font-style:italic'>
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
								
                        </div>


                        
                        <div class="register__form--item">
                            <div class="form__item--input {{ $errors->has('login') ? ' has-error' : '' }}">
                                <input id="login" 
								type="text" placeholder="Login"  
								class="form-control" name="login" 
								value="{{old('login') ? old('login') : ''}}">
                                @if ($errors->has('login'))
                                    <span style='color:red;font-size:12px;font-style:italic'>
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--input {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" placeholder="E-mail" 
								class="form-control" name="email" 
								value="{{old('email') ? old('email') : ''}}">
                                @if($errors->has('email'))
                                    <span style='color:red;font-size:12px;font-style:italic'>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--input {{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" placeholder="Пароль (мин 6 символов)" class="form-control" name="password">
                                <p class="password-textinfo">
                                   <span style='color:red;font-size:12px;font-style:italic;display:block'>
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
									
                                </p>
                                
                            </div>
                        </div>
                        <div class="register__form--item">
                            <div class="form__item--input">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Повторите пароль" name="password_confirmation" >
                            </div>
                        </div>
                    </div>

                    <label class="register__form--check">
                        <div class="register__ckeck">
                            <input type="checkbox" 
							name='confirm'
							>
                            <span class="register__ckeck--span"></span>
                        </div>
                        <div class="register__ckeck--title">
                            Я ознакомился и согласен с условиями пользовательского соглашения и соглашения об использовании и обработки персональных данных
                        </div>
						
                    </label>
                    @if ($errors->has('confirm'))
                        <span class="" style='color:red;font-size:12px;font-style:italic'>
                            <strong>{{ $errors->first('confirm') }}</strong>
                         </span>
                      @endif
				  <input type='hidden' name='tyr_operator' value="tyr_operator">
	
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
