<?php
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
