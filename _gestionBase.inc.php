<?php
// Fichier recensant l'ensemble des fonctions permettant la connexion à la base de données calcul

// Fonction permettant la connexion à la base de données calcul
function connexionBDD()
{
    try {
        $pdo = new PDO(
            DSNBDD,
            UTILISATEURBDD,
            MOTPASSEBDD
        );
        // Activation des erreurs PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // mode de fetch par défaut : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "La connexion a échoué : " . $e->getMessage();
    }
    return $pdo;
}

// Fonction permettant la création d'un établissement
function creerEtablissement($codeuai, $nom, $adresse, $cp, $ville, $tel, $email, $motpasse)
{
    $pdo = connexionBDD();
    $sql = "INSERT INTO etablissement (code_uai, nom, adresse, codepostal, ville, telephone, email, password) 
    VALUES (:codeuai, :nom, :adresse, :cp, :ville, :tel, :email, :motpasse)";
    $pdoStatement = $pdo->prepare($sql);
    $lEtablissement = $pdoStatement->execute(array(
        ":codeuai" => $codeuai,
        ":nom" => $nom,
        ":adresse" => $adresse,
        ":cp" => $cp,
        ":ville" => $ville,
        ":tel" => $tel,
        ":email" => $email,
        ":motpasse" => $motpasse
    ));
    $pdoStatement->closeCursor();
    return $lEtablissement;
}

// Fonction permettant de lire un établissement grâce à son email
function lireUnEtablissement($email)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM etablissement WHERE email=:email";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(":email" => $email));
    $lEtablissement = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    $pdoStatement->closeCursor();
    return $lEtablissement;
}

// Fonction permettant de lire tous les établissements répertoriés dans la base de données grâce à son code UAI
function lireTouslesEtablissments($codeuai)
{
    $pdo = connexionBDD();
    $sql = "SELECT * FROM etablissement ORDER BY code_uai=:codeuai";
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute(array(":codeuai" => $codeuai));
    $touslesEtablissements = $pdoStatement->fetchAll();
    $pdoStatement->closeCursor();
    return $touslesEtablissements;
}

// Fonction permettant de modifier les informations d'un établissment
function modifierUnEtablissement($codeuai, $nom, $adresse, $cp, $ville, $tel, $email, $motpasse)
{
    $pdo = connexionBDD();
    $sql = 'UPDATE etablissement SET nom=:nom, adresse=:adresse, codepostal=:cp, ville=:ville, telephone=:tel, email=:email, passwword=:motpasse
     WHERE code_uai=:codeuai';
    $pdoStatement = $pdo->prepare($sql);
    $lEtablissement = $pdoStatement->execute(array(
        ":nom" => $nom,
        ":adresse" => $adresse,
        ":cp" => $cp,
        ":ville" => $ville,
        ":tel" => $tel,
        ":email" => $email,
        ":motpasse" => $motpasse,
        ":codeuai" => $codeuai
    ));
    $pdoStatement->closeCursor();
    return $lEtablissement;
}

// Fonction qui permet de supprimer l'établissement
function supprimerUnEtablissment($codeuai)
{
    $pdo = connexionBDD();
    $sql = "DELETE FROM etablissement WHERE code_uai=:codeuai";
    $pdoStatement = $pdo->prepare($sql);
    $lEtablissement = $pdoStatement->execute(array(":codeuai" => $codeuai));
    $pdoStatement->closeCursor();
    return $lEtablissement;
}
