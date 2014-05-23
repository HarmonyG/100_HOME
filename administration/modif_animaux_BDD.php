<!-- Insertion des include: en-tête, du menu et de la connexion -->
<?php
$titre="";
include ("../include/header.php");
include ("../include/menu.php");
include ("../include/connexion.php");

//Titre
echo 'Modification de l\'animal sélectionné';


//Récupération de l'id et de ses données
$id = $_GET['id'];
$requete = "SELECT * FROM animaux WHERE id = $id";
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
$ligne = $result->fetch_assoc();


	//Récupération des données
	$nom_animal = $ligne['nom'];
	$espece = $ligne['espece'];
	$taille = $ligne['taille'];
	$race =$ligne['race'];
	$sexe_animal =$ligne['sexe'];
	$date_naissance =$ligne['date_naissance'];
	$age_animal =$ligne['age_animal'];
	$sauvetage =$ligne['sauvetage'];
	$id_animal = $ligne['id'];


// Fonction de conversion de la date année-mois-jour en jour-mois-année
function date_naissance_animal_FR($date_naissance) {
	list($annee, $mois, $jour) = explode("-", $date_naissance);
	$date_naissance= $jour.'.'.$mois.'.'.$annee;
	return $date_naissance;
}

//Implantation de la variable date dans une autre
$date_naissance_animal_FR= date_naissance_animal_FR($date_naissance);


	//Remise en place du formulaire avec récupération des données
?>
	<form method="POST" action="/administration/modif_animaux_BDD_traitement.php">
		
		<!-- Id de l'animal -->
		<p><label for= "id_animal" class="required">id de l'animal: </label>
		<input type="text" size="50" maxlength="250"id="id_animal" name="id_animal" readonly="readonly" value="<?php echo $id_animal ?>" /></p>

		<!-- Nom de l'animal -->
		<p><label for= "nom_animal" class="required">Nom de l'animal: </label>
		<input type="text" size="50" maxlength="250"id="nom_animal" name="nom_animal" required="required" value="<?php echo $nom_animal ?>" /></p>

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
		<input type="text" size="50" maxlength="250"id="race" name="race" required="required" value="<?php echo $race ?>" /></p>

		<!-- Sexe de l'animal -->
		<p><label for= "sexe_animal">Sexe: </label>
		<select name="sexe_animal">
			<option value="male" selected="selected"> Male </option>
			<option value="femelle"> Femelle </option> 
		</select></p>

		<!-- Date de naissance de l'animal -->
		<p><label for= "date_naissance_animal" class="required">Date de naissance de l'animal: </label>
		<input type="text" id="date_naissance_animal" name="date_naissance_animal" value="<?php echo $date_naissance_animal_FR?>" required="required"/></p>

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

<!-- Insertion du pied de page -->
<?php

include ("../include/footer.php");
?>