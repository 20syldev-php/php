<?php
    $fp = fopen('bacasable.txt', 'w');
    fwrite($fp, 'abc');
    fwrite($fp, 'def');
    fclose($fp);

    // En mode w, le fichier est réécrit à chaque exécution (il contiendra "abcdef"). 
    // En mode a, le contenu sera ajouté à la suite.
?>