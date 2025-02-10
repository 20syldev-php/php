<?php
// Fichier config.php

include 'modules/session.php';

if (!isset($_SESSION['created']) || (time() - $_SESSION['created'] > 600)) {
    $_SESSION['comptes'] = [];
    $_SESSION['actions'] = [];
    $_SESSION['created'] = time();
}
