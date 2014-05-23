<!-- Insertion des include: en-tête et du menu -->
<?php
$titre="";
include ("../include/header.php");
include ("../include/menu.php");
?>

<!-- Titre de la page -->
<p>Insertion d'un animal dans la base de données </p> <br/>

<!-- Formulaire -->
<form method="POST" action="/administration/ajout_animaux_BDD_traitement.php">
	<!-- Nom de l'animal -->
	<p><label for= "nom_animal" class="required">Nom de l'animal: </label>
	<input type="text" size="50" maxlength="250"id="nom_animal" name="nom_animal" required="required"/></p>

	<!-- Espèce de l'animal -->
	<p><label for= "espece">Espèce: </label>
	<select name="espece">
		<option value="chien" selected="selected"> Chien </option>
		<option value="chat"> Chat </option> 
		<option value="autre"> Autre </option>
	</select> </p>

	<!-- Taille de l'animal -->
	<p><label for= "taille">Taille: </label>
	<select name="taille">
		<option value="petit" selected="selected"> Petit </option>
		<option value="moyen"> Moyen </option> 
		<option value="grand"> Grand </option>
	</select></p>

	<!-- Race de l'animal -->
	<p><label for= "race" class="required">Race: </label>
	<input type="text" size="50" maxlength="250"id="race" name="race" required="required"/></p>

	<!-- Sexe de l'animal -->
	<p><label for= "sexe_animal">Sexe: </label>
	<select name="sexe_animal">
		<option value="male" selected="selected"> Male </option>
		<option value="femelle"> Femelle </option> 
	</select></p>

	<!-- Date de naissance de l'animal -->
	<p><label for= "date_naissance_animal" class="required">Date de naissance de l'animal: </label>
	<input type="date" id="date_naissance_animal" name="date_naissance_animal" required="required"/></p>

	<!-- Sauvetage -->
	<p><label for= "sauvetage">Sauvetage: </label>
	<select name="sauvetage">
		<option value="oui" selected="selected"> Oui </option>
		<option value="non"> Non </option> 
	</select></p>

	<!-- Envoyer vers le traitement de formulaire: ajout_animaux_BDD_traitement.php -->
	<p><label for="envoi"></label>
	<input type="submit" value="Envoyer" id="envoi" ></p>

	<!-- Effacer la saisie -->
	<p><label for="effacer"></label>
	<input type="reset" value="Effacer" id="effacer" > </p>

</form>

<!-- Insertion de l'include de pied de page -->
<?php
include ("../include/footer.php");
?>