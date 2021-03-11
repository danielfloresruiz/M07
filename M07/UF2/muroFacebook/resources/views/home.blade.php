<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script id="functions" user-id="{{ $user_id }}" src="{{ asset('js/functions.js') }}" defer></script>
</head>
<body>
    holaaaaaaaa usuari {{$user_id}}<br>
    <a href="{{route("crearPost")}}">Crear Post</a><br>
    <a href="{{ url('/dashboard') }}">Dashboard</a>
    <div id="muro">
        @foreach ($posts as $post)
            <?php if ($post->to == 0 || $post->to == $user_id || $post->author == $user_id){ ?>
                <br>Author: {{$post->author}}
                Post: {{$post->post}}
                To: {{$post->to}}
            <? } ?>
        @endforeach
    </div>
</body>
</html>
