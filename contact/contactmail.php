<?php
$titre="";
include ("../include/header.php");
include ("../include/menu.php");

$adresse = "100home.asso@gmail.com";
$site = "www.100HOME.fr";  				// changer l'adresse du site

$TO = $adresse;

$head = "From: ".$adresse."\n";
$head .= "X-Sender: <".$adresse.">\n";
$head .= "X-Mailer: PHP\n";
$head .= "Return-Path: <".$adresse.">\n";
$head .= "Content-Type: text/plain; charset=iso-8859-1\n";

$sujet = "Demande de renseignements";

$informations = 
"Nom: ".$_POST['nom']." \r\n
Prénom: ".$_POST['prenom']." \r\n
Email du formulaire: ".$_POST['email']." \r\n
Sujet du formulaire: ".$_POST['sujet']."\r\n
Message: ".$_POST['message']." \r\n ";

$res = mail($TO, $sujet ,$informations, $head);

if (true == $res) {
Header("Location: http://".$site."/contact/mail_ok.php" );
} 
else {
Header("Location: http://".$site."/contact/mail_nok.php" );
}

include ("../include/footer.php");
?>

