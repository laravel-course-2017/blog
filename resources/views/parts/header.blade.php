<header class="header push-down-45">
    <div class="container">
        <div class="logo pull-left">
            <a href="{{ route('site.main.index') }}">
                <img src="assets/images/logo.png" alt="Logo" width="352" height="140">
            </a>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#readable-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <div class="collapse navbar-collapse" id="readable-navbar-collapse">
                <ul class="navigation">
                    <li class="main">
                        <a href="{{ route('site.main.index') }}" class="dropdown-toggle" data-toggle="dropdown">Главная</a>
                    </li>
                    <li class="about">
                        <a href="{{ route('site.main.about') }}" class="dropdown-toggle" data-toggle="dropdown">Кто я?</a>
                    </li>
                    <li class="feedback">
                        <a href="{{ route('site.main.feedback') }}" class="dropdown-toggle" data-toggle="dropdown">Написать мне</a>
                    </li>
                    <li class="register">
                        <a href="{{ route('site.auth.register') }}" class="dropdown-toggle" data-toggle="dropdown">Регистрация</a>
                    </li>

                    @if (Auth::check())
                        <li class="login">
                            Вошли как {{ Auth::user()->name }}<a href="{{ route('site.auth.logout') }}">Выход</a>
                        </li>
                    @else
                        <li class="login">
                            <a href="{{ route('site.auth.login') }}" class="dropdown-toggle" data-toggle="dropdown">Вход</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
        <div class="hidden-xs hidden-sm">
            <a href="#" class="search__container  js--toggle-search-mode"> <span class="glyphicon  glyphicon-search"></span> </a>
        </div>
    </div>
</header>
