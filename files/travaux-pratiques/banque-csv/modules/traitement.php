<?php
    // Module traitement.php

    include 'session.php';
    include_once 'comptes.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['ajouter_compte'])) {
            $comptes = lireComptesCSV('bqe_comptes.csv');
            $comptes[$_POST['numero']] = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'solde' => (float) $_POST['solde']
            ];
            ecrireComptesCSV('bqe_comptes.csv', $comptes);
            error_log("Compte ajouté: {$_POST['numero']} - Solde: " . $_POST['solde']);
        }

        if (isset($_POST['modifier_compte'])) {
            $comptes = lireComptesCSV('bqe_comptes.csv');
            $numero = $_POST['numero'];
            $montant = (float) $_POST['montant'];
            $comptes = mettreAJourCompte($comptes, $numero, $montant);
            ecrireComptesCSV('bqe_comptes.csv', $comptes);
            error_log("Compte modifié: $numero - Montant: $montant");
            
            $handle = fopen('bqe_mouvements.csv', 'a');
            fputcsv($handle, [$numero, $_POST['type'], $montant], ';');
            fclose($handle);
            error_log("Action enregistrée: $numero - Type: {$_POST['type']} - Montant: $montant");
        }        

        header('Location: /files/travaux-pratiques/banque-csv');
        exit;
    }
