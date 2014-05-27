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
			$requete = 'SELECT * FROM animaux order by id desc';
			$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

			// Récupération de l'âge que l'on convertit en nombre d'années si les mois sont supérieurs à 11 mois
			while ($ligne = $result->fetch_assoc()) {	
				if ($ligne['age_animal'] > 11){
					$age_animal=$ligne['age_animal'] ;
					$age_animal = $age_animal /12;
					$age_animal= intval($age_animal);
					$age_animal=$age_animal.'an(s)';
				}
				else if($ligne['age_animal'] == 0){
					$age_animal= 'Moins d\'un mois'; 
				}
				else {
					$age_animal=$ligne['age_animal'] ;
					$age_animal=$age_animal.'mois';
				}


				//Affichage titres
				echo '<table>
				<tr>
					<th>Id</th>
					<th>Nom</th>
					<th>Espèce</th>
					<th>Taille</th>
					<th>Race</th>
					<th>Sexe</th>
					<th>Date de naissance</th>
					<th>Age</th>
					<th>Sauvetage</th>
					<th>Modification</th>
				</tr>';

				//Affichage données
				echo '
					<tr>
						<td>'.$ligne['id'].'</td>
						<td>'.$ligne['nom'].'</td>
						<td>'.$ligne['espece'].'</td>
						<td>'.$ligne['taille'].'</td>
						<td>'.$ligne['race'].'</td>
						<td>'.$ligne['sexe'].'</td>
						<td>'.$ligne['date_naissance'].'</td>
						<td>'.$age_animal.'</td>
						<td>'.$ligne['sauvetage'].'</td>
						<td><button type="button" onclick="location.href=\'modif_animaux_BDD.php?id='.$ligne['id'].'\'">Modifier</button></td>
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