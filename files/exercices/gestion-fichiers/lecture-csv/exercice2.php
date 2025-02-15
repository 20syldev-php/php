<?php
    $fp = fopen('films.txt', 'rb');
    $titles = [];
    while (($data = fgetcsv($fp, 1024, " ")) !== false) if (isset($data[0])) $titles[] = $data[0];
    fclose($fp);
    echo "<table border='1'>";
    foreach ($titles as $title) echo "<tr><td>$title</td></tr>";
    echo "</table>";
    echo "Nombre de films : " . count($titles);
?>