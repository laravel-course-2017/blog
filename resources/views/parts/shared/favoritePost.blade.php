@if (!empty($post))
    <div class="widget-featured-post push-down-30">
        <h6>Избранный пост</h6>
        @if (!empty($post->image))
            <img src="{{ $post->image }}" alt="Featured post" width="293" height="127">
        @endif                                                
        <h4 class="post-title">
            <a href="{{ route('site.posts.post', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
        </h4>
        @if ($post->tagline)
            <p>{{ $post->tagline }}</p>
        @endif
    </div>
@endif