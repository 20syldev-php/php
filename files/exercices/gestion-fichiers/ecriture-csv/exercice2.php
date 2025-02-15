<?php
    $out = fopen('videotheque.txt', 'w');
    foreach (['comedies.txt', 'actions.txt'] as $fichier) {
        if (file_exists($fichier)) {
            $fp = fopen($fichier, 'rb');
            while (!feof($fp)) fwrite($out, fgets($fp));
            fclose($fp);
        }
    }
    fclose($out);
?>