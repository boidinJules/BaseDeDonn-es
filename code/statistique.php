<?php
    function mediane($salaire) {
        $longueur = count($salaire);
        if ($longueur % 2 == 0) {
            $index1 = $longueur / 2 - 1;
            $index2 = $longueur / 2;
            $mediane = ($salaire[$index1] + $salaire[$index2]) / 2;
            echo "La médiane des salaires est de " . $mediane . ".";
        } else {
            $index = $longueur / 2;
            $mediane = $salaire[$index];
            echo "La médiane des salaires est de " . $mediane . ".";
        }
    }

    function verifmoyenneslaire($salaire) {
        $somme = 0;
        foreach ($salaire as $note) {
            $somme = $somme + $note;
        }

        $moyenne = $somme / count($salaire);
        echo 'La moyenne est de ' .$moyenne. '.';
    }
?>