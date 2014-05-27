<!-- Insertion des include: en-tête, du menu et de la connexion -->
<?php
	include ("../include/header.php");
	include ("../include/menu.php");
	include ("../include/connexion.php");

	// Si l'utilisateur est administrateur il pourra accéder ces pages sinon non : sécuriser si on entre le lien hors admin
	if (isset($_SESSION['pseudo'])){
		if($_SESSION['pseudo'] == "administrateur"){

			//Titre et récupération de l'id
			echo 'Suppression d\'un utilisateur';
			$id = $_GET['id'];

			// requete d'ajout d'adherents
			$requete = " DELETE from utilisateurs WHERE id = $id";
			$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

			// Confirmation de la suppression de l'utilisateur
			echo '<ul><p>L\'utilisateur a bien été supprimé </p></ul>';

			// nombre d'enregistrements dans la table événement
			$requete = "SELECT COUNT(id) as nb FROM utilisateurs";
			$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
			$ligne = $result->fetch_assoc();
			$nb = $ligne['nb'];

			echo '<ul><p>Il y a maintenant '.$nb.' utilisateu(s) dans la base de donnée !</p></ul>';

			//Retour à l'accueil ou supprimer un autre utilisateur
			echo '<p><a href="../index.php">Retourner à la page d\'acceuil</a></p>
				  <p><a href="/administration/suppression_user_BDD_tableau.php">Suppression un autre utilisateur </a></p>';
		}
	}

	//Si ce n'est pas un administrateur: redirection vers l'accueil
	else{
		header("Location: ../index.php");
	}
	
	//Insertion du pied de page
	include ("../include/footer.php");
?>