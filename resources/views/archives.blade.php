<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gonzalo Oliveró</title>

    <style>
        body {
            background-color: black !important;
            overflow-x: hidden;
        }

        h1 {
            margin-top: 1.5rem !important;
            margin-bottom: 1.5rem !important;
            font-family: 'didot' !important;
            font-size: 2rem !important;
            color: #434242;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: transparent;
        }

        .display-videos:first-child {
            width: 100vw;
            height: 100%;
        }
    </style>
</head>

<body>
    <x-menu></x-menu>
    <div class="row ">
        @foreach ($posts as $index => $post)
        @if ($post->type == 'archive')
        <div class="col-6 display-videos">
            <div id="video-container-{{ $index }}" class="video-container" style="padding:56.25% 0 0 0;position:relative;">
                <iframe class="vimeoPlayer" src="https://player.vimeo.com/video/{{$post->demo_url}}?h=a955825869&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;controls=0;app_id=58479" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                <button class="video-overlay" onclick="redirectToVideoView('{{ $post->url }}')"></button>
            </div>
        </div>
        @if ($index == 0)
        <div class="col-12 text-center">
            <h1>ARCHIVES</h1>
        </div>
        @endif
        @endif
        @endforeach
    </div>

    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        function redirectToVideoView(url) {
            window.location.href = "{{ route('redirectToVideoView') }}?url=" + url;
        }

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

            player.on('ended', function() {
                player.setCurrentTime(5);
            });
        }

        const videoContainers = document.querySelectorAll('.video-container');
        videoContainers.forEach(initVideo);
    </script>
</body>

</html>