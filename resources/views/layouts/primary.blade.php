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
