<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gonzalo Oliveró</title>
    <style>



        body {
            background-color: black !important;
        }

        iframe {
            margin: 0 !important;
        }
    </style>
</head>

<body>
    <x-menu/>
    <iframe src="https://player.vimeo.com/video/{{ $url }}?h=ad7fb2bac0" width="100%" height="500" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
</body>

</html>