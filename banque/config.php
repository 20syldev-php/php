<?php
// Fichier config.php

include 'modules/session.php';

if (!isset($_SESSION['created']) || (time() - $_SESSION['created'] > 600)) {
    $_SESSION['comptes'] = [
        'c001' => ['nom' => 'Keger', 'prenom' => 'Alice', 'solde' => 4000],
        'c004' => ['nom' => 'Ruel', 'prenom' => 'Martine', 'solde' => 2500],
        'c005' => ['nom' => 'Erone', 'prenom' => 'Quentin', 'solde' => 1500],
        'c006' => ['nom' => 'Erone', 'prenom' => 'Anne', 'solde' => 2000],
    ];
    $_SESSION['actions'] = [
        ['numero' => 'c001', 'type' => 'CB', 'montant' => -80],
        ['numero' => 'c001', 'type' => 'CHQ', 'montant' => -200],
        ['numero' => 'c001', 'type' => 'CB', 'montant' => -20],
        ['numero' => 'c001', 'type' => 'VIR', 'montant' => 2500],
        ['numero' => 'c004', 'type' => 'CB', 'montant' => -80],
        ['numero' => 'c004', 'type' => 'CB', 'montant' => -20],
        ['numero' => 'c006', 'type' => 'VIR', 'montant' => 1000],
        ['numero' => 'c006', 'type' => 'CB', 'montant' => -500],
    ];
    $_SESSION['created'] = time();
}
