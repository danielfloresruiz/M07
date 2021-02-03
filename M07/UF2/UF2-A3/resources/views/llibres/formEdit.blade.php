<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{url('updateLlibre')}}" method="post">
@csrf

<input type="hidden" name="id" value="{{$llibre->id}}"><br>
nom:<input type="text" name="nom" value="{{$llibre->nombre}}"><br>
resum:<input type="text" name="resum" value="{{$llibre->resumen}}"><br>
npagines:<input type="text" name="npagines" value="{{$llibre->npagina}}"><br>
edicio:<input type="text" name="edicio" value="{{$llibre->edicion}}"><br>
autor:<input type="text" name="autor" value="{{$llibre->autor}}"><br>
preu:<input type="text" name="preu" value="{{$llibre->precio}}"><br>
<input type="submit" value="ok"><br>

</form>
</body>
</html>