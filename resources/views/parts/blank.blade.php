<div class="boxed sticky push-down-30">
    @if (isset($image))
        <div class="widget-author__image-container">
            <img src="{{ $image['path'] }}" alt="{{ $image['alt'] }}" width="748" height="324">
        </div>
    @endif
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <div class="widget-author__content">
                <h4>{{ $title or '' }}</h4>
                {!! $content or '' !!}
            </div>
        </div>
    </div>
</div>
