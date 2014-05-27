<!-- Insertion des include: en-tête, du menu et de la connexion -->
<?php
	$titre="";
	include ("../include/header.php");
	include ("../include/menu.php");
	include ("../include/connexion.php");

	// Si l'actualite est administrateur il pourra accéder ces pages sinon non : sécuriser si on entre le lien hors admin
	if (isset($_SESSION['pseudo'])){
		if($_SESSION['pseudo'] == "administrateur"){
			//Titre
			echo 'Modification de l\'actualité sélectionnée';

			//Récupération de l'id et de ses données
			$id = $_GET['id'];
			$requete = "SELECT * FROM actualites WHERE id = $id";
			$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
			$ligne = $result->fetch_assoc();

			//Récupération des données
			$titre = $ligne['titre'];
			$texte = $ligne['texte'];
			$date = $ligne['date'];
			$auteur =$ligne['auteur'];
			$compteur =$ligne['compteur'];
			$id = $ligne['id'];

			// Fonction de conversion de la date année-mois-jour en jour-mois-année
			function date_FR($date) {
				list($annee, $mois, $jour) = explode("-", $date);
				$date= $jour.'.'.$mois.'.'.$annee;
				return $date;
			}

			//Implantation de la variable date dans une autre
			$date_FR= date_FR($date);

?>
			<!-- Remise en place du formulaire avec récupération des données -->
			<form method="POST" action="/administration/modif_actualites_BDD_traitement.php">
			
				<!-- Id de l'actualité -->
				<p><label for= "id" class="required">id de l'actualité: </label>
				<input type="text" size="50" maxlength="250" id="id" name="id" readonly="readonly" value="<?php echo $id ?>" /></p>

				<!-- Nom de l'actualité -->
				<p><label for= "titre" class="required">Titre de l'actualité: </label>
				<input type="text" size="50" maxlength="250" id="titre" name="titre" required="required" value="<?php echo $titre ?>" /></p>

				<!-- Texte de l'actualité -->
				<p><label for= "texte" class="required">Texte de l'actualité: </label>
				<input type="text" size="50" maxlength="250" id="texte" name="texte" required="required" value="<?php echo $texte ?>" /></p>

				<!-- date de l'actualité -->
				<p><label for= "date" class="required">Date de l'actualité: </label>
				<input type="date" size="50" maxlength="250" id="date" name="date" required="required" value="<?php echo $date_FR ?>" /></p>

				<!-- Auteur de l'actualité -->
				<p><label for= "auteur" class="required">auteur de l'actualité: </label>
				<input type="auteur" size="50" maxlength="250" id="auteur" name="auteur" required="required" value="<?php echo $auteur ?>" /></p>

				<!-- compteur de l'actualité -->
				<p><label for= "compteur" class="required">Compteur de l'actualité: </label>
				<input type="compteur" size="50" maxlength="250" id="compteur" name="compteur" required="required" value="<?php echo $compteur ?>" /></p>

				<!-- Envoyer vers le traitement de formulaire: ajout_animaux_BDD_traitement.php -->
				<p><label for="envoi"></label>
				<input type="submit" value="Envoyer" id="envoi" ></p>

				<!-- Effacer la saisie -->
				<p><label for="effacer"></label>
				<input type="reset" value="Effacer" id="effacer" > </p>

			</form>

<?php
		}
	}
	
	//Si ce n'est pas un administrateur: redirection vers l'accueil
	else{
		header("Location: ../index.php");
	}
	include ("../include/footer.php");
?>