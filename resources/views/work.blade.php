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

        .video-container {
            margin: 200px;
        }
    </style>
</head>

<body>
    <x-menu></x-menu>
    @foreach ($posts as $index => $post)
    <div id="video-container-{{ $index }}" class="video-container" style="padding:56.25% 0 0 0;position:relative;">
        <iframe class="vimeoPlayer" src="https://player.vimeo.com/video/{{$post->url}}?h=a955825869&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;controls=0;app_id=58479" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
    </div>
    @endforeach

    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        function initVideo(videoContainer) {
            const iframe = videoContainer.querySelector('.vimeoPlayer');
            const player = new Vimeo.Player(iframe);

            videoContainer.addEventListener('mouseover', function() {
                player.play();
                player.setVolume(0);
            });

            videoContainer.addEventListener('mouseout', function() {
                player.pause();
            });
        }

        const videoContainers = document.querySelectorAll('.video-container');
        videoContainers.forEach(initVideo);
    </script>
</body>

</html>