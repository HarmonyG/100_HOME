<!-- Insertion des includes -->
<?php
	$titre="";
	include ("../include/header.php");
	include ("../include/menu.php");
	include ("../include/connexion.php");

	// Si l'utilisateur est administrateur il pourra accéder ces pages sinon non : sécuriser si on entre le lien hors admin
	if (isset($_SESSION['pseudo'])){
		if($_SESSION['pseudo'] == "administrateur"){

			//Récupération de l'id
			$id = $_GET['id'];
			// Ajout en mode administrateur: un administrateur est marqué "1" dans la base de données
			$admin = 1;

			// requete de modification et envoi
			$requete = "UPDATE utilisateurs SET admin='$admin' WHERE id = $id";
			$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

			// Message de confirmation
			echo '<p>Merci, l\'utilisateur est maintenant un administrateur</p>';

			// nombre d'enregistrements dans la table événement
			$requete = "SELECT count(admin) as nb FROM utilisateurs where admin=1";
			$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
			$ligne = $result->fetch_assoc();
			$nb = $ligne['nb'];

			echo 'Il y a maintenant '.$nb.' administrateurs dans la base de données';

			//Retour à l'accueil ou modifier un autre animal
			echo '<p><a href="../index.php">Retourner à la page d\'acceuil</a></p>
				  <p><a href="/administration/ajout_administrateur_BDD_tableau.php">Ajouter un autre administrateur </a></p>';
		}
	}

	//Si ce n'est pas un administrateur: redirection vers l'accueil
	else{
		header("Location: ../index.php");
	}

	//Isertion du pied de page
	include ("../include/footer.php");
?>