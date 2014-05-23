<?php
$titre="Connexion";
include ("../include/header.php");
include ("../include/menu.php");
?>

<h3> Connexion </h3>
<form method="POST" action="traitement_connexion.php" name="connexion" id="formulaire"> 

	<label for="pseudo">  Nom utilisateur :</label>
	<input type="text" name="pseudo" id="pseudo" maxlength="20" value=""> <br/>

	<label for="mdp">  Entrez un mot de passe :</label>
	<input type="password" name="mdp" id="mdp" maxlength="20" value=""> <br/>
	
	<!-- **********************	DEBUT MODIFICATIONS ********************** -->
	<label for="resteConnecte">  Se souvenir de moi </label>
	<input type="checkbox" name="resteConnecte" id="resteConnecte" checked="checked"> <br/>	
	<!-- ************************ FIN MODIFICATIONS ********************** -->

	<a href="oubli_mdp.php">  Mot de passe oublié  </a> <br/>
	<a href="../inscription/index.php">  Devenez membre </a> <br/><br/>


	<label for="envoi"></label>
	<input type="submit" value="Connexion" id="envoi" ><br />

	</form>

<?php
include ("../include/footer.php");
?>