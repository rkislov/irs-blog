<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Авторизация</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}"rel="stylesheet">
    <link href="{{ asset('css/login.css') }}"rel="stylesheet">


</head>

<body class="text-center">
<div class="row">
    <div >
        <form class="form-signin" method="post">
            {!!  csrf_field() !!}
            <h1 class="h3 mb-3 font-weight-normal">Пожалуйста войдите</h1>
            <label for="inputEmail" class="sr-only">Email адрес</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email адрес" required autofocus><br>
            <label for="inputPassword" class="sr-only">Пароль</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required><br>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" value="1"> Запомнить меня
                </label>
            </div>
            <button class="btn btn-lg btn-primary" type="submit">Войти</button>
            <p class="mt-5 mb-3 text-muted">&copy; ООО "ИРС" 2018</p>
        </form>
    </div>
</div>

</body>
</html>
