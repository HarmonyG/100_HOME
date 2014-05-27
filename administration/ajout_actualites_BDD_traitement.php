<!-- Insertion des includes de l'en-tête, du menu et de la connexion -->
<?php 
	include("../include/header.php");
	include("../include/menu.php");
	include("../include/connexion.php");

	// Si l'utilisateur est administrateur il pourra accéder ces pages sinon non : sécuriser si on entre le lien hors admin
	if (isset($_SESSION['pseudo'])){
		if($_SESSION['pseudo'] == "administrateur"){

			// real_escape_string: permet d'intégrer les caractères spéciaux
			$titre=$connexion->real_escape_string($_POST['titre']);
			$texte=$connexion->real_escape_string($_POST['texte']);
			$auteur=$connexion->real_escape_string($_POST['auteur']);

			// Insertion de l'actualité
			$requete = "INSERT INTO actualites (titre,texte,auteur,date) VALUES ('$titre','$texte','$auteur',NOW()) ";
			$result  = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

			//Confirmation de l'ajout
			echo'<p> Merci, l actualité '.$titre. ' a bien été ajoutée! </p>';
		}
	}
	
	//Si ce n'est pas un administrateur: redirection vers l'accueil
	else{
		header("Location: ../index.php");
	}

	//Inserion du pied de page
	include ("../include/footer.php");
?>

