<div class="boxed push-down-60">
    <div class="meta">
        @if ($post->image)
            <img class="wp-post-image" src="{{ $post->image }}" alt="Blog image" width="1138" height="493">
        @endif
        <div class="row">
            <div class="col-xs-12  col-sm-10  col-sm-offset-1  col-md-8  col-md-offset-2">
                <div class="meta__container--without-image">
                    <div class="row">
                        <div class="col-xs-12  col-sm-8">
                            <div class="meta__info">
                                <span class="meta__date"><span class="glyphicon glyphicon-calendar"></span> &nbsp; {{ getRusDate($post->created_at) }}</span>
                            </div>
                        </div>
                        <div class="col-xs-12  col-sm-4">
                            <div class="comment-icon-counter-detail">
                                <span class="glyphicon glyphicon-comment comment-icon"></span>
                                <span class="comment-counter">10</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1  col-md-8  col-md-offset-2  push-down-60">
            <div class="post-content">
                <h1>
                    <a href="#">{{ $post->caption }}</a>
                </h1>
                <h3>{{ $post->tagline }}</h3>
                {{ $post->fulltext }}
            </div>
            <div class="row">
                <div class="col-xs-12  col-sm-6">
                    <div class="post-comments">
                        <a class="btn btn-primary" href="single-post-without-image.html">Комментарии (3)</a>
                    </div>
                </div>
                <div class="col-xs-12  col-sm-6">
                    <div class="social-icons">
                        <a href="#" class="social-icons__container"> <span class="zocial-facebook"></span> </a>
                        <a href="#" class="social-icons__container"> <span class="zocial-twitter"></span> </a>
                        <a href="#" class="social-icons__container"> <span class="zocial-email"></span> </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="tags">
                        <h6>Тэги</h6>
                        <hr>
                        <a href="#" class="tags__link">Разработка</a>
                        <a href="#" class="tags__link">Web</a>
                        <a href="#" class="tags__link">UI/UX</a>
                        <a href="#" class="tags__link">Жизнь</a>
                        <a href="#" class="tags__link">Обо всем</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="comments">
                        <h6>Комментарии</h6>
                        <hr>
                        <div class="comment clearfix">
                            <div class="comment-avatar pull-left">
                                <img src="images/dummy/about-5.jpg" alt="User Avatar" class="img-circle comment-avatar-image">
                            </div>
                            <div class="comment-body clearfix">
                                <div class="comment-header">
                                    <strong class="primary-font">Иванов Иван</strong>
                                    <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;15 мая 2015 10:12
                                    </small>
                                </div>
                                <p class="comment-text">
                                    Культурная аура произведения, как бы это ни казалось парадоксальным, многопланово заканчивает определенный синтез искусств. Богатство мировой литературы от Платона до Ортеги-и-Гассета свидетельствует о том, что типическое имитирует романтизм. Лабораторность
                                    художественной культуры, по определению, готично использует персональный символический метафоризм.
                                </p>
                            </div>
                        </div>
                        <div class="comment clearfix">
                            <div class="comment-avatar pull-left">
                                <img src="images/dummy/about-5.jpg" alt="User Avatar" class="img-circle comment-avatar-image">
                            </div>
                            <div class="comment-body clearfix">
                                <div class="comment-header">
                                    <strong class="primary-font">Иванов Иван</strong>
                                    <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;15 мая 2015 10:12
                                    </small>
                                </div>
                                <p class="comment-text">
                                    Культурная аура произведения, как бы это ни казалось парадоксальным, многопланово заканчивает определенный синтез искусств. Богатство мировой литературы от Платона до Ортеги-и-Гассета свидетельствует о том, что типическое имитирует романтизм. Лабораторность
                                    художественной культуры, по определению, готично использует персональный символический метафоризм.
                                </p>
                            </div>
                        </div>
                        <div class="comment clearfix">
                            <div class="comment-avatar pull-left">
                                <img src="images/dummy/about-5.jpg" alt="User Avatar" class="img-circle comment-avatar-image">
                            </div>
                            <div class="comment-body clearfix">
                                <div class="comment-header">
                                    <strong class="primary-font">Иванов Иван</strong>
                                    <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;15 мая 2015 10:12
                                    </small>
                                </div>
                                <p class="comment-text">
                                    Культурная аура произведения, как бы это ни казалось парадоксальным, многопланово заканчивает определенный синтез искусств. Богатство мировой литературы от Платона до Ортеги-и-Гассета свидетельствует о том, что типическое имитирует романтизм. Лабораторность
                                    художественной культуры, по определению, готично использует персональный символический метафоризм.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>