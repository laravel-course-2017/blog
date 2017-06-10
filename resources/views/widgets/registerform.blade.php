<div class="widget-author widget-register-form boxed">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <h2>Регистрация</h2>
            <p>Для регистрации заполните все поля</p>
            <form class="form-horizontal" method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('site.auth.registerPost') }}">
                {{ csrf_field() }}
                @if (count($errors) > 0)
                    <div class="">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Имя/Никнейм</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" name="name" placeholder="Ivan Ivanov">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">E-mail</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" name="email" placeholder="user@domain.ru">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Пароль</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="" name="password" placeholder="Придумайте пароль">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Подтверждение пароля</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="" name="password2" placeholder="Пароль еще раз">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Номер телефона</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" name="phone" placeholder="8 (999) 123-45-67">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="is_confirmed">Согласен с условиями сайта</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="reset" class="btn btn-gray">Очистить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>