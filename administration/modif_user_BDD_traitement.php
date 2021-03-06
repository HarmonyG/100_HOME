<!-- Insertion des includes -->
<?php
	$titre="";
	include ("../include/header.php");
	include ("../include/menu.php");
	include ("../include/connexion.php");

	// Si l'utilisateur est administrateur il pourra accéder ces pages sinon non : sécuriser si on entre le lien hors admin
	if (isset($_SESSION['pseudo'])){
		if($_SESSION['pseudo'] == "administrateur"){

			// récupération des variables postées dans le formulaire
			$id=strip_tags($_POST['id']);	
			$pseudo= strip_tags($_POST['pseudo']);
			$mdp= strip_tags($_POST['mdp']);
			$sexe= strip_tags($_POST['sexe']);
			$email= strip_tags($_POST['email']);

			// requete de modification et envoi
			$requete = "UPDATE utilisateurs SET id='$id',pseudo = '$pseudo', mdp = '$mdp', sexe = '$sexe', email = '$email' WHERE id = $id";
			$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

			// Message de confirmation
			echo '<p>Merci, l\'utilisateur '.$pseudo.' a bien été modifié</p>';

			// nombre d'enregistrements dans la table événement
			$requete = "SELECT COUNT(id) as nb FROM utilisateurs";
			$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
			$ligne = $result->fetch_assoc();
			$nb = $ligne['nb'];

			echo 'Il y a maintenant '.$nb.' utilisateur(s) dans la base de données';

			//Retour à l'accueil ou modifier un autre animal
			echo '<p><a href="../index.php">Retourner à la page d\'acceuil</a></p>
				  <p><a href="/administration/modif_user_BDD_tableau.php">Modifier un autre utilisateur </a></p>';
		}
	}

	//Si ce n'est pas un administrateur: redirection vers l'accueil
	else{
		header("Location: ../index.php");
	}

	//Insertion du pied de page
	include ("../include/footer.php");
?>