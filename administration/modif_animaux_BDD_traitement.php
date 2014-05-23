<!-- Insertion des includes -->
<?php
$titre="";
include ("../include/header.php");
include ("../include/menu.php");
include ("../include/connexion.php");

// récupération des variables postées dans le formulaire
$id=strip_tags($_POST['id_animal']);	
$nom= strip_tags($_POST['nom_animal']);
$espece= strip_tags($_POST['espece']);
$taille= strip_tags($_POST['taille']);
$race= strip_tags($_POST['race']);
$sexe= strip_tags($_POST['sexe_animal']);
$date_naissance_animal= strip_tags($_POST['date_naissance_animal']);
$sauvetage= strip_tags($_POST['sauvetage']);

// requete de modification et envoi
$requete = "UPDATE animaux SET id='$id',nom = '$nom', espece = '$espece', taille = '$taille', race = '$race', sexe = '$sexe', date_naissance='$date_naissance_animal', sauvetage ='$sauvetage' WHERE id = $id";
$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

// ok
echo '<p>Merci, l\'animal '.$nom.' a bien été modifié</p>';

// nombre d'enregistrements dans la table événement
$requete = "SELECT COUNT(id) as nb FROM animaux";
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
$ligne = $result->fetch_assoc();
$nb = $ligne['nb'];

echo 'Il y a maintenant '.$nb.' animaux dans la base de données';

//Retour à l'accueil ou modifier un autre animal
echo '<p><a href="../index.php">Retourner à la page d\'acceuil</a></p>
	  <p><a href="/administration/modif_animaux_BDD_tableau.php">Modifier un autre animal </a></p>';



include ("../include/footer.php");
?>