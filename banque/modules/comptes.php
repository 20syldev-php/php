<?php
// Module comptes.php

function afficherComptes($comptes) {
    foreach ($comptes as $numero => $compte) {
        echo "<tr><td>{$numero}</td><td>{$compte['nom']}</td><td>{$compte['prenom']}</td><td>{$compte['solde']} €</td></tr>";
    }
}

function mettreAJourCompte($comptes, $numero_compte, $montant) {
    if (isset($comptes[$numero_compte])) {
        $comptes[$numero_compte]['solde'] += $montant;
        error_log("Mise à jour du compte $numero_compte : solde ajouté de $montant €, nouveau solde : " . $comptes[$numero_compte]['solde'] . " €");
    }
    return $comptes;
}

function appliquerMouvements($comptes, $actions) {
    foreach ($actions as $mouvement) {
        if (isset($comptes[$mouvement['numero']])) {
            $comptes[$mouvement['numero']]['solde'] += $mouvement['montant'];
            error_log("Action appliqué au compte {$mouvement['numero']} : type {$mouvement['type']} de {$mouvement['montant']} €");
        }
    }
    $_SESSION['comptes'] = $comptes;
    return $comptes;
}