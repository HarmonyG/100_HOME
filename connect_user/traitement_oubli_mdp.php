<?php
$titre="";
include ("../include/header.php");
include ("../include/menu.php");
include ("../include/connexion.php");


// Récupération variable
$email=strip_tags($_POST['email']);

//Contrôle si saisie à vide
if ($email==''){
	echo 'Veuillez entrer une adresse mail';
?>

	<!-- Retour du formulaire de saisie -->
	<h3> Mot de passe perdu? </h3>
	<form method="POST" action="traitement_oubli_mdp.php" name="oubli_mdp" id="oubli_mdp"> 

		<label for="email">  Veuillez entrer l'e-mail correspondant à votre compte </label> <br/><br/>
		<input type="text" name="email" id="email" maxlength="50" > <br/>

		<label for="envoi"></label>
		<input type="submit" value="Envoi" id="envoi" ><br />
		
	</form>

<?php
}

//Si la saisie n'est pas à vide: on recherche l'email dans la base de données
else if ($email !=''){
	$requet= "SELECT email FROM utilisateurs where email='$email'";
	$resultat  = $connexion->query($requet) or die ('Erreur '.$requet.' '.$connexion->error);
	$ligne=$resultat->fetch_assoc();    
	$email_user = $ligne['email'];


	if ($email==$email_user){
		//Renvoi du mail


	}

	else{
		echo 'Mail non présent dans notre base';
?>

		<form method="POST" action="oubli_mdp.php" name="oubli_mdp" id="oubli_mdp"> 
			<label for="envoi"></label>
			<input type="submit" value="Réessayer" id="reesayer" ><br />
		</form>

		<form method="POST" action="../index.php" name="accueil" id="acceuil"> 
			<label for="envoi"></label>
			<input type="submit" value="Retour à l'accueil" id="accueil" ><br />
		</form>
<?php
	}
}

include ("../include/footer.php");
?>