<footer class="footer">
    <div class="container">
        <div class="col-xs-12  col-md-3">
            <nav class="widget-navigation  push-down-30">
                <h6>Я в социальных сетях</h6>
                <hr>
                <div class="social-icons  widget-social-icons">
                    <a href="#" class="social-icons__container"> <span class="zocial-facebook"></span> </a>
                    <a href="#" class="social-icons__container"> <span class="zocial-twitter"></span> </a>
                    <a href="#" class="social-icons__container"> <span class="zocial-youtube"></span> </a>
                </div>
            </nav>
        </div>

        <div class="col-xs-12  col-md-3 col-md-offset-1">
            <nav class="widget-navigation  push-down-30">
                <h6>Навигация</h6>
                <hr>
                <ul class="navigation">
                    <li> <a href="{{ route('site.main.index') }}">Главная</a> </li>
                    <li> <a href="{{ route('site.main.about') }}">Кто я?</a> </li>
                    <li> <a href="{{ route('site.main.feedback') }}">Написать мне</a> </li>
                    <li> <a href="{{ route('site.auth.register') }}">Регистрация</a> </li>
                </ul>
            </nav>
        </div>
        <div class="col-xs-12  col-md-4 col-md-offset-1">
            <div class="widget-contact  push-down-30">
                <h6>Контакты</h6>
                <hr>
                <span class="widget-contact__text">
                    <span class="widget-contact__title">Дмитрий Юрьев</span>
                    <br>Email: <a href="mailto:dima@932433.ru">dima@932433.ru</a>
                    <br>VK: <a href="https://vk.com/dyuryev84" target="_blank">https://vk.com/dyuryev84</a>
                    </span>
            </div>
        </div>
    </div>
</footer>