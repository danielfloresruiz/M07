<form action="{{url('storeLlibre')}}" method="post">
@csrf

nom:<input type="text" name="nom"><br>
resum:<input type="text" name="resum"><br>
npagines:<input type="text" name="npagines"><br>
edicio:<input type="text" name="edicio"><br>
autor:<input type="text" name="autor"><br>
preu:<input type="text" name="preu"><br>
<input type="submit" value="ok"><br>

</form>