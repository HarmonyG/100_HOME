		<?php
$titre="";
include ("../include/header.php");
include ("../include/menu.php");
?>

<p>Certains aliments peuvent être nocifs pour vos animaux, voici un récapitulatif des principaux aliments et risques. </p>

<TABLE BORDER="1"> 
  	<CAPTION> <h3> Aliments nocifs pour les animaux </h3> </CAPTION> 	
  	<TR> 
 		<TH>  </TH> 
 		<TH>  Causes </TH>
 		<TH>  Symptômes </TH>
 		<TH>  Animaux concernés </TH> 
 	</TR> 
  
  	<TR> 
 		<TH> Le chocolat </TH> 
 		<TD> La Théobromine passant par le sang peut tuer votre animal </TD> 
 		<TD> Vomissements, diarrhée, troubles cardiaques entrainant la mort </TD> 
 		<TD> Chiens, chats </TD> 
 	</TR>

 	<TR>
 		<TH> Les produits laitiers </TH> 
 		<TD> Un excédent de lactose peut entrainer des soucis digestif chez votre animal </TD> 
 		<TD>  Diarrhée, problèmes intestinaux </TD> 
 		<TD>  Chiens, chats </TD> 
 	</TR>

 	<TR>
 		<TH> Les viandes grasses </TH> 
 		<TD> Riches en lipide et sel, elles peuvent entrainer des soucis au pancréas et à l'estomac </TD> 
 		<TD>  Pancréatites, torsions de l'estomac pouvant entrainer la mort </TD> 
 		<TD>  Chiens, chats </TD> 
 	</TR>

 	<TR>
 		<TH> Le foie </TH> 
 		<TD> Un excédent de foie peut générer une intoxication à la vitamine A </TD> 
 		<TD>  Destructions des muscles et os, constipation et perte de poids </TD> 
 		<TD>  Chiens </TD> 
 	</TR>

 	<TR>
 		<TH> Les oignons et l'ail </TH> 
 		<TD> Attaquent les globules rouges </TD> 
 		<TD>  Anémie, vomissements, tachycardie pouvant aller jusqu'à la mort </TD> 
 		<TD>  Chiens, chats </TD> 
 	</TR>

 	<TR>
 		<TH> Les noix de macadamia</TH> 
 		<TD> Contiennent une toxine détruisant le système digestiof, nerveux et les os </TD> 
 		<TD>  Vomissements, diarrhées, difficultés respiratoires, étouffements, convulsions </TD> 
 		<TD>  Chiens, chats </TD> 
 	</TR>

 	 <TR>
 		<TH> Certaines croquettes </TH> 
 		<TD> Trop riche en protéines et gras </TD> 
 		<TD> Attaque le foie ou les reins </TD> 
 		<TD>  Chiens, chats </TD> 
 	</TR>
 	 
 	 <TR>
 		<TH> Le thon </TH> 
 		<TD> Riche en sel </TD> 
 		<TD> Attaque le foie, les reins et peut générer des troubles cardiaques </TD> 
 		<TD>  Chiens, chats </TD> 
 	</TR>

 	 <TR>
 		<TH> Le poisson cru </TH> 
 		<TD> Conduit à une déficience en vitamine B </TD> 
 		<TD> Perte d'appétit, de poids et parfois au décès </TD> 
 		<TD>  Chiens </TD> 
 	</TR>
 	 
 	 <TR>
 		<TH> L'avocat </TH> 
 		<TD> Riche en graisses. Le noyau est toxique car riche en persine </TD> 
 		<TD> Inflammation du pancréas, attaque les poumons, le coeur et le noyau peut engendrer une occlusion intestinale</TD> 
 		<TD>  Chiens, chats </TD> 
 	</TR>

</TABLE>

Si vous avez un doute sur un aliment, <a href="/contact/index.php">n'hésitez pas à nous contacter </a>

<form method="POST" name="conseils" id="conseils" action="index.php">  
		<label for="envoi"></label>
		<input type="submit" value="Retour aux conseils" id="envoi" ><br />
</form>


<?php
include ("../include/footer.php");
?>