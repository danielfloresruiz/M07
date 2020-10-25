<?php

$mes=date("n");
$año=date("Y");
$primerdia=date("w",mktime(0,0,0,$mes,1,$año));
$ultimodia=date("d",(mktime(0,0,0,$mes+1,1,$año)-1));

$dias=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");

echo "<table border=1>";

    echo "<tr>";
    for ($i=0;$i<=6;$i++)
    {
        echo "<td> $dias[$i] </td>";
   	};
    echo "</tr>";

    $i=1;
    $dia=1;
    while ($dia<=$ultimodia){
        echo "<tr>";
        $cont=0;
        while ($cont<7 && $dia<=$ultimodia){
            while ($i<$primerdia){
                echo "<td>&nbsp;</td>";
                $i++;
                $cont++;
            }
            echo "<td> $dia </td>";
            $dia++;
            $cont++;
        }
        while ($cont<7){
            echo "<td>&nbsp;</td>";
            $cont++;
        }
        echo "</tr>";
    }

echo "</table>"
?>
