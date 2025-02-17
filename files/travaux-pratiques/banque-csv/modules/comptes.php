<?php
    // Module comptes.php

    function lireComptesCSV($filename) {
        $comptes = [];
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
                $comptes[$data[0]] = [
                    'nom' => $data[1],
                    'prenom' => $data[2],
                    'solde' => (float) $data[3]
                ];
            }
            fclose($handle);
        }
        return $comptes;
    }

    function lireMouvementsCSV($filename) {
        $mouvements = [];
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
                $mouvements[] = [
                    'numero' => $data[0],
                    'type' => $data[1],
                    'montant' => (float) $data[2]
                ];
            }
            fclose($handle);
        }
        return $mouvements;
    }

    function afficherComptes($comptes) {
        foreach ($comptes as $numero => $compte) {
            echo "<tr><td>$numero</td><td>" . $compte['nom'] . '</td><td>' . $compte['prenom'] . '</td><td>' . $compte['solde'] . ' €</td></tr>';
        }
    }

    function mettreAJourCompte($comptes, $numero_compte, $montant) {
        if (isset($comptes[$numero_compte])) {
            $comptes[$numero_compte]['solde'] += $montant;
            error_log('Mise à jour du compte ' . $numero_compte . ' : solde ajouté de ' . $montant . ' €, nouveau solde : ' . $comptes[$numero_compte]['solde'] . ' €');
        }
        return $comptes;
    }

    function appliquerMouvements($comptes, $actions) {
        foreach ($actions as $mouvement) {
            if (isset($comptes[$mouvement['numero']])) {
                $comptes[$mouvement['numero']]['solde'] += $mouvement['montant'];
                error_log('Action appliquée au compte ' . $mouvement['numero'] . ' : type ' . $mouvement['type'] . ' de ' . $mouvement['montant'] . ' €');
            }
        }
        $_SESSION['comptes'] = $comptes;
        return $comptes;
    }

    function ecrireComptesCSV($filename, $comptes) {
        if (($handle = fopen($filename, 'w')) !== FALSE) {
            foreach ($comptes as $numero => $compte) {
                fputcsv($handle, [$numero, $compte['nom'], $compte['prenom'], $compte['solde']], ';');
            }
            fclose($handle);
        }
    }