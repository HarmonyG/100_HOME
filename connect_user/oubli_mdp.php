<?php
$titre="";
include ("../include/header.php");
include ("../include/menu.php");
include ("../include/connexion.php");
?>

<h3> Mot de passe perdu? </h3>
<form method="POST" action="traitement_oubli_mdp.php" name="oubli_mdp" id="oubli_mdp"> 

	<label for="email">  Veuillez entrer l'e-mail correspondant à votre compte </label> <br/><br/>
	<input type="text" name="email" id="email" maxlength="50" > <br/>

	<label for="envoi"></label>
	<input type="submit" value="Envoi" id="envoi" ><br />
	
	</form>
<?php
include ("../include/footer.php");
?>