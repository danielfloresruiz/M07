<!DOCTYPE html>
<html lang="cat">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{url('formAddLlibre')}}">Nou llibre</a>
    <table style="border: 1px solid">
        <tr>
            <td>id</td>
            <td>nom</td>
            <td>resum</td>
            <td>npagines</td>
            <td>edicio</td>
            <td>autor</td>
            <td>preu</td>
            <td>edit</td>
            <td>del</td>
        </tr>

        @foreach ($llibres as $llibre)
        <tr>
            <td>{{$llibre->id}}</td>
            <td>{{$llibre->nombre}}</td>
            <td>{{$llibre->resumen}}</td>
            <td>{{$llibre->npagina}}</td>
            <td>{{$llibre->edicion}}</td>
            <td>{{$llibre->autor}}</td>
            <td>{{$llibre->precio}}</td>
            <td><a href="{{url('editLlibre')}}/{{$llibre->id}}">edit</a></td>
            <td><a href="{{url('deleteLlibre')}}/{{$llibre->id}}">del</a></td>
        </tr>
        @endforeach
    </table>


</body>
</html>