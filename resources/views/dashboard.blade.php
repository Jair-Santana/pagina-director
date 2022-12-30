<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>

    <style>

    </style>

</head>

<body>
    <x-menu />
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Dashboard</h1>
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
                        <label>Nombre del Post</label>
                        <input class="form-control" autocomplete="off" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <input class="form-control" autocomplete="off" type="text" name="type">
                    </div>
                    <div class="form-group">
                        <label>URL</label>
                        <input class="form-control" type="text" name="url">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                @foreach ($posts as $post)
                <div>
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$post->type}}</h6>
                            <p class="card-text">{{$post->url}}</p>
                            <div style="padding:56.25% 0 0 0;position:relative;">
                            <iframe class="iframe" src="https://player.vimeo.com/video/{{$post->url}}?h=a955825869&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;controls=0;app_id=58479" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                            </div>
                            <script src="https://player.vimeo.com/api/player.js"></script>
                            <form method="post" action="{{route('posts.destroy', $post->id)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            {{$post->created_at}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</body>

<script>
    // generete video preview on mouse hover iframe
    var iframe = document.querySelector('.iframe');
    var player = new Vimeo.Player(iframe);
    // seleccionar elemento de la clase card
    var video = document.querySelector('.card');

    // reproducir y silenciar preview al pasar el mouse sobre el iframe del video
    iframe.addEventListener('mouseover', function() {
        player.play();
        player.setVolume(0);
    });

    // detener preview al quitar el mouse del iframe del video
    iframe.addEventListener('mouseout', function() {
        player.pause();
    });

</script>

</html>