<?php
$titre="Inscription";
include ("../include/header.php");
include ("../include/menu.php");
/*Pas besoin de connexion, car pas encore*/
// include ("../include/connexion.php");
?>

<h3> Inscription </h3>
<form method="POST" action="traitement_inscription.php" name="inscription" id="formulaire"> 

	<label for="pseudo" class="required">  Nom utilisateur :</label>
	<input type="text" name="pseudo" id="pseudo" maxlength="20" value="" required="required"> <br/> 

	<label for="mdp" class="required">  Entrez un mot de passe :</label>
	<input type="password" name="mdp" id="mdp" maxlength="20" value="" required="required"> <br/>

	<label for="mdp2" class="required">  Confirmer votre mot de passe :</label>
	<input type="password" name="mdp2" id="mdp2" maxlength="20" value="" required="required"> <br/>

	<label for="sexe">  Sexe :</label>	
	<select name="sexe"> 
	<option value="H" selected="selected"> Homme </option>
	<option value="F"> Femme </option> 
	</select> <br/>

	<label for="email" class="required">  E-mail :</label>
	<input type="email" name="email" id="email" maxlength="50" value="" required="required"> <br/>


	<label for="lu_accepte"></label>
	<input type="checkbox" checked="checked" value="1" id="lu_accepte" name="lu_accepte" >  J'ai lu et j'accepte les <a href="conditions_utilisation.php" target="_blank">conditions d'utilisation* </a><br>

	<label for="envoi"></label>
	<input type="submit" value="S'inscrire" id="envoi" ><br />

	</form>

<?php
include ("../include/footer.php");
?>