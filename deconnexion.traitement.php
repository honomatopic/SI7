<?php
// Script de déconnexion de la session de l'établissement authentifié
if (isset($_POST["deconnecter"])) {
    session_destroy();
    header('location:index.php');
    exit();
}
