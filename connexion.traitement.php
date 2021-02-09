<?php

// Algorithme permettant la connexion de l'établissement
if (isset($_POST["envoyer"], $_POST["email"], $_POST["motpasse"])) {
    $lEtablissement = consulterLEtablissement($_POST["email"]);
    if (isset($lEtablissement)) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["codeuai"] = $lEtablissement["code_uai"];
            $_SESSION["nom"] = $lEtablissement["nom"];
            $_SESSION["adresse"] = $lEtablissement["adresse"];
            $_SESSION["cp"] = $lEtablissement["codepostal"];
            $_SESSION["ville"] = $lEtablissement["ville"];
            $_SESSION["tel"] = $lEtablissement["telephone"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["motpasse"] = $_POST["motpasse"];
        }
    }
}


