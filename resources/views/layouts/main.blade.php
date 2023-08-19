<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('stylesheets/main.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="wrapper">
    <header>
        <div class="header-wrapper">
            <div class="navigation-menu-wrapper">
                <nav class="navigation-menu">
                    <a href="{{route('client.create')}}">Оставить заявку</a>
                    @guest()
                        <a href="{{route('client.index')}}">Войти</a>
                    @endguest
                    @auth()
                        <div>Вы вошли как {{auth()->user()->username}}</div>
                        <a href="{{route('client.index')}}">Кабинет менеджера</a>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <input type="submit" value="Выйти">
                        </form>
                    @endauth
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="main-wrapper">
            @yield('content')
        </div>
    </main>
    <footer>
        <div class="page-wrapper"></div>
    </footer>
</div>
<script src="{{asset('scripts/main.js')}}"></script>
@yield('scripts')
</body>
</html>
