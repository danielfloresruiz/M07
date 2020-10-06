<?php

# definimos los valores iniciales para nuestro calendario
$mes=date("n");
$año=date("Y");
$diaActual=date("j");
 
//Obtenemos el dia de la semana del primer dia
//Devuelve 0 para domingo, 6 para sabado
$diaSemana=date("w",mktime(0,0,0,$mes,1,$año))+7;
$mesactual=date("F",mktime(0,0,0,$mes,1,$año))+7;
//Obtenemos el ultimo dia del mes
$ultimoDiaMes=date("d",(mktime(0,0,0,$mes+1,1,$año)-1));

$dias=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");


echo "<table border=1>";

	echo "<tr>";
		echo "<td> $mesactual </td>";
	echo "</tr>";

	echo "<tr>";
	for ($i=0;$i<=6;$i++)
	{
       		echo "<td> $dias[$i] </td>";
   	};
   	echo "</tr>";
	
	$last_cell=$diaSemana+$ultimoDiaMes;
	
	for($i=1;$i<=42;$i++)
	{
		if($i==$diaSemana)
		{
			$dia=1;
		}
		if($i<$diaSemana || $i>=$last_cell)
		{
			echo "<td>&nbsp;</td>";
		}else{
			echo "<td>$dia</td>";
			$dia++;
		}
		if($i%7==0)
		{
			echo "</tr><tr>\n";
        	}
	}

echo "</table>"
?>
