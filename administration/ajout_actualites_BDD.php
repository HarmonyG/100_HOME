<!-- Insertion des includes en-tête,menu et connexion -->
<?php
	$titre = "";
	include ("../include/header.php");
	include ("../include/menu.php");
	include ("../include/connexion.php");

	// Si l'utilisateur est administrateur il pourra accéder ces pages sinon non : sécuriser si on entre le lien hors admin
	if (isset($_SESSION['pseudo'])){
		if($_SESSION['pseudo'] == "administrateur"){
	?>	
			<!-- Insertion du formulaire -->
			<h3> Formulaire </h3><br/>
			<form method="POST" action="ajout_actualites_BDD_traitement.php"> 

				<!-- Insertion du titre -->
				<label for="titre" class="required">  Titre : </label>
				<input type="text" name="titre" id="titre" maxlength="250" size="100" required="required"/><br /> 

				<!-- Insertion du texte -->
				<label for="texte" class="required"> Texte : </label>
				<textarea id="text" name="texte" cols="80" rows="10" required="required"></textarea><br /> <br />

				<!-- Insertion de l'auteur -->
				<label for="auteur" class="required">  Auteur : </label>
				<input type="text" name="auteur" id="auteur"  maxlength="250" size="100" required="required"/><br />  

				<!-- Envoi des données -->
				<label for="envoi"></label>
				<input type="submit" value="Envoyer" id="envoi"/><br /> 
				
				<!-- Effacer les données -->
				<label for="Effacer"></label>
				<input type="reset" id="Effacer"/><br /> 
		   
		    </form>
	<?php
		}
	}

	//Si ce n'est pas un administrateur: redirection vers l'accueil
	else{
		header("Location: ../index.php");
	}

	// Insertion du pied de page 
	include ("../include/footer.php");
?>

