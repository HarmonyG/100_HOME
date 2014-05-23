<?php
$titre="";
include ("../include/header.php");
include ("../include/menu.php");
?>

<h3> Vous avez perdu votre animal </h3>

<p>Tout d'abord s'il est tatoué/pucé, téléphonez le fichier national canin ou félin pour signaler la disparition de votre animal. 
Si une personne retrouve votre compagnon, elle lui sera plus aisée d'obtenir vos coordonnées. </p>

<fieldset>
	<p>Qui contacter ? </p>

	<p>Fichier national canin </p>
	<p>155 avenue Jean-Jaurès, 93535 Aubervilliers. </p>
	<p>Tél. : 01 49 37 54 54. </p> 


	<p>Fichier national félin </p>
	<p>112-114 avenue Gabriel-Péri, 94246 L'Haÿ-les-Roses. </p>
	<p>Tél. : 01 55 01 08 08. </p>
</fieldset>


<p>Téléphonez à tous les organismes ou personnes susceptibles de receuillir votre animal. Prenez contact avec la gendarmerie, la mairie afin de connaître 
les coordonnées de la fourrière dont vous dépendez ou du SPA le plus proche. <p>

<p> Déposez des annonces chez les vétérinaires et commerçants aux alentours. </p>

<form method="POST" name="conseils" id="conseils" action="index.php">  
		<label for="envoi"></label>
		<input type="submit" value="Retour aux conseils" id="envoi" ><br />
</form>

<?php
include ("../include/footer.php");
?>