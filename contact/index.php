<?php
$titre="";
include ("../include/header.php");
include ("../include/menu.php");
?>

<h3> Contact </h3><hr/><br/>
Refuge 100HOME <br/>
Adresse: 36 voie d'issy <br/>
Code postal: 92240 <br/>
Ville: Malakoff <br/>
Téléphone: 06.18.43.25.28 <br/> <br/>
Vous pouvez également nous contacter en remplissant le formulaire ci-dessous.

	<fieldset style="width:500px">
	<form method="POST" name="contact mail" id="contactmail" action="contactmail.php">  
		<label for="nom" class="required">  Nom :</label>
		<input type="nom" name="nom" id="nom" maxlength="20" value="" required="required"> <br/>

		<label for="prenom" class="required">  Prénom :</label>
		<input type="prenom" name="prenom" id="prenom" maxlength="20" value="" required="required"> <br/>

		<label for="email" class="required">  E-mail :</label>
		<input type="email" name="email" id="email" maxlength="50" value="" required="required"> <br/>

		<label for="sujet" class="required">  Sujet :</label>
		<input type="sujet" name="sujet" id="sujet" maxlength="50" value="" required="required"> <br/>

		<label for="message" class="required">  Message :</label>
		<textarea name="message" rows="20" cols="80"> </textarea>

		<label for="envoi"></label>
		<input type="submit" value="Envoyer" id="envoi" ><br />

		<label for="effacer"></label>
		<input type="reset" value="Effacer" id="effacer" ><br />

	</form>
</fieldset>


<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5254.520076840706!2d2.285442556652854!3d48.815099709949095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e67086bca843d3%3A0xa1fe17b920dac9ac!2s36+Voie+d&#39;Issy!5e0!3m2!1sfr!2sfr!4v1400275764390" width="600" height="450" scrolling="no" frameborder="0" style="border:0"></iframe>


<?php
include ("../include/footer.php");
?>

