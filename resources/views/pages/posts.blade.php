@extends('base')

@section('footer')
    <ul class="bottom-menu">
        <li>Item 1</li>
        <li>Item 2</li>
    </ul>
@endsection

@section('head')
    @parent
    <script src="2.js"></script>
@endsection

@section('header')
    <img src="logo.jpg">
    <ul class="menu">
        <li>Item 1</li>
        <li>Item 2</li>
        <li>Item 3</li>
        <li>Item 4</li>
    </ul>
@endsection

@section('content')
    @include($template)
@endsection

