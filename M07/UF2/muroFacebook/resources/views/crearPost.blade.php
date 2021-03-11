<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Post</title>
</head>
<body>
    Crea el post el usuari: {{$user_id}}
    <form enctype="multipart/form-data" method="post" action="{{ url('okPost')}}">
        @csrf
        <label>Id Usuari</label>
        <input type="text" name="id_user" value="{{$user_id}}" disabled><br>

        <label>Post</label>
        <textarea type="text" name="postEscrit" rows="4" cols="50"></textarea><br>

        <label>To: </label>
        <select name="recived">
            <option value="0">All</option>

            @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach

        </select>

        <br><br>
        <input type="submit" value="ENVIAR">
    </form>
    <a href="{{route("home")}}">HOME</a><br>
</body>
</html>