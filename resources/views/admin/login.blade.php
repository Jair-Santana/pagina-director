<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión</title>
</head>

<body>
    <h1>Iniciar sesión</h1>
    <form  id="login-form" action="{{ action('App\Http\Controllers\AdminController@checkLogin') }}" method="POST">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Iniciar sesión">
    </form>
</body>

</html>