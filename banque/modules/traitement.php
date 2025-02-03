<?php
// Module traitement.php

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
        error_log("Action ajouté: {$_POST['numero']} - Type: {$_POST['type']} - Montant: " . $_POST['montant']);
    }    

    header('Location: ../');
    exit;
}
