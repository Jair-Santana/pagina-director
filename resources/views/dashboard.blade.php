<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>

    <style>
        body {
            background-color: #222222 !important;
        }

        h1 {
            color: #f5f5f5 !important;
            font-size: 30px !important;
        }

        .title {
            color: #f5f5f5 !important;
        }

        .container {
            text-align: center;
            width: 60% !important;
        }

        .card {
            background-color: #434242 !important;
            color: #fff !important;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: transparent;
        }

        .cards-videos {
            margin-top: 20px !important;
            background-color: #434242 !important;
        }

        .cards-videos .card {
            background-color: #F3EFE0 !important;
            color: #000 !important;
        }
    </style>
</head>

<body>
    <x-menu-admin />
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Administrador Web </h1>
                <br>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Publicar Video</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" autocomplete="off" type="text" name="name">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-select" name="type">
                            <option selected>Seleccione la categoria</option>
                            <option value="reel">Reel</option>
                            <option value="archive">Archive</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>URL Video completo</label>
                        <input class="form-control" type="text" name="url">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>URL Video demo</label>
                        <input class="form-control" type="text" name="demo_url">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </form>
            </div>
        </div>
        <div class="row gx-5">
            <div class="card cards-videos">
                <div class="card-header">
                    <h5 class="title">Reels</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if (isset($posts))
                        @foreach ($posts as $index => $post)
                        @if ($post->type == 'reel')
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$post->name}}</h5>
                                    <p class="card-text">{{$post->url}}</p>
                                    <div id="video-container-{{ $index }}" class="video-container" style="padding:56.25% 0 0 0;position:relative;">
                                        <iframe class="vimeoPlayer" src="https://player.vimeo.com/video/{{$post->demo_url}}?h=a955825869&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;controls=0;app_id=58479" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                                        <button class="video-overlay" onclick="redirectToVideoView('{{ $post->url }}')"></button>
                                    </div>
                                    <br>
                                    <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                            <br>
                        </div>
                        <br>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card cards-videos">
                <div class="card-header">
                    <h5 class="title">Archivos</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($posts as $index => $post)
                        @if ($post->type == 'archive')
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$post->name}}</h5>
                                    <p class="card-text">{{$post->url}}</p>
                                    <div id="video-container-{{ $index }}" class="video-container" style="padding:56.25% 0 0 0;position:relative;">
                                        <iframe class="vimeoPlayer" src="https://player.vimeo.com/video/{{$post->demo_url}}?h=a955825869&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;controls=0;app_id=58479" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                                        <button class="video-overlay" onclick="redirectToVideoView('{{ $post->url }}')"></button>
                                    </div>
                                    <br>
                                    <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                            <br>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
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
        @endif
    </div>
    </div>

</body>

</html>