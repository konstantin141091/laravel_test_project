<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bf05fd6411.js"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Учебный проект на Laravel</title>
</head>

<body>
<header class="header">
    <div class="header__main">
        <div class="header__top">
            <div class="container header__top__container">
                <div class="col-xl-12">
                    <div class="row flex justify-content-space-between">
                        <div class="header__top__left">
                            <ul class="flex align-items-center margin-0 padding-0 ul">
                                <li>34ºc, Солнечно</li>
                                <li>Четверг, 18th Июня, 2019</li>
                            </ul>
                        </div>
                        <div class="header__top__rigth">
                            <ul class="ul flex margin-0 padding-0">
                                <li><a href="#" class="header__top__rigth__link"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" class="header__top__rigth__link"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="header__top__rigth__link"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__mid">
            <div class="container">
                <div class="row flex align-items-center justify-content-space-between">
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="logo">
                            <a href="{{ route('index') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 padding-r-0">
                        <div class="header__banner float-right">
                            <a href="#"><img src="{{ asset('assets/img/header_card.jpg') }}" alt="banner" class="width-100-percent"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__bottom" id="header-fixed">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-9 col-md-9">
                        <nav class="header__menu">
                            <ul class="ul flex padding-0">
                                <li><a href="{{ route('index') }}" class="{{ request()->routeIs('index') ? 'active' : '' }}">Главная</a></li>
                                <li><a href="{{ route('news.index') }}" class="
                                    {{ request()->routeIs('news.index') ? 'active' : '' }}
                                    {{ request()->routeIs('news.show') ? 'active' : '' }}">Новости</a></li>
                                <li><a href="{{ route('category.index') }}" class="
                                    {{ request()->routeIs('category.index') ? 'active' : '' }}
                                    {{ request()->routeIs('category.show') ? 'active' : '' }}">Категории</a></li>
                               @if(!is_null(Auth::user()))
                                    @if(Auth::user()->is_admin)
                                        <li><a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">Админка</a></li>
                                    @endif
                                @endif

                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-3">
                        <div class="header__menu float-right">
                            <ul class="ul flex">

                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right dropdown__position" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item header__drop" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Выйти
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="content">
        <div class="container">
            <div class="content__main">
                <div class="row margin-top-30">
                    <div class="col-lg-8">
                        @yield('content')
                    </div>
                    <div class="col-lg-4">
                        @include('include.advertising')
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<footer class="footer">
    <div class="footer__top">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                    <div class="footer__top__left">
                        <div class="footer__logo">
                            <a href="{{ route('index') }}"><img src="{{ asset('assets/img/logo2_footer.png') }}" alt="logo"></a>
                        </div>
                        <div class="footer__title">
                            <p class="margin-bottom-50"> Suscipit mauris pede for con sectetuer sodales adipisci for cursus fames lectus tempor da blandit gravida sodales Suscipit mauris pede for con sectetuer sodales adipisci for cursus fames lectus tempor da blandit gravida sodales Suscipit mauris pede for sectetuer. </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="footer__top__mid">
                        <h4>Newsletter</h4>
                        <p class="margin-bottom-15">Heaven fruitful doesn't over les idays appear creeping</p>
                        <div class="footer__form">
                            <form action="">
                                <input type="email" placeholder="Email Adress">
                                <div class="footer__form__btn">
                                    <button><img src="{{ asset('assets/img/form-iocn.png') }}" alt="send"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                    <div class="footer__top__right">
                        <h4>Instagram Feed</h4>
                        <div class="footer__gallery">
                            <ul class="flex flex-wrap ul padding-l-0">
                                <li>
                                    <a href="#"><img src="{{ asset('assets/img/instra1.jpg') }}" alt="instagram"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('assets/img/instra1.jpg') }}" alt="instagram"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('assets/img/instra1.jpg') }}" alt="instagram"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('assets/img/instra1.jpg') }}" alt="instagram"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('assets/img/instra1.jpg') }}" alt="instagram"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('assets/img/instra1.jpg') }}" alt="instagram"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="footer__border">
                <div class="row flex align-items-center justify-content-space-between">
                    <div class="col-lg-6">
                        <div class="footer__copy__right">
                            <p>Copyright ©
                                <script>
                                  document.write(new Date().getFullYear())
                                </script> All rights reserved | This template is made by Konstantin Sudakov</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer__menu float-right">
                            <ul class="ul flex">
                                <li><a href="{{ route('index') }}">Главная</a></li>
                                <li><a href="{{ route('news.index') }}">Новости</a></li>
                                <li><a href="#">main</a></li>
                                <li><a href="#">main</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/bootstrap.js') }}"></script>



<script>

  $(window).scroll(function () {
    header = document.getElementById('header-fixed');
    if(pageYOffset > 300) {

      header.classList.add('header__fixed__menu');
    }else {

      header.classList.remove('header__fixed__menu');
    }

  });
</script>
</body>

</html>
