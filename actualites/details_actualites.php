<!-- Introduction des include en tête, menu et connexion -->
<?php 
	include("../include/header.php");
	include("../include/menu.php");
	include("../include/connexion.php");

	// Récupération ID
	$id=$_GET['id'];

	// //Cookies
	// $nomcookie = "actu_$id";
	// // test sur la présence du cookie
	// if (isset($_COOKIE[$nomcookie])) {
	// 	// cookie existe => visite déjà effectuée, on ne fait rien
	// }
	// else {
	// 	//insertion cookie pour non doublon
	// 	$expire = time()+3600*24*30;
	// 	setcookie("actu_$id", '1',$expire);
	// mise à jour du compteur de lecture
		$requete = "UPDATE actualites SET compteur = compteur + 1 WHERE id = $id";
		$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
	// }


	//requête qui liste l'actualitée souhaitée
	$requete="SELECT *from actualites where id=$id";
	$result  = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
	$ligne=$result->fetch_assoc();

	//Récupération des contenus des champs
	$titre = $ligne['titre'];
	$texte = nl2br($ligne['texte']); // nl2br : saut de ligne
	$date = date("d/m/Y",strtotime($ligne['date']));  
	$auteur = $ligne['auteur'];
	$compteur = $ligne['compteur'];

 	//Affichage
	echo "<h2>$date : $titre</h2>
	<p>$texte</p>
	<h4>Auteur : $auteur</h4>
	<p>Nombre de lectures : $compteur</p>
	";

	//Insertion du pied de page
	include("../include/footer.php");
	?>
	<!-- fin footer -->