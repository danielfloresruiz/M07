<?php
$cantfilas=6;
$cantolumnas=7;
$dias=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");

echo "<table border=1>";

echo "<tr>";
for ($col=0;$col<=$cantolumnas-1;$col++)
{
    echo "<td> $dias[$col] </td>";
};
echo "</tr>";

$num=1;
for ($fila=2;$fila<=$cantfilas;$fila++) {
    echo "<tr>";
    for ($col=1;$col<=$cantolumnas;$col++)
    {
        echo "<td> $num </td>";
	$num++;
    };
    echo "</tr>";
};
echo "</table>";
?>
