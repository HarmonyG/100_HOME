Insertion des includes de l'entête et du menu
<?php
$titre="";
include ("../include/header.php");
include ("../include/menu.php");

// Liste des différents modules
echo 'Bienvenu dans la partie administration, veuillez choisir ce que vous voulez faire :
	<ul>
        <li><a href="/administration/ajout_animaux_BDD.php">Ajouter un animal</a></li>
        <li><a href="/administration/modif_animaux_BDD_tableau.php">Modifier un animal</a></li>
        <li><a href="/administration/suppression_animaux_BDD_tableau.php">Suppression d\'un animal</a></li>
        <li><a href="/administration/modif_user_BDD.php">Modification d\'un utilisateur</a></li>
		<li><a href="/administration/suppression_user_BDD.php">Suppression d\'un utilisateur</a></li>
	</ul>';

// insertion du pied de page
include ("../include/footer.php");
?>