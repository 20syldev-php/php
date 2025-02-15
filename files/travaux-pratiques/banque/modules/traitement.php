<?php
    // Module traitement.php

    include 'session.php';
    include_once 'comptes.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['ajouter_compte'])) {
            $_SESSION['comptes'][$_POST['numero']] = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'solde' => (float) $_POST['solde']
            ];
            error_log("Compte ajouté: {$_POST['numero']} - Solde: " . $_POST['solde']);
        }

        if (isset($_POST['ajouter_action'])) {
            $_SESSION['actions'][] = [
                'numero' => $_POST['numero'],
                'type' => $_POST['type'],
                'montant' => (float) $_POST['montant']
            ];
            error_log("Action ajoutée: {$_POST['numero']} - Type: {$_POST['type']} - Montant: " . $_POST['montant']);
        }

        if (isset($_POST['modifier_compte'])) {
            $numero = $_POST['numero'];
            $montant = (float) $_POST['montant'];
            $_SESSION['comptes'] = mettreAJourCompte($_SESSION['comptes'], $numero, $montant);
            $_SESSION['actions'][] = ['numero'=>$numero,'type'=>$_POST['type'],'montant'=>$montant];
            error_log("Compte modifié: $numero - Montant: $montant");
        }

        header('Location: /files/travaux-pratiques/banque');
        exit;
    }
