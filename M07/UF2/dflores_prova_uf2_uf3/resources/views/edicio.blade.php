<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #ECECEC;
        }
    </style>
</head>
<body>

<a href="{{ url('/dashboard') }}">Dashboard</a><br><br>
    <form enctype="multipart/form-data" action="{{ url('cangeUser')}}" method="post">
        @csrf
        <label form="nombre">Nom:</label> 
        <input name="nom" type="text" value="{{$nom}}">
        <br><br>
        <label form="email">Email:</label> 
        <input name="email" type="text" value="{{$email}}">
        <br><br>
        <label form="cognom">Cognoms:</label> 
        <input name="cognom" type="text" value="{{Auth::user()->cognoms}}">
        <br><br>
        <label form="nombre">Contrasenya:</label> 
        <input name="password" type="password">
        <br><br>
        <label form="nombre">Repetir Contrasenya:</label> 
        <input name="password_confirmation" type="password">
        <br><br>

        <input type="submit" value="ENVIAR">
    </form>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    @if ($correcte==1)
        <p>S'ha canviat les dades correctament</p>
    @endif


    <br><br><br><form enctype="multipart/form-data" action="{{ url('cangeImgUser')}}" method="post">
        @csrf
        <label form="imatge">Imatge perfil:</label> 
        <input type="file" name="image">
        <br><br>

        <input type="submit" value="ENVIAR">
    </form>
</body>
</html>