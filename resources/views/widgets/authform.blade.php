@section('bottom_scripts')
    @parent
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
@endsection
<div class="widget-author widget-auth-form boxed">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <h2>Авторизация</h2>
            <p>Для продолжения необходимо ввести логин и пароль</p>
            <form class="form-horizontal" method="POST" action="{{ route('site.auth.loginPost') }}">
                {{ csrf_field() }}
                @if (session('authError'))
                    <div class="alert alert-danger alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Ошибка авторизации!</strong><br>
                        {{ session('authError') }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Адрес e-mail</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Адрес e-mail, указанный при регистрации" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Пароль</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" placeholder="Ваш пароль" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember">Запомнить меня</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Войти</button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="reset" class="btn btn-gray">Очистить</button>
                    </div>
                </div>
                <div class="push-down-30">
                    Еще не зарегистрированы? <a href="{{ route('site.auth.register') }}" style="cursor: pointer">Зарегистрироваться</a>
                </div>
            </form>
        </div>
    </div>
</div>