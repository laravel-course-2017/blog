@if (!empty($popularPosts) && !empty($recentPosts))
<div class="widget-posts  push-down-30">
    <h6>Популярное / Свежее</h6>
    <ul class="nav  nav-tabs">
        <li class="active">
            <a href="#recent-posts" data-toggle="tab"> <span class="glyphicon  glyphicon-time"></span> &nbsp;Свежо</a>
        </li>
        <li>
            <a href="#popular-posts" data-toggle="tab"> <span class="glyphicon  glyphicon-flash"></span> &nbsp;Популярно </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane  fade  in  active" id="recent-posts">
            @forelse($recentPosts as $recentPost)
                <div class="push-down-25">
                    @if (!empty($recentPost->image))
                        <img src="{{ $recentPost->image }}" alt="Posts">
                    @endif
                    <h5>
                        <a href="{{ route('site.posts.post', ['slug' => $recentPost->slug]) }}">{{ $recentPost->title }}</a><br>
                        <span class="widget-posts__time">{{ getRusDate($recentPost->created_at, 'd %MONTH% Y H:i') }}</span>
                    </h5>
                </div>
            @empty
                <div class="push-down-15">
                    Нет доступных записей для отображения
                </div>
            @endforelse
        </div>
        <div class="tab-pane  fade" id="popular-posts">
            @forelse($popularPosts as $popularPost)
                <div class="push-down-25">
                    @if (!empty($popularPost->image))
                        <img src="{{ $popularPost->image }}" alt="Posts">
                    @endif                
                    <h5>
                        <a href="{{ route('site.posts.post', ['slug' => $popularPost->slug]) }}">{{ $popularPost->title }}</a><br>
                        <span class="widget-posts__time">{{ getRusDate($popularPost->created_at, 'd %MONTH% Y H:i') }}</span>
                    </h5>
                </div>
            @empty
                <div class="push-down-15">
                    Нет доступных записей для отображения
                </div>
            @endforelse
        </div>
    </div>
</div>
@endif