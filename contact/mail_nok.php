<?php
$titre="";
include ("../include/header.php");
include ("../include/menu.php");
?>
Votre message n'a pas été envoyé, veuillez recommencer.

<form method="POST" action="/index.php" name="inscription" id="formulaire">
	<label for="retour"></label>
	<input type="submit" value="Retour à l'envoi d'un message" id="retour" ><br />
</form>

<?php
include ("../include/footer.php");
?>

