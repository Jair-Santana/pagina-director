<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gonzalo Oliveró</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container-img {
            background-color: #101011;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container-text {
            position: absolute;
            top: 85%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .login-hide a {
            position: absolute;
            top: 80%;
            left: 85%;
            border: 1px solid #101011;
            padding: 10px;
            border-radius: 5px;
            color: #101011;
        }

        .login-hide:hover a {
            color: #7f7f7f;
            border: 1px solid #7f7f7f;
        }

        a {
            color: #7f7f7f;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 80px;
        }
        img {
            width: 80%;
        }
    </style>
</head>

<body>
    <div class="container-img">
        <img src="{{ URL::asset('assets/images/logo.png')}}" alt="logo" />
    </div>
    <div class="container-text">
		<a href="{{ action('App\Http\Controllers\WorkController@displayWork') }}">WORK</a>
    </div>
    <div class="login-hide">
        <a href="{{ action('App\Http\Controllers\AdminController@displayLogin') }}">ADMIN</a>
    </div>
</body>

</html>