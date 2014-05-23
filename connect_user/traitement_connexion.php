<?php
// session_start();
$titre="";
$ok="1";
$no_validation=4;
include ("../include/header.php");
include ("../include/menu.php");
include ("../include/connexion.php");

$pseudo=strip_tags($_POST['pseudo']);
$mdp=strip_tags($_POST['mdp']);
$resteConnecte=strip_tags($_POST['resteConnecte']);


// // Contrôle du pseudo: non renseigné
if ($pseudo == ''){
	echo' Veuillez entrer votre nom d\'utilisateur<br/>'; 
	$no_validation=$no_validation-1;
}


// Contrôle du mot de passe: non renseigné
if ($mdp=='' ){
	echo' Mot de passe non renseigné <br/>';
	$no_validation=$no_validation-1;
}

// Contrôle du pseudo et du mot de passe: déjà existant dans la base avec le même id
else if ($mdp !='' && $pseudo !=''){
	$requet= "SELECT pseudo,mdp FROM utilisateurs where mdp='$mdp' and pseudo='$pseudo'";
	$resultat  = $connexion->query($requet) or die ('Erreur '.$requet.' '.$connexion->error);
	$ligne=$resultat->fetch_assoc();    
	$mdp_base = $ligne['mdp'];
	$pseudo_base = $ligne['pseudo'];

	if ($pseudo==$pseudo_base && $mdp==$mdp_base){
		$requeta= "SELECT id FROM utilisateurs where pseudo='$pseudo_base'";
		$resulta  = $connexion->query($requeta) or die ('Erreur '.$requeta.' '.$connexion->error);
		$ligne=$resulta->fetch_assoc();    
		$id = $ligne['id'];
		$requetee= "SELECT id FROM utilisateurs where mdp='$mdp_base'";
		$resultatt  = $connexion->query($requetee) or die ('Erreur '.$requetee.' '.$connexion->error);
		$ligne=$resultatt->fetch_assoc();    
		$id_mdp = $ligne['id'];
		// echo $id_mdp;
		// echo $id;

		if ($id == $id_mdp){
			echo 'connexion réussie ';
			$_SESSION['id'] = $id;
			$_SESSION['pseudo'] = $pseudo_base;
			//Mémorisation du point de départ de la session
			$_SESSION['start']  = time();
			$_SESSION['expire'] = $_SESSION['start'] + (30 * 60) ; //Fin de session à 30 minutes
			echo $pseudo_base;

			//Test si 'se souvenir de moi' coché
		   	if (isset($resteConnecte)){
		   		$id = $_SESSION['id'];
		   		$nomCookie = "100home_$id";
				$expire = time() + 365*24*3600;
				setcookie($nomCookie, $_SESSION['pseudo'], $expire);
				echo 'coookie : ' . $nomCookie. ' Expire dans : ' . $expire;
			}
			header("Location: ../index.php");
		}
	}

	else{
	echo 'Le nom ou le mot de passe est incorrect';
	$no_validation=$no_validation-1;
	}
}

if ($no_validation <4){
		?>
	<h3> Connexion </h3>
	<form method="POST" action="traitement_connexion.php" name="connexion" id="formulaire"> 

	<label for="pseudo">  Nom utilisateur :</label>
	<input type="text" name="pseudo" id="pseudo" maxlength="20" value="<?php echo $pseudo ?>"> <br/>

	<label for="mdp">  Entrez un mot de passe :</label>
	<input type="password" name="mdp" id="mdp" maxlength="20" value=""> <br/>

	<a href="oubli_mdp.php">  Mot de passe oublié  </a> <br/>
	<a href="../inscription/index.php">  Devenez membre </a> <br/><br/>


	<label for="envoi"></label>
	<input type="submit" value="Connexion" id="envoi" ><br />

	</form>

<?php
}


include ("../include/footer.php");
?>