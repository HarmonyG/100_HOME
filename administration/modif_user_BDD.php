<!-- Insertion des include: en-tête, du menu et de la connexion -->
<?php
	$titre="";
	include ("../include/header.php");
	include ("../include/menu.php");
	include ("../include/connexion.php");

	// Si l'utilisateur est administrateur il pourra accéder ces pages sinon non : sécuriser si on entre le lien hors admin
	if (isset($_SESSION['pseudo'])){
		if($_SESSION['pseudo'] == "administrateur"){
			//Titre
			echo 'Modification de l\'utilisateur sélectionné';

			//Récupération de l'id et de ses données
			$id = $_GET['id'];
			$requete = "SELECT * FROM utilisateurs WHERE id = $id";
			$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
			$ligne = $result->fetch_assoc();

			//Récupération des données
			$pseudo = $ligne['pseudo'];
			$mdp = $ligne['mdp'];
			$sexe = $ligne['sexe'];
			$email =$ligne['email'];
			$id = $ligne['id'];

			//Remise en place du formulaire avec récupération des données
?>
			<form method="POST" action="/administration/modif_user_BDD_traitement.php">
			
				<!-- Id de l'utilisateur -->
				<p><label for= "id" class="required">id de l'utilisateur: </label>
				<input type="text" size="50" maxlength="250"id="id" name="id" readonly="readonly" value="<?php echo $id ?>" /></p>

				<!-- Nom de l'utilisateur -->
				<p><label for= "pseudo" class="required">Nom de l'utilisateur: </label>
				<input type="text" size="50" maxlength="250"id="pseudo" name="pseudo" required="required" value="<?php echo $pseudo ?>" /></p>

				<!-- Mot de passe -->
				<p><label for= "mdp" class="required">Mot de passe: </label>
				<input type="text" size="50" maxlength="250"id="mdp" name="mdp" required="required" value="<?php echo $mdp ?>" /></p>

				<!-- Sexe -->
				<p><label for= "sexe">Sexe: </label>
				<select name="sexe">
					<option value="H" selected="selected"> Homme </option>
					<option value="F"> Femme </option> 
				</select></p>

				<!-- Email -->
				<p><label for= "email" class="required">Email de l'utilisateur: </label>
				<input type="email" size="50" maxlength="250"id="email" name="email" required="required" value="<?php echo $email ?>" /></p>

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