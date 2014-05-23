<!-- En-tête -->
<!-- **********************	DEBUT MODIFICATIONS ********************** -->
<?php
	/* Demarrage de la nouvelle session avant le DOCTYPE */
	session_start();

	if (isset($_COOKIE['pseudo'])){
		echo $_COOKIE['pseudo'];
		$_SESSION['pseudo'] = $_COOKIE['pseudo'];
	}

	if(isset($_SESSION['pseudo'])){
    	$now = time(); // récupère l'heure à laquelle l'internaute s'est connecté.
	    if($now > $_SESSION['expire']){
	        session_destroy();
	     	// echo "Votre session a expiré <a href='http://localhost/somefolder/login.php'>Se reconnecter</a>";
	    }
	    //Si cookie présent, reconnexion automatique
	}
?>	
<!-- ************************ FIN MODIFICATIONS ********************** -->

<!DOCTYPE HTML>
<!--[if IE 8]><html class="ie8" xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="fr" xml:lang="fr"><![endif]-->
<!--[if IE 9]><html class="ie9" xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="fr" xml:lang="fr"><![endif]-->
<html>
<head>
	<meta charset="UTF-8">
 	<meta name="language" content="fr" />
	<meta name="author" content="100HOME"/>
	<meta name="keywords" content="100HOME, association animaux, animaux, chien, chat, animal domestique, protection animali&egrave;re, conseil animaux, abandon, refuge, Lieusaint" />
	<meta name="Description" content="Association pour la protection des animaux domestiques à Lieusaint" />	
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
	<link rel="stylesheet" type="text/css" media="screen" href="/css/style.css"  /> 
	<title> 100HOME | Association de protection des animaux </title>  <!-- Ici mettre echo titre par la suite -->
	<!--[if lt IE 9]
	<script src="/js/compatibilite/dist/html5shiv.js"></script>
	[endif] -->
</head>

<body>
		<div id="header">
            <img src="/images/logo.jpg" alt="Logo de l'association 100HOME" id="logo_100HOME" height="80" />
		
		<!-- **********************	DEBUT MODIFICATIONS ********************** -->
		<p>Bonjour 
			<?php //Affichage du pseudo de l'internaute s'il est connecté
				if (isset($_SESSION['pseudo'])){
					echo $_SESSION['pseudo'] . ' !';
				}

			?>
		</p>
		<!-- ************************ FIN MODIFICATIONS ********************** -->
		
		</div>


		<div id="espace_membre">
			ACCEDER ESPACE PERSONNEL:

      	<!-- **********************	DEBUT MODIFICATIONS ********************** -->
      	<?php 
      		// Affichage bouton connexion ou déconnexion si utilisateur connecté ou pas.
      		if (empty($_SESSION['pseudo'])){
      			echo '
				<form method="POST" action="/connect_user/index.php" style="line-height:2em"> 
		      		<input class="bouton" type="submit" value="CONNEXION"> <br/>
		      	</form>
		      	<form method="POST" action="/inscription/index.php" style="line-height:2em"> 
      				<input class="bouton" type="submit" value="ENREGISTRER UN COMPTE"> <br/>
      			</form>';
      	
      		}else{
      		    echo '
      	    	<form method="POST" action="/deconnect_user/index.php" style="line-height:2em"> 
		      		<input class="bouton" type="submit" value="DECONNEXION"> <br/>
		      	</form>';
      		}

      	?>
      	<!-- ************************ FIN MODIFICATIONS ********************** -->

		</div>

<!-- Fin en-tête -->

