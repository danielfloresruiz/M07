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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- 
        <script id="functions" user-id="{{ $user_id }}" src="{{ asset('js/funcionsWhispering.js') }}" defer></script>
    -->
    <style>
        body{
            background-color: grey;
        }
        #posts{
            background-color: white;
            width: 500px;
            padding: 5px;
            margin: 0 auto;
        }
        .post{
            border: 1px solid;
            margin: 10px 20px 10px 20px;
            padding: 10px;
        }
        .linkButton{
            padding: 2px 5px;
            background-color: #D0D0D0;
            border-radius: 10px;
            border: 1px solid black;
            text-decoration: none;
            color: black;
        }
        .typing{
            margin: 0 auto;
            text-align:center;
            display:none;
        }
    </style>
</head>
<body>
    holaaaaaaaa usuari {{$user_id}}<br>
    <a href="{{route("crearPost")}}">Crear Post</a><br>
    <a href="{{ url('/dashboard') }}">Dashboard</a>
    <div id="muro">
        <div id="posts">


        Crea el post el usuari: {{$user_id}}
        <form enctype="multipart/form-data" method="post" action="{{ url('okPost')}}">
            @csrf
            <label>Id Usuari</label>
            <input type="text" name="id_user" value="{{$user_id}}" disabled><br>

            <label>Post</label>
            <textarea type="text" name="postEscrit" rows="4" cols="50" id="TextArea"></textarea><br>

            <label>To: </label>
            <select name="recived">
                <option value="0">All</option>

                @foreach ($usersList as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach

            </select>

            <br><br>
            <input id="enviar" type="submit" value="ENVIAR">
        </form>





        <div class="typing">Someone is typing!</div>
        @foreach ($posts as $post)
            <?php if ($post->to == 0 || $post->to == $user_id || $post->author == $user_id){ ?>
                <div class="post">
                   
                    Author: {{$post->author}}<br>
                    Message: {{$post->post}}<br>
                    To: {{$post->to}}<br>
                    Likes: {{$post->likes}}
                    <!-- <button value="{{$post->id}}" class="likeButton">like</button> -->
                    <!-- <a href="{{url('likePost')}}/{{$post->id}}" target="_blank">Like</a> -->
                    <a href="{{url('likePost')}}/{{$post->id}}" class="linkButton">Like</a>
                   
                </div>
            <? } ?>
        @endforeach
    </div>
</body>
</html>
