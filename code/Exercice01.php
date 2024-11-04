<?php
    $somme = 0;
    $tab = array('note_maths' => 15, 'note_francais' => 12, 'note_histoire_geo' => 9);

    function verifmoyenne($tab, $somme) {
        foreach ($tab as $note) {
            $somme = $somme + $note;
        }

        $moyenne = $somme / count($tab);
        echo 'La moyenne est de ' .$moyenne. '/ 20';
    }

    echo verifmoyenne($tab, $somme);
?>