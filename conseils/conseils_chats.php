<?php
$titre="";
include ("../include/header.php");
include ("../include/menu.php");
?>


<img src="/images/adoption_chat.jpg" alt="adoption_chat" id="adoption_chat" height="100" />

<h3> Vous avez adopté un chat </h3>

<p>Félicitation pour ce nouveau membre! Afin d'éviter à votre chat un stress important, veuillez le confiner dans une pièce, au calme, pendant quelques heures.
Laissez le sortir de lui-même de la cage. Mettez-vous dans le coin d'une pièce et n'hésitez pas à lui parlez, le laissez venir à vous. Votre chat va inspecter
chaque recoin de la pièce. Pensez à bien lui montrez où est située sa gamelle et sa litière. Lorsqu'au bout de quelques jours, vous sentez votre chat plus à l'aise
laissez le découvrir le reste de la maison. Au début, ne le laissez pas sortir dehors, il est indispensable qu'il s'adapte au préalable de son foyer. Attention
un chat ne doit pas être sorti s'il n'est pas stérilisé! </p>

<p>Quelques règles essentielles: </p>
<p>Le bac a litière doit être situé au calme, dans un endroit facilement accessible. Changez idéalement la litière tous les 3 jours, les excréments tous les jours.
Pour laver intégralement le bac, l'eau de javel est le produit le plus couramment utilisé. 
La nourriture doit être accessible en continu. Un chat se nourrit plusieurs fois par jours à des heures non régulières. La nourriture et l'eau doivent être loin de la litière.
Le stress ou le changement de nourriture peuvent provoquer la diarrhée à votre animal: un jour de diète devrait résoudre l'affaire, sinon venez consultez notre vétérinaire au refuge (pas de frais
de vétérinaire les 3 premières semaines suivants l'adoption). 
Prenez le temps de jouer avec votre chat: trouvez lui le stimuli adéquat!
Pour les griffes, l'idéal est d'investir dans un griffoir. Si votre chat fait ses griffes sur votre canapé ou autres endroits non autorisés: mettez lui un léger coup de doigt sur le museau.
</p>

<p> Vous avez des questions? N'hésitez pas à faire appel à un comportementaliste animalier. Sachez également que toute l'équipe de 100HOME reste à votre disposition
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
?>s