<?php
$titre="";

// Déterminera si tous les champs sont OK
$validation=0;
include ("../include/header.php");
include ("../include/menu.php");
include ("../include/connexion.php");

//Variable d'erreur
$erreur = false;

//Récupération des variables
$pseudo= strip_tags($_POST['pseudo']);
$mdp   = strip_tags($_POST['mdp']);
$mdp2  = strip_tags($_POST['mdp2']);
$sexe  = strip_tags($_POST['sexe']);
$email = strip_tags($_POST['email']);
$lu_accepte = strip_tags($_POST['lu_accepte']);


//Contrôle: si toutes les variables sont présentes: traitement des erreurs
if (isset($pseudo) && isset($mdp) && isset($mdp2) && isset($sexe) && isset($email) && !empty($lu_accepte)){	

	// --------- Contrôle si le pseudo existe : si on compte 1 retour, le pseudo existe --------- //
	$requet = "SELECT COUNT(*) AS nb FROM utilisateurs WHERE pseudo='$pseudo'";
	$resultat = $connexion->query($requet) or die ('Erreur '.$requet.' '.$connexion->error);
	$ligne = $resultat->fetch_assoc();
	$pseudo_ok = $ligne['nb'];

	// Existe
	if ($pseudo_ok > 0) {
		echo '<p class="erreur"> Ce pseudo existe déjà, veuillez entrer un autre pseudo </p>';
		$erreur = true;
	}

	// Si le pseudo est trop court
	if (strlen($pseudo) < 7) {
		echo '<p class="erreur"> Veuillez entrer un nom d\'utilisateur d\'au moins 7 caractères </p>';
		$erreur = true;
	}

	// Incrémentation de validation 
	else if ($pseudo_ok == 0 && strlen($pseudo)>=7) {
		$validation=$validation+1;
	}

	// --------- Test sur longueur mot de passe --------- //
	if (strlen($mdp) < 7) {
		echo '<p class="erreur"> Veuillez entrer un mot de passe de 7 caractères minimum  </p>';
		$erreur = true;
	}

	else{
		// echo '<p class="cxReussie"> Mot de passe supérieur à 7 caractères</p>';
	
		// Contrôle sur les deux mots de passe : identiques ou non
		if (strcasecmp($mdp, $mdp2) != 0) {
			echo '<p class="erreur"> Mots de passe non identiques </p>';
			$erreur = true;
		}

		else {
		$validation=$validation+1;
		}

	}

	//# ------- Contrôle du sexe -------- //
	if (isset($_POST['sexe'])){
	    
	    $sexe=$_POST['sexe'];
	}


	// ---------  Contrôle si le mail existe déjà --------- //
	$requete = "SELECT COUNT(*) AS nb FROM utilisateurs WHERE email='$email'";
	$result  = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
	$ligne   = $result->fetch_assoc();
	$mail_ok = $ligne['nb'];

	// Existe
	if ($mail_ok > 0) {
		echo '<p class="erreur"> Cette adresse e-mail existe déjà, veuillez vous connecter</p>';
		$erreur = true;
	}

	else{
    	$validation=$validation+1;
	}
}

if ($validation <3){
?>
	<form method="POST" action="traitement_inscription.php" name="inscription" id="formulaire"> 

	<label for="pseudo" class="required">  Nom utilisateur :</label>
	<input type="text" name="pseudo" id="pseudo" maxlength="20" value="<?php echo $pseudo ?>" required="required"> <br/> 

	<label for="mdp" class="required">  Entrez un mot de passe :</label>
	<input type="password" name="mdp" id="mdp" maxlength="20" value="<?php echo $mdp ?>" required="required"> <br/>

	<label for="mdp2" class="required">  Confirmer votre mot de passe :</label>
	<input type="password" name="mdp2" id="mdp2" maxlength="20" value="<?php echo $mdp2 ?>" required="required"> <br/>

	<label for="sexe">  Sexe :</label>	
	<select name="sexe"> 
	<option value="H" selected="selected"> Homme </option>
	<option value="F"> Femme </option> 
	</select> <br/>

	<label for="email" class="required">  E-mail :</label>
	<input type="email" name="email" id="email" maxlength="50" value="<?php echo $email ?>" required="required"> <br/>

	<label for="lu_accepte"></label>
	<input type="checkbox" checked="checked" value="1" id="lu_accepte" name="lu_accepte" >  J'ai lu et j'accepte les <a href="conditions_utilisation.php" target="_blank">conditions d'utilisation* </a><br>

	<label for="envoi"></label>
	<input type="submit" value="S'inscrire" id="envoi" ><br />
	
	</form>
<?php
	$erreur = true;

}

//###	Affichage du lien de retour au formulaire s'il y une erreur dans les infos saisies ###
if (!$erreur) {
	echo '<p>Pas d\'erreur. Inscription de l\'internaute!</p>';
	//Récupère la date du jour
	//$dateAuj = date("Y/m/d");

	// //Vérifie que checkbox admin a été cochée
	// if (!empty($admin)) {
	// 	$admin = true;
	// 	$requete = "INSERT INTO membre(sexe, pseudo, email, mdp, datecreation, admin) VALUES('$sexe', '$pseudo', '$email', '$mdp', '$dateAuj', '$admin')";
	// 	$result  = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
	// }else{
	// 	$admin = false;
	 	$requete = "INSERT INTO utilisateurs(pseudo, mdp, sexe, email) VALUES('$pseudo', '$mdp', '$sexe', '$email')";
	 	$result  = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
	// }


	// Message affiché à l'utilisateur
	echo '<p>Félicitations '.$pseudo.', votre compte a bien été créé.</p>
	<p><a href="../index.php">Retourner à la page d\'acceuil</a></p>';
}

include ("../include/footer.php");
?>