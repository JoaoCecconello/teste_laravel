<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>
    <body class="container">
        <nav class="nav">
            <div class="navLogo">
                @yield('navLogo')
            </div>
            <div class="navOptions">
                <a href='{{url("/")}}' class="@yield('leftNavOptionClass')">
                    Tarefas
                </a>
            </div>
        </nav>
        <section class="contentContainer">
            <div class="content">
                <div class="contentHeader">
                    <div>
                        <p>
                            @yield('contentHeaderTitle')
                        </p>
                    </div>
                    <div class="buttonContainer">
                        @yield('contentHeaderButton')
                    </div>
                </div>
                <div>
                    @yield('content')
                </div>
            </div>
        </section>
    </body>
</html>