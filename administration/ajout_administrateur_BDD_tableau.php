<!-- A FAIRE : PAGINATION -->
<!-- Insertion des include: en-tête, du menu et de la connexion -->
<?php
	include ("../include/header.php");
	include ("../include/menu.php");
	include ("../include/connexion.php");

	// Si l'utilisateur est administrateur il pourra accéder ces pages sinon non : sécuriser si on entre le lien hors admin
	if (isset($_SESSION['pseudo'])){
		if($_SESSION['pseudo'] == "administrateur"){
			
			// Récupération des données dans un tableau
			$requete = 'SELECT * FROM utilisateurs order by id desc';
			$result = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);

			// Récupération de l'âge que l'on convertit en nombre d'années si les mois sont supérieurs à 11 mois
			while ($ligne = $result->fetch_assoc()) {	

				//Si administrateur vaut 1 il est administrateur sinon il ne l'est pas
				if ($ligne['admin'] == 1){
					$admin="Administrateur";
				}

				else{
					$admin="Non Administrateur";
				}
	
				//Reformatage des données
				if ($ligne['sexe'] == "H"){
					$sexe="Homme";
				}

				else{
					$sexe="Femme";
				}


				//Affichage titres
				echo '<table>
				<tr>
					<th>Nom d\'utilisateur</th>
					<th>Mot de passe</th>
					<th>Sexe</th>
					<th>Email</th>
					<th>Administrateur</th>
					<th>Devenir administrateur</th>
				</tr>';

				//Affichage données
				echo '
					<tr>
						<td>'.$ligne['pseudo'].'</td>
						<td>'.$ligne['mdp'].'</td>
						<td>'.$sexe.'</td>
						<td>'.$ligne['email'].'</td>
						<td>'.$admin.'</td>';

						// Si l'utilisateur est administrateur : on n'affiche pas le bouton, sinon oui
						if ($admin=="Non Administrateur"){
							echo '<td><button type="button" onclick="location.href=\'ajout_administrateur_BDD.php?id='.$ligne['id'].'\'">Devenir administrateur</button></td>'; 
						}
					
						else {
							echo '<td> Déjà administrateur </td>';
						}

						echo '</tr>';
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