<?php

# definimos los valores iniciales para nuestro calendario
$mes=date("n");
$año=date("Y");
 
//Obtenemos el dia de la semana del primer dia
//Devuelve 0 para domingo, 6 para sabado
$diaSemana=date("w",mktime(0,0,0,$mes,1,$año));
//Obtenemos el ultimo dia del mes
$ultimoDiaMes=date("d",(mktime(0,0,0,$mes+1,1,$año)-1));

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
    while ($dia<=$ultimoDiaMes){
        echo "<tr>";
        $cont=0;
        while ($cont<7 && $dia<=$ultimoDiaMes){
            while ($i<$diaSemana){
                echo "<td>&nbsp;</td>";
                $i++;
                $cont++;
            }
            echo "<td> $dia </td>";
            $dia++;
            $cont++;
        }
        echo "</tr>";
    }

echo "</table>"

?>
