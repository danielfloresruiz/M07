<?php

$hora=date("h");
$minut=date("i");
$sec=date("s");

for ($i=0;$i<24;$i++){
    if ($i==$hora){
        echo " <b>",$i,"</b> ";
    } else{
        echo $i," ";
    }
}
echo "<br>";
for ($i=0;$i<60;$i++){
    if ($i==$minut){
        echo " <b>",$i,"</b> ";
    } else{
        echo $i," ";
    }
}
echo "<br>";
for ($i=0;$i<60;$i++){
    if ($i==$sec){
        echo " <b>",$i,"</b> ";
    } else{
        echo $i," ";
    }
}

?>