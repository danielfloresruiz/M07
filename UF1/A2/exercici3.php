<?php
$cantfilas=6;
$cantolumnas=7;
$dias=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");

echo "<table border=1>";
for ($i=0;$i<count(dias);i++) {
    echo "<tr>";
    for ($col=1;$col<=$cantolumnas;$col++)
    {
        echo "<td> $dais[col] </td>";
    };
    echo "</tr>"
}
for ($fila=1;$fila<=$cantfilas;$fila++)
{
    echo "<tr>";
    for ($col=1;$col<=$cantolumnas;$col++)
    {
        echo "<td> Fila $fila, columna $col </td>";
    };
    echo "</tr>";
};
echo "</table>";
?>
