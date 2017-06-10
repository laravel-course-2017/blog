<div class="boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <div class="contact">
                <h2>Обратная связь</h2>
                <p class="contact__text">Оставьте ваше сообщение и я обязательно отвечу вам.</p>
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Во время заполнения формы возникли ошибки!</strong><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('site.main.feedbackPost') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="text" placeholder="Имя или никнейм *" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="col-xs-6">
                            <input type="text" placeholder="Адрес e-mail *" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="col-xs-12">
                            <textarea rows="6" type="text" placeholder="Текст сообщения *" name="message">{{ old('message') }}</textarea>
                            <button type="submit" class="btn btn-primary">Оправить сообщение</button> <span class="contact__obligatory">Поля, помеченные * обязательны для заполнения</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>