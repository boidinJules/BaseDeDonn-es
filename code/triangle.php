<?php
function triangle(){
    $etoile = "";
   for($i = 0;$i < 10;$i++){
        $etoile .= "*";
        echo $etoile;
        echo "\n";
    }
}
return triangle();
?>