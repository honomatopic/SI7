<?php

// affichage des erreurs php
// error_reporting(E_ALL);


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

