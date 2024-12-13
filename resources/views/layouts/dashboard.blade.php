<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('partials.dashboard.head')
    @yield('head')
</head>

<body>
    <script src={{ asset('assets/static/js/initTheme.js') }}></script>
    <div id="app">
        @include('partials.dashboard.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>{{ date('Y') }} &copy; OJK</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="google.com">OJK</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('partials.dashboard.scripts')
    @yield('scripts')
</body>

</html>
