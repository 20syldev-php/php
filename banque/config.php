<?php
// Fichier config.php

if (!isset($_SESSION['comptes'])) {
include 'modules/session.php';
    $_SESSION['comptes'] = [
        'c001' => ['nom' => 'Keger', 'prenom' => 'Alice', 'solde' => 4000],
        'c004' => ['nom' => 'Ruel', 'prenom' => 'Martine', 'solde' => 2500],
        'c005' => ['nom' => 'Erone', 'prenom' => 'Quentin', 'solde' => 1500],
        'c006' => ['nom' => 'Erone', 'prenom' => 'Anne', 'solde' => 2000],
    ];
}

if (!isset($_SESSION['actions'])) {
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
}
