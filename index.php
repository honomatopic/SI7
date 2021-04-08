<?php
require_once ("_entete.inc.php");
?>

<body>

    <div class="jumbotron container center-block">
        <h1>Veuillez vous identifiez</h1>
        <form action="bienvenue.php" class="form-group col-md-8" method="POST" enctype="application/x-www-form-urlencoded">

            <input type="email" class="form-control" name="email" placeholder="Entrez votre email">
            <br>

            <input type="password" class="form-control" name="motpasse" placeholder="Entrez votre mot de passe">
            <br>
            <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
            <br>
            <br>
             <a href="inscriptionEtablissement.php"><button type="submit" name="envoyer" class="btn btn-info btn-lg">S'inscrire</button></a>
        </form>

       
    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
<?php require_once ('_piedpage.inc.php'); ?>

</html>