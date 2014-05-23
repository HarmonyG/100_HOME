<!-- A FAIRE : PAGINATION -->
<!-- Insertion des include: en-tête, du menu et de la connexion -->
<?php
include ("../include/header.php");
include ("../include/menu.php");
include ("../include/connexion.php");

// Récupération des données dans un tableau
$requete = 'SELECT * FROM utilisateurs order by id desc';
$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

// Récupération de l'âge que l'on convertit en nombre d'années si les mois sont supérieurs à 11 mois
while ($ligne = $result->fetch_assoc()) {	
	
	//Affichage titres
	echo '<table>
	<tr>
		<th>Id</th>
		<th>Nom utilisateur</th>
		<th>Mot de passe</th>
		<th>Sexe</th>
		<th>Email</th>
		<th>Modification</th>
	</tr>';

	//Affichage données
	echo '
		<tr>
			<td>'.$ligne['id'].'</td>
			<td>'.$ligne['pseudo'].'</td>
			<td>'.$ligne['mdp'].'</td>
			<td>'.$ligne['sexe'].'</td>
			<td>'.$ligne['email'].'</td>
			<td><button type="button" onclick="location.href=\'modif_user_BDD.php?id='.$ligne['id'].'\'">Modifier</button></td>
		</tr>';
}

echo '</table>';

//Insertion du pied de page
include ("../include/footer.php");
?>