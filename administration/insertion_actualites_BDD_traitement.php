<!-- Insertion des includes de l'en-tête, du menu et de la connexion -->
<?php 
	$titre = '';
	include("../include/header.php");
	include("../include/menu.php");
	include("../include/connexion.php");

	// real_escape_string: permet d'intégrer les caractères spéciaux
	$titre=$connexion->real_escape_string($_POST['titre']);
	$texte=$connexion->real_escape_string($_POST['texte']);
	$auteur=$connexion->real_escape_string($_POST['auteur']);

	// Insertion de l'actualité
	$requete = "INSERT INTO actualites (titre,texte,auteur,date) VALUES ('$titre','$texte','$auteur',NOW()) ";
	$result  = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

	//Confirmation de l'ajout
	echo'<p> Merci, l actualité '.$titre. ' a bien été ajoutée! </p>';

include ("../include/footer.php");
?>

