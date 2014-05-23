 <?php 
	$titre = 'Déconnexion';
	include("../include/header.php");
	include("../include/menu.php");
	header("Location: ../index.php");
	// Suppression des variables de session
	$_SESSION = array();

	// Supression du cookie de session
	setcookie(session_name(), '', time() - 42000,'/');
	if (isset($_COOKIE['pseudo'])){
		$id = $_SESSION['id'];
		$nomCookie = "100home_$id_user";
		setcookie($nomCookie, '', -1);
		echo 'cookie '.$nomCookie.' détruit';
	}

	// Destruction de la session
	session_destroy();
	unset($_SESSION);
	echo 'Déconnexion réussie' ;
	include("../include/footer.php");
?> 