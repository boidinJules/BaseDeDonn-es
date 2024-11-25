<?php

function tri_selection($salaire) {
    for ($i = 0; $i < count($salaire) - 1; $i++) {
        $min = $i;

        for ($j = $i + 1; $j < count($salaire); $j++) {
            if ($salaire[$j] < $salaire[$min]) {
                $min = $j;
            }
        }

        if ($min != $i) {
            $t = $salaire[$i];
            $salaire[$i] = $salaire[$min];
            $salaire[$min] = $t;
        }
    }

    return $salaire;
}
?>