<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/css/style.css?v=3.5.3">
    <link rel="stylesheet" href="/css/media.css?v=3.5.3">
    
    <link rel="stylesheet" href="/css/login-style.css?v=3.5.3">
    <link rel="stylesheet" href="/css/login-media.css?v=3.5.3">

</head>
<body>
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

        @yield('content')

    </div>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/bootstrap.js') }}"></script>-->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
