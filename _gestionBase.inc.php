<?php

// Fichier recensant l'ensemble des fonctions permettant la connexion à la base de données calcul
// La fonction gestionnairedeConnexion() permet la connexion à la base de données
function gestionnaireDeConnexion() {
    $cnx = NULL;
    $bdd_hote = "localhost";
    $bdd_utilisateur = "root";
    $bdd_motpasse = "root";
    $bdd_nom = "calcul";
    $bdd_options = "--client_encoding==UTF8";
    $cnx = pg_connect("host=$bdd_hote dbname=$bdd_nom user=$bdd_utilisateur password=$bdd_motpasse options=$bdd_options")
            or die("Pas de connexion à la base de données");
    /*if (pg_result_error($cnx)) {
        echo "Echec de la connexion : " . pg_last_error();
        exit();
    }*/
    
    return $cnx;
}

// La fonction seConnecter($email) permet à l'établissement de se connecter
function seConnecter($email) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM etablissement WHERE email='$email'";
        $requete_exec = pg_query($cnx, $req);
        $lEtablissement = pg_fetch_assoc($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lEtablissement;
}

// Fonction permettant la création de l'établissement
function creerLEtablissement($codeuai, $nom, $adresse, $cp, $ville, $tel, $email, $motpasse) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "INSERT INTO etablissement (code_uai, nom, adresse, codepostal, ville, telephone, email, motpasse) 
    VALUES ('$codeuai', '$nom', '$adresse', '$cp', '$ville', '$tel', '$email', '$motpasse')";
        $creer_etablissement = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $creer_etablissement;
}

// Fonction permettant de consulter un établissement grâce à son email
function consulterLEtablissement($email) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM etablissement WHERE email='$email'";
        $requete_exec = pg_query($cnx, $req);
        $lEtablissement = pg_fetch_assoc($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lEtablissement;
}

// Fonction permettant de consulter tout les établissements répertoriés dans la base de données grâce à son code UAI
function consulterToutLesEtablissements($codeuai) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM etablissement ORDER BY code_uai='$codeuai'";
        $touslesEtablissements = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $touslesEtablissements;
}

// Fonction qui permet de supprimer l'établissement
function supprimerLEtablissment($codeuai) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "DELETE FROM etablissement WHERE code_uai='$codeuai'";
        $supprimer_etablissement = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $supprimer_etablissement;
}

// Fonction permettant de modifier les informations d'un établissment
function modifierLEtablissement($codeuai, $nom, $adresse, $cp, $ville, $tel, $email, $motpasse) {
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "UPDATE etablissement SET nom='$nom', adresse='$adresse', codepostal='$cp', ville='$ville', telephone='$tel', email='$email', motpasse='$motpasse'
     WHERE code_uai='$codeuai'";
        $modifier_etablissement = pg_query($cnx, $req);
    } else {
        echo "Une erreur est survenue";
    }
    return $modifier_etablissement;
}
