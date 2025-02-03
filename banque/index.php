<?php
// Page principale index.php

include 'config.php';
include 'modules/comptes.php';
include 'modules/traitement.php';

// Appliquer les actions avant affichage
$comptes = isset($_SESSION['comptes']) ? $_SESSION['comptes'] : [];
$actions = isset($_SESSION['actions']) ? $_SESSION['actions'] : [];
$comptes_apres = appliquerMouvements($comptes, $actions);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sylvain L. - PHP - TP Banque</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.6.0/css/all.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"/>
    <link rel="stylesheet" href="https://sylvain.pro/assets/css/index.css"/>
    <link rel="icon shortcut" href="https://sylvain.pro/assets/images/logo.png"/>
</head>
<body>
    <!-- Notification de changement de thème -->
    <div class="theme-notif"></div>

    <!-- Bouton pour changer de thème -->
    <button class="switch-btn"></button>

    <!-- Bouton retourner à l'accueil -->
    <a href="https://sylvain.pro" class="home-btn"><i class="fa-solid fa-home"></i></a>

    <!-- Formulaire pour ajouter un compte -->
    <!-- <section class="container mt-5" style="padding-bottom: 100px">
        <h2 class="title is-4 has-text-centered">Ajouter un Compte</h2>

        <form action="modules/traitement.php" method="POST">
            <input type="hidden" name="ajouter_compte" value="1">
            <div class="field">
                <label class="label">Numéro</label>
                <div class="control">
                    <input class="input" type="text" name="numero" placeholder="Numéro du compte">
                </div>
            </div>
            <div class="field">
                <label class="label">Nom</label>
                <div class="control">
                    <input class="input" type="text" name="nom" placeholder="Nom">
                </div>
            </div>
            <div class="field">
                <label class="label">Prénom</label>
                <div class="control">
                    <input class="input" type="text" name="prenom" placeholder="Prénom">
                </div>
            </div>
            <div class="field">
                <label class="label">Solde</label>
                <div class="control">
                    <input class="input" type="number" name="solde" placeholder="Solde initial">
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Ajouter</button>
                </div>
            </div>
        </form>
    </section> -->

    <!-- Formulaire pour ajouter une action -->
    <!-- <section class="container mt-5" style="padding-bottom: 100px">
        <h2 class="title is-4 has-text-centered">Ajouter un Action</h2>

        <form action="modules/traitement.php" method="POST">
            <input type="hidden" name="ajouter_action" value="1">
            <div class="field">
                <label class="label">Numéro de Compte</label>
                <div class="control">
                    <input class="input" type="text" name="numero" placeholder="Numéro du compte">
                </div>
            </div>
            <div class="field">
                <label class="label">Type</label>
                <div class="control">
                    <div class="select is-fullwidth">
                        <select name="type">
                            <option value="CB">Carte Bancaire (CB)</option>
                            <option value="CHQ">Chèque (CHQ)</option>
                            <option value="VIR">Virement (VIR)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Montant</label>
                <div class="control">
                    <input class="input" type="number" name="montant" placeholder="Montant" step="0.01">
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Ajouter</button>
                </div>
            </div>
        </form>
    </section> -->

    <!-- Tableaux -->
    <section class="container mt-5" style="padding-bottom: 100px">
        <h2 class="title is-4 has-text-centered">Gestion des Comptes Bancaires</h2>

        <div class="box">
            <h3 class="subtitle is-5">Tableau des Comptes Avant Application des Mouvements</h3>
            <table class="table is-striped is-fullwidth">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Solde</th>
                    </tr>
                </thead>
                <tbody>
                    <?php afficherComptes($comptes); ?>
                </tbody>
            </table>
        </div>

        <div class="box">
            <h3 class="subtitle is-5">Tableau des Mouvements à Appliquer</h3>
            <table class="table is-striped is-fullwidth">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Type</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($actions as $mouvement) {
                        echo "<tr><td>{$mouvement['numero']}</td><td>{$mouvement['type']}</td><td>{$mouvement['montant']} €</td></tr>";
                    } ?>
                </tbody>
            </table>
        </div>

        <div class="box">
            <h3 class="subtitle is-5">Tableau des Comptes Après Application des Mouvements</h3>
            <table class="table is-striped is-fullwidth">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Solde</th>
                    </tr>
                </thead>
                <tbody>
                    <?php afficherComptes($comptes_apres); ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Bas de page -->
    <div class="has-text-centered p-4 bottom">
        <p><strong>
            <a href="/">php.sylvain.pro</a> &copy; 2024. Tous droits réservés.
        </strong></p>
    </div>

    <!-- Charger le Js -->
    <script src="https://sylvain.pro/assets/js/theme.js"></script>
</body>
</html>
