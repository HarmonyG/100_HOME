<!-- Insertion des include: en-tête, du menu et de la connexion -->
<?php
	include ("../include/header.php");
	include ("../include/menu.php");
	include ("../include/connexion.php");

	// Si l'utilisateur est administrateur il pourra accéder ces pages sinon non : sécuriser si on entre le lien hors admin
	if (isset($_SESSION['pseudo'])){
		if($_SESSION['pseudo'] == "administrateur"){
			echo 'Suppression d\'un animal';
			$id = $_GET['id'];

			// requete d'ajout d'adherents
			$requete = " DELETE from actualites WHERE id = $id";
			$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

			// Confirmation que l'animal a bien été supprimé
			echo '<ul><p>L\'actualité a bien été supprimée </p></ul>';

			// nombre d'enregistrements dans la table événement
			$requete = "SELECT COUNT(id) as nb FROM actualites";
			$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
			$ligne = $result->fetch_assoc();
			$nb = $ligne['nb'];

			echo '<ul><p>Il y a maintenant '.$nb.' actualites dans la base de donnée !</p></ul>';

			//Retour à l'accueil ou supprimer un autre animal
			echo '<p><a href="../index.php">Retourner à la page d\'acceuil</a></p>
				  <p><a href="/administration/suppression_actualites_BDD_tableau.php">Suppression une autre actualité </a></p>';
		}
	}

	//Si ce n'est pas un administrateur: redirection vers l'accueil
	else{
		header("Location: ../index.php");
	}
	
	//Insertion du pied de page
	include ("../include/footer.php");
?>