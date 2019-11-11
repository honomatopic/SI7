<?php
session_start();
// affichage des erreurs php
// error_reporting(E_ALL);

include_once('_entete.inc.php');
include_once('parametresbdd.inc.php');
include_once('_gestionBase.inc.php');

//Fonction qui additionne
function addition($premierchiffre, $deuxiemechiffre)
{
    return $resultatCalcul = $premierchiffre + $deuxiemechiffre;
}

//Fonction qui soustrait
function soustraction($premierchiffre, $deuxiemechiffre)
{
    return $resultatCalcul = $premierchiffre - $deuxiemechiffre;
}

// Algorithme permettant la connexion de l'établissement
if (isset($_POST["envoyer"])) {
    if (isset($_POST["email"], $_POST["motpasse"])) {
        $email = $_POST["email"];
        $motpasse = $_POST["motpasse"];
        $lEtablissement = lireUnEtablissement($email);
        if (isset($lEtablissement)) {
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

// Algorithme qui inaugure un nouvel établissment dans la base de données calcul
if (isset($_POST["valider"])) {
    if (isset($_POST["codeuai"], $_POST["nom"], $_POST["adresse"], $_POST["cp"], $_POST["ville"], $_POST["tel"], $_POST["email"], $_POST["motpasse"])) {
        $codeuai = $_POST["codeuai"];
        $nom = $_POST["nom"];
        $adresse = $_POST["adresse"];
        $cp = $_POST["cp"];
        $ville = $_POST["ville"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $motpasse = $_POST["motpasse"];
        creerEtablissement($codeuai, $nom, $adresse, $cp, $ville, $tel, $email, $motpasse);
        echo "<div class=\"alert alert-success\" role=\"alert\">
            Votre établissement a été enregistré avec succès !
        </div>";
    } else {
        echo "<div class=\"alert alert-warning\" role=\"alert\">
            Votre établissement n'a pas été enregistré sans succès !
        </div>";
    }
}

// Algorithme qui calcul le résultat de l'addition s'il est supérieur ou inférieur à 10
if (isset($_POST["egal"]) && $_POST["choix"] == "addition") {
    $resultatcalcul = $_POST["egal"];
    $premierchiffre = $_POST["nombre1"];
    $deuxiemechiffre = $_POST["nombre2"];
    $egal = addition($premierchiffre, $deuxiemechiffre);
    if ($egal <= 9) {
        echo "<div class=\"alert alert-success\" role=\"alert\">
            Bravo ton addition est égale à $egal. Et il est en dessous à 10 !
        </div>";
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
            Désolé mais ton addition est supérieur ou égale à 10 car ton chiffre est $egal !
        </div>";
    }
    // Et si c'est une soustraction, on détermine si le résultat est supérieur ou inférieur à 0
} elseif (isset($_POST["egal"]) && $_POST["choix"] == "soustraction") {
    $resultatcalcul = $_POST["egal"];
    $premierchiffre = $_POST["nombre1"];
    $deuxiemechiffre = $_POST["nombre2"];
    $egal = soustraction($premierchiffre, $deuxiemechiffre);
    if ($egal >= 0) {
        echo "<div class=\"alert alert-success\" role=\"alert\">
            Bravo ta soustraction est $egal. Et il est au dessus ou égal à 0 !
        </div>";
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
            Désolé mais ta soustraction est inférieure à 0 car ton chiffre est $egal !
        </div>";
    }
}

// Script de déconnexion de la session de l'établissement authentifié
if (isset($_POST["deconnecter"])) {
    session_destroy();
    header('location:index.php');
    exit();
}
