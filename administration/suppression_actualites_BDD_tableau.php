<!-- A FAIRE : PAGINATION -->
<!-- Insertion des include: en-tête, du menu et de la connexion -->
<?php
	include ("../include/header.php");
	include ("../include/menu.php");
	include ("../include/connexion.php");

	// Si l'utilisateur est administrateur il pourra accéder ces pages sinon non : sécuriser si on entre le lien hors admin
	if (isset($_SESSION['pseudo'])){
		if($_SESSION['pseudo'] == "administrateur"){
			
			//Initialisation de la variable age_animal qui servira à définir s'il faut afficher l'âge de l'animal en mois ou années
			$age_animal='';

			// Récupération des données dans un tableau
			$requete = 'SELECT * FROM actualites order by id desc';
			$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

			// Récupération de l'âge que l'on convertit en nombre d'années si les mois sont supérieurs à 11 mois
			while ($ligne = $result->fetch_assoc()) {	

				//Affichage titres
				echo '<table>
				<tr>
					<th>Titre</th>
					<th>Texte</th>
					<th>Auteur</th>
					<th>date</th>
					<th>Compteur</th>
					<th>Suppression</th>
				</tr>';

				//Affichage données
				echo '
					<tr>
						<td>'.$ligne['titre'].'</td>
						<td>'.$ligne['texte'].'</td>
						<td>'.$ligne['auteur'].'</td>
						<td>'.$ligne['date'].'</td>
						<td>'.$ligne['compteur'].'</td>
						<td><button type="button" onclick="location.href=\'suppression_actualites_BDD.php?id='.$ligne['id'].'\'">Suppression</button></td>
					</tr>';
			}

				echo '</table>';

		}
	}

	//Si ce n'est pas un administrateur: redirection vers l'accueil
	else{
		header("Location: ../index.php");
	}
	
	//Insertion du pied de page
	include ("../include/footer.php");
?>