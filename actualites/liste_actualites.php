<?php 
	// Introduction des includes
	$titre = '';
	include("../include/header.php");
	include("../include/menu.php");
	include("../include/connexion.php");

	//liste des dernières actualités
	$requete="SELECT date,titre,id from actualites";
	$result  =$connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

	//Récupération des variables, changement de la date EN en FR et affichage en liste
	while($ligne = $result->fetch_assoc()){
		$data=($ligne['date']);
		$titre=$ligne['titre'];
		
		list($annee, $mois, $jour) = explode("-", $data);
		$data= $jour.'.'.$mois.'.'.$annee;
		
		echo '<ul>';
	 		echo '<li>'.$data.' - '.$titre.' <a href="details_actualites.php?id='.$ligne['id'].'"> Lire la suite </a></li>';
		echo '</ul>';
	

	}

	//Insertion du pied de page
	include ("../include/footer.php");
?>