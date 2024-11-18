<?php
include "statistique.php";

$salaire = array(1900, 2150, 2400, 2780, 3200, 3300, 3850, 4020, 4500, 4600);
echo verifmoyenneslaire($salaire);
echo "\n";
echo mediane($salaire);
?>