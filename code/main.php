<?php
include "statistique.php";
include "tri_selection.php";

$salaire = array(2400, 3200, 1900, 4500, 2780, 3300, 3850, 4600, 4020, 2150);
$salaire = tri_selection($salaire);
echo verifmoyenneslaire($salaire);
echo "\n";
echo "<br>";
echo mediane($salaire);
?>