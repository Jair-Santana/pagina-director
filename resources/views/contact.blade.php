<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>

    <style>
        @font-face {
            font-family: 'didot';
            src: url("{{ asset('assets/fonts/Didot.ttc') }}");
        }

        @font-face {
            font-family: 'montserrat';
            src: url("{{ asset('assets/fonts/Montserrat-Regular.ttf') }}");
        }

        body {
            color: #4f4e4e !important;
            font-family: 'didot' !important;
            background-color: black !important;
        }

        .navbar {
            background-color: transparent !important;
        }

        .container-1 {
            background-repeat: space no-repeat;
            background-color: black !important;
            height: 100vh;
        }

        .container-2 {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'montserrat' !important;
        }

        .to-bottom {
            position: absolute;
            bottom: 0;
            transform: translate(-5%, -10%);
        }

        .to-bottom span {
            font-family: 'montserrat' !important;
        }

        @media (max-width: 768px) {
            .to-bottom {
                font-size: 0.5rem;
                transform: translate(-5%, -70%);
            }
        }

        .card {
            background-color: transparent !important;
            border: 1px solid #4f4e4e !important;
            border-radius: 10px !important;
            padding: 1em !important;
            width: 50% !important;
            margin: 0 auto !important;
        }

        .card-body {
            padding: 0 !important;
        }

        input {
            background-color: transparent !important;
            border: none !important;
            border-bottom: 1px solid #4f4e4e !important;
            color: #4f4e4e !important;
            margin-bottom: 1em !important;
        }

        input:last-child {
            margin-bottom: 3em !important;
        }

        .btn-send {
            background-color: #7f7f7f !important;
            color: black !important;
            border-radius: 5px !important;
            height: 1.8em !important;
            font-size: small !important;
            padding: 0 3.5em !important;
        }
    </style>
</head>

<body>
    <div class="container-1">
        <x-menu></x-menu>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>WE PRODUCE COMERCIALS,</h1>
                    <h1>MUSIC VIDEOS, PRINT AND DIGITAL</h1>
                    <h1>DESIGN.</h1>
                </div>
            </div>
            <div class="row to-bottom">
                <div class="col-md-2 text-center">
                    <p>MEXICO CITY</p>
                    <span>Gonzalo Olivero</span>
                    <span>gonzalo@blackkraft.com</span>
                    <span>+33(0) 42612158</span>
                </div>
                <div class="col-3"></div>
                <div class="col-md-2 text-center">
                    <p>SPAIN</p>
                    <span>Gonzalo Olivero</span>
                    <span>gonzalo@blackkraft.com</span>
                    <span>+33(0) 42612158</span>
                </div>
                <div class="col-3"></div>
                <div class="col-md-2 text-center">
                    <p>BUENOS AIRES</p>
                    <span>Gonzalo Olivero</span>
                    <span>gonzalo@blackkraft.com</span>
                    <span>+33(0) 42612158</span>
                </div>
            </div>
        </div>
    </div>


    <div class="container container-2">
        <div class="container text-center">
            <img src="{{ URL::asset('assets/images/logo.png')}}" alt="Logo" width="50%">
            <br> <br>
            <h5>CONTACTO</h5>
            <br>
            <div class="card">
                <div class="card-body">
                    <p>Envianos tu información en el siguiente formulario y nos pondremos en contacto en breve.</p>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Nombre*">
                            <input type="email" class="form-control" id="email" placeholder="Email*">
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <input type="button" class="btn btn-primary btn-send" value="ENVIAR">
        </div>

</body>

</html>