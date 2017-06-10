@extends('layouts.base')

@section('header')
    @include('parts.header')
@endsection

@section('search_panel')
    @include('parts.search_panel')
@endsection

@section('content')
    <div class="container">
        @yield('center-column')
    </div>
@endsection

@section('footer_links')
    @include('parts.footer_links')
@endsection

@section('footer_copyrights')
    @include('parts.footer_copyrights')
@endsection
