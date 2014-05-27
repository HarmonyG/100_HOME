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
			$titre= strip_tags($_POST['titre']);
			$texte= strip_tags($_POST['texte']);
			$auteur= strip_tags($_POST['auteur']);
			$date= strip_tags($_POST['date']);
			$compteur= strip_tags($_POST['compteur']);

			// requete de modification et envoi
			$requete = "UPDATE actualites SET id='$id',titre = '$titre', texte = '$texte', auteur = '$auteur', date = '$date', compteur = '$compteur' WHERE id = $id";
			$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

			// Message de confirmation
			echo '<p>Merci, l\'actualité '.$titre.' a bien été modifié</p>';

			// nombre d'enregistrements dans la table événement
			$requete = "SELECT COUNT(id) as nb FROM actualites";
			$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
			$ligne = $result->fetch_assoc();
			$nb = $ligne['nb'];

			echo 'Il y a maintenant '.$nb.' actualités dans la base de données';

			//Retour à l'accueil ou modifier un autre animal
			echo '<p><a href="../index.php">Retourner à la page d\'acceuil</a></p>
				  <p><a href="/administration/modif_actualites_BDD_tableau.php">Modifier une autre actualité </a></p>';
		}
	}

	//Si ce n'est pas un administrateur: redirection vers l'accueil
	else{
		header("Location: ../index.php");
	}

	//Isertion du pied de page
	include ("../include/footer.php");
?>