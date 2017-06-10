@extends('layouts.two-column')

@section('left-column')
    @include($page)
@endsection

@section('right-column')
    @include('widgets.me')
    <div class="sidebar boxed push-down-30">
        <div class="row">
            <div class="col-xs-10  col-xs-offset-1">
                @include('widgets.categories')
                @include('widgets.featured-post')
                @include('widgets.posts')
                @include('widgets.tags')
            </div>
        </div>
    </div>
@endsection

@section('bottom_scripts')
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script>
        $(function () {
            if (window.BlogSettings.activeMenu) {
                $('ul.navigation').find('.' + window.BlogSettings.activeMenu).addClass('active');
            }
        });
    </script>
@endsection

@section('head_scripts')
    <script>
        window.BlogSettings = {
            "activeMenu": "{{ $activeMenu or '' }}"
        };
    </script>
@show