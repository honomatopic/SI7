<?php
// Fichier recensant l'ensemble des fonctions permettant la connexion à la base de données calcul

// La fonction gestionnairedeConnexion() permet la connexion à la base de données
function gestionnaireDeConnexion()
{
    $cnx = NULL;
    $bdd_hote = "localhost";
    $bdd_utilisateur = "root";
    $bdd_motpasse = "root";
    $bdd_nom = "calcul";
    $cnx = mysqli_connect($bdd_hote, $bdd_utilisateur, $bdd_motpasse, $bdd_nom)
        or die("Pas de connexion à la base de données");
    if (mysqli_connect_errno()) {
        echo "Echec de la connexion : " . mysqli_connect_error();
        exit();
    }
	mysqli_set_charset($cnx, 'utf8');
    return $cnx;
}

// La fonction seConnecter($email) permet à l'établissement de se connecter
function seConnecter($email)
{
    $cnx = gestionnaireDeConnexion();
    if ($cnx != NULL) {
        $req = "SELECT * FROM etablissement WHERE email='$email'";
        $requete_exec = mysqli_query($cnx, $req);
        $lEtablissement = mysqli_fetch_assoc($requete_exec);
    } else {
        echo "Une erreur est survenue";
    }
    return $lEtablissement;
}

// Fonction permettant la création d'un établissement
function creerEtablissement($codeuai, $nom, $adresse, $cp, $ville, $tel, $email, $motpasse)
{
    $cnx = gestionnaireDeConnexion();
	if ($cnx != NULL) {
		$req = "INSERT INTO etablissement (code_uai, nom, adresse, codepostal, ville, telephone, email, motpasse) 
    VALUES ('$codeuai', '$nom', '$adresse', '$cp', '$ville', '$tel', '$email', '$motpasse')";
		$creer_etablissement = mysqli_query($cnx, $req);
	} else {
		echo "Une erreur est survenue" ;
	}
    return $creer_etablissement;
}

// Fonction permettant de lire un établissement grâce à son email
function lireUnEtablissement($email)
{
    $cnx = gestionnaireDeConnexion();
	if ($cnx != NULL) {
		$req = "SELECT * FROM etablissement WHERE email='$email'";
		$requete_exec = mysqli_query($cnx, $req);
		$lEtablissement = mysqli_fetch_assoc($requete_exec);
	} else {
		echo "Une erreur est survenue" ;
	}
    return $lEtablissement;
}

// Fonction permettant de lire tous les établissements répertoriés dans la base de données grâce à son code UAI
function lireTouslesEtablissments($codeuai)
{
    $cnx = gestionnaireDeConnexion();
	if ($cnx != NULL) {
		$req = "SELECT * FROM etablissement ORDER BY code_uai='$codeuai'";
		$touslesEtablissements = mysqli_query($cnx, $req);
	} else {
		echo "Une erreur est survenue" ;
	}
    return $touslesEtablissements;
}

// Fonction qui permet de supprimer l'établissement
function supprimerUnEtablissment($codeuai)
{
    $cnx = gestionnaireDeConnexion();
	if ($cnx != NULL) {
		$req = "DELETE FROM etablissement WHERE code_uai='$codeuai'";
		$supprimer_etablissement = mysqli_query($cnx, $req);
	} else {
		echo "Une erreur est survenue" ;
	}
    return $supprimer_etablissement;
}

// Fonction permettant de modifier les informations d'un établissment
function modifierUnEtablissement($codeuai, $nom, $adresse, $cp, $ville, $tel, $email, $motpasse)
{
    $cnx = gestionnaireDeConnexion();
	if ($cnx != NULL) {
		$req = "UPDATE etablissement SET nom='$nom', adresse='$adresse', codepostal='$cp', ville='$ville', telephone='$tel', email='$email', motpasse='$motpasse'
     WHERE code_uai='$codeuai'";
		$modifier_etablissement = mysqli_query($cnx, $req);
	} else {
		echo "Une erreur est survenue" ;
	}
    return $modifier_etablissement;
}


