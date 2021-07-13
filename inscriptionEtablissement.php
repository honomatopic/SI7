<?php
require_once ("_entete.inc.php");
?>
<body>
	<section class="jumbotron container">
		<h1>Veuillez vous identifiez</h1>
		<form action="bienvenue.php" class="form-group col-md-8" method="POST"
			enctype="application/x-www-form-urlencoded">
			<input type="text" id="codeuai" class="form-control" name="codeuai"
				autocomplete="off" placeholder="Entrez votre code UAI"> <br> <input
				type="text" class="form-control" name="nom"
				placeholder="Entrez votre nom de l'établissement"> <br> <input
				type="text" class="form-control" name="adresse" id="adresse"
				placeholder="Entrez l'adresse postale de l'établissement"> <br> <input
				type="text" class="form-control" name="cp" id="cp"
				placeholder="Entrez le code postal de l'établissement"> <br> <input
				type="text" class="form-control" name="ville" id="ville"
				placeholder="Entrez la ville de l'établissement"> <br> <input
				type="text" class="form-control" name="tel"
				placeholder="Entrez le téléphone de l'établissement"> <br> <input
				type="email" class="form-control" name="email"
				placeholder="Entrez votre email"> <br> <input type="email"
				class="form-control" name="confirmemail"
				placeholder="Confirmez votre email"> <br> <input type="password"
				class="form-control" name="motpasse"
				placeholder="Entrez votre mot de passe"> <br> <input type="password"
				class="form-control" name="confirmmotpasse"
				placeholder="Confirmez votre mot de passe"> <br>
			<button type="submit" class="btn btn-primary" name="valider">Valider</button>
		</form>
	</section>
	<!-- /container -->
</body>
<?php require_once ('_piedpage.inc.php'); ?>
</html>