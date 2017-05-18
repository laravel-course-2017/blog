<html>
<head>
    <title>{{ $title or '' }}</title>
    <link rel="stylesheet" href="base_style.css">
    <script src="base_script.js"></script>
</head>

<body>
    <header>
        @section('header')
            <span>Это дефолтовый хедер</span>
        @show
    </header>

    <div class="mainContent">
        @yield('content', 'asd')
    </div>

    <footer>
        @section('footer')
            <span>Это дефолтовый футер</span>
        @show
    </footer>

    @include('includes.copyright')
</body>
</html>