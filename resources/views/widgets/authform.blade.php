<div class="widget-author widget-auth-form boxed">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <h2>Авторизация</h2>
            <p>Для продолжения необходимо ввести логин и пароль</p>
            <form class="form-horizontal" method="POST" action="{{ route('site.auth.loginPost') }}">
                {{ csrf_field() }}

                @if (session('successLogout'))
                    <script>alert('{{ session('successLogout') }}');</script>
                @endif




                @if (session('authError'))
                    <div class="btn-warning--transparent">
                        <li>{{ session('authError') }}</li>
                    </div>
                @endif
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Логин / E-mail</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Пароль" name="password">
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
                        <button type="submit" class="btn btn-gray">Войти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>