<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <base href="{{ route('site.main.index') }}">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <title>{{ $title or '' }}</title>

    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,400italic|Roboto:400,700,500|Open+Sans:400,600&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/default.css?{{ sha1(microtime(true)) }}" />
    @yield('head_styles')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="assets/js/default.js?{{ sha1(microtime(true)) }}"></script>
    @yield('head_scripts')
</head>

<body>
@yield('header')

@yield('search_panel')

@yield('content')

@yield('footer_links')

@yield('footer_copyrights')

@yield('bottom_scripts')

</body>
</html>