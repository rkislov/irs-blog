
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Панель администратора</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('admin')}}">Управление</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Поиск" aria-label="Поиск">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{route('logout')}}">Выход</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('admin')}}">
                            <span data-feather="home"></span>
                            Главная
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!! route('categories') !!}">
                            <span data-feather="file"></span>
                            Категороии
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!! route('articles') !!}">
                            <span data-feather="shopping-cart"></span>
                            Статьи
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Пользователи
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Комментарии
                        </a>
                    </li>

                </ul>


            </div>
        </nav>

      @yield('content')
    </div>
</div>


<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/alertify.js') }}"></script>
@yield('js')
@include('inc.messages')
</body>
</html>