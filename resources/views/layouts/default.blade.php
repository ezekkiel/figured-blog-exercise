<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link href="/css/app.css" rel="stylesheet">

    <script>
        window.Blog = <?= json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button"
                                class="collapsed navbar-toggle"
                                data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-9"
                                aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="#" class="navbar-brand">{{ config('app.name') }}</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ route('admin.home') }}">Admin</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Content -->
            @yield('content')
        </div>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>
