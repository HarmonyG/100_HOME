<?php
$titre="";
include ("../include/header.php");
include ("../include/menu.php");
?>


<img src="/images/adoption_chien.jpg" alt="adoption_chien" id="adoption_chien" height="100" />

<h3> Vous avez adopté un chien </h3>
<p> Félicitation pour votre nouveau membre dans la famille! Nous allons vous expliquer ci-dessus l'essentiel à savoir concernant le parcours à suivre après une adoption.
Tout d'abord, en arrivant chez vous, faîtes visiter le lieu à votre nouveau chien. Laisser le libre et découvrir son nouvel havre de pain à son rythme. Attention, ne lui faîtes
visiter que les endroits où il aura le droit d'aller. Présentez-lui également tout les membres de la famille (humains et autres animaux). Si vos autres animaux sont 
réticents face à ce nouveau membre, ne forcez pas les choses, allez-y progressivement et si possible dans un endroit neutre. Montrez-lui ensuite ses affaires: panier, gamelle et jouets. <p>

<p>Quelques règles essentielles: </p>
<p>Les premiers jours, votre chien peut se montrer timide, c'est normal: il s'adapte petit à petit à son nouvel environnement. Ne le brusquez pas!
Il faudra ensuite lui apprendre ce qui est permis et interdit. Favorisez l'apprentissage par le jeu et les récompenses. 
Votre chien doit être sorti au minimum trois fois dans la journée. L'idéal étant une ballade en forêt afin qu'il puisse se défouler. Avant de lâcher votre chien en forêt
veuillez à ce qu'il comprenne vos ordres. Pour l'alimentation: veuillez à lui laisser à heures régulières l'alimentation. Prenez le temps nécessaire pour vous occuper de lui :
un chien a besoin de tendresse! </p>

<p> Vous avez des questions? N'hésitez pas à faire appel à un comportementaliste canin. Sachez également que toute l'équipe de 100HOME reste à votre disposition
si vous avez besoin de conseils ou rencontrez des difficultés. </p>

 
<form method="POST" name="conseils_adoption" id="conseil_adoption" action="conseils_adoption.php">  
		<label for="envoi"></label>
		<input type="submit" value="Lisez également les conseils de santé et soins" id="envoi" ><br />
</form>

<form method="POST" name="conseils" id="conseils" action="index.php">  
		<label for="envoi"></label>
		<input type="submit" value="A savoir avant d'adopter" id="envoi" ><br />
</form>

<?php
include ("../include/footer.php");
?>