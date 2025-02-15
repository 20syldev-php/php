<!-- Exemple 5 -->
<?php
    $fp = fopen('films.txt', 'rb');
    while (!feof($fp)) echo fgets($fp, 1024);
    fclose($fp);
?>

<!-- Exemple 9 -->
<?php
    $ligne = 1;
    $fic = fopen("films.txt", "rb");
    while ($tab = fgetcsv($fic, 1024, " ")) {
        echo "Les " . count($tab) . " champs de la ligne " . $ligne . " sont :\n";
        $ligne++;
        for ($i = 0; $i < count($tab); $i++) echo $tab[$i] . "\n";
    }
    fclose($fic);
?>