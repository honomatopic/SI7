<?php

// Algorithme permettant la connexion de l'établissement
if (isset($_POST["envoyer"], $_POST["email"], $_POST["motpasse"])) {
    $cnx = pg_connect("host=localhost dbname=calcul user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
    $req = "SELECT * FROM etablissement WHERE email='" . $_POST["email"] . "'";
    $requete_exec = pg_query($cnx, $req);
    while ($lEtablissement = pg_fetch_assoc($requete_exec)) {
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
    pg_close($cnx);
}



