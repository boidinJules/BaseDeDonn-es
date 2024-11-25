<?php
function triangle(){
    $nb_deligne = $_GET['n'];
    $etoile = "";
    
   for($i = 0;$i < $nb_deligne; $i++){
        $etoile .= "*";
        echo $etoile . "<br>";
    }
}
return triangle();

// 127.0.0.1:8081/triangle.php?n=10

?>