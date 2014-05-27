<!-- Insertion des include: en-tête, menu et de connexion -->
<?php
	include ("../include/header.php");
	include ("../include/menu.php");
	include ("../include/connexion.php");

	// Si l'utilisateur est administrateur il pourra accéder ces pages sinon non : sécuriser si on entre le lien hors admin
	if (isset($_SESSION['pseudo'])){
		if($_SESSION['pseudo'] == "administrateur"){

			// Initialisation de la variable de validation
			$validation=0;
			// <!-- Titre de la page -->
			echo'Traitement des informations entrées pour l\'ajout d\'un animal <br/>'; 

			// <!-- Récupération des variables -->
			$nom_animal = strip_tags($_POST['nom_animal']);
			$espece = strip_tags($_POST['espece']);
			$taille = strip_tags($_POST['taille']);
			$race = strip_tags($_POST['race']);
			$sexe_animal = strip_tags($_POST['sexe_animal']);
			$date_naissance_animal = strip_tags($_POST['date_naissance_animal']);
			$sauvetage = strip_tags($_POST['sauvetage']);

			// Fonction de conversion de la date année-mois-jour en jour-mois-année
			function date_naissance_animal_FR($date_naissance_animal) {
				list($annee, $mois, $jour) = explode("-", $date_naissance_animal);
				$date_naissance_animal= $jour.'.'.$mois.'.'.$annee;
				return $date_naissance_animal;
			}

			//Implantation de la variable date dans une autre
			$date_naissance_animal_FR= date_naissance_animal_FR($date_naissance_animal);

			//Fonction de calcul de l'âge en année
			function age_annee($date_naissance_animal){
			  return (int) ((time() - strtotime($date_naissance_animal)) / 3600 / 24 / 365);
			}
			$age_annee = age_annee($date_naissance_animal);

			//Fonction de calcul de l'âge en mois
			function age_mois($date_naissance_animal){
			  return (int) ((time() - strtotime($date_naissance_animal)) / 3600 / 24 / 365 * 12);
			}
			$age_mois = age_mois($date_naissance_animal);


			// On met l'âge en mois : on convertira en année dans les autres pages
			$age_animal=$age_mois;

			//Si la date sélectionnée est supérieure à celle d'aujourd'hui
			 	//Date actuelle découpée
				$date_annee = date('Y'); 
				$date_mois = date('m');
				$date_jour = date('d');

				//Date de naissance de l'animal découpée
				$a_decouper=$date_naissance_animal;
				$decoupes = explode("-", $a_decouper);
					
					// Récupère l'année
					$annee_animal = $decoupes[0];
				 	// Récupère le mois
					$mois_animal = $decoupes[1];
					// Récupère le jour
					$jour_animal = $decoupes[2];


				//Contrôle de la date selon l'année, le mois et le jour entrés
				if ($date_annee < $annee_animal){
					echo 'Année non valide';
					$validation=$validation+1;
				}
				else if ($date_annee == $annee_animal){
					if ( $date_mois < $mois_animal){
						echo 'mois non valide';
						$validation=$validation+1;
					}
				}
				
				if ($date_annee == $annee_animal){
					if ( $date_mois == $mois_animal){
						if ($date_jour < $jour_animal){
							echo 'jour non valide';
							$validation=$validation+1;
						}
					}
				}

			//Si les champs requis, ici la date n'est pas bonne: retour au formulaire
			if ($validation == 1){
			?>
				<!-- Formulaire -->
				<form method="POST" action="/administration/ajout_animaux_BDD_traitement.php">
					<!-- Nom de l'animal -->
					<p><label for= "nom_animal" class="required">Nom de l'animal: </label>
					<input type="text" size="50" maxlength="250"id="nom_animal" name="nom_animal" required="required" value="<?php echo $nom_animal ?>" /></p>

					<!-- Espèce de l'animal -->
					<p><label for= "espece">Espèce: </label>
					<select name="espece">
						<option value="chien" selected="selected"> Chien </option>
						<option value="chat"> Chat </option> 
						<option value="autre"> Autre </option>
					</select> </p>

					<!-- Taille de l'animal -->
					<p><label for= "taille">Taille: </label>
					<select name="taille">
						<option value="petit" selected="selected"> Petit </option>
						<option value="moyen"> Moyen </option> 
						<option value="grand"> Grand </option>
					</select></p>

					<!-- Race de l'animal -->
					<p><label for= "race" class="required">Race: </label>
					<input type="text" size="50" maxlength="250"id="race" name="race" required="required" value="<?php echo $race ?>" /></p>

					<!-- Sexe de l'animal -->
					<p><label for= "sexe_animal">Sexe: </label>
					<select name="sexe_animal">
						<option value="male" selected="selected"> Male </option>
						<option value="femelle"> Femelle </option> 
					</select></p>

					<!-- Date de naissance de l'animal -->
					<p><label for= "date_naissance_animal" class="required">Date de naissance de l'animal: </label>
					<input type="date" id="date_naissance_animal" name="date_naissance_animal" required="required"/></p>

					<!-- Sauvetage -->
					<p><label for= "sauvetage">Sauvetage: </label>
					<select name="sauvetage">
						<option value="oui" selected="selected"> Oui </option>
						<option value="non"> Non </option> 
					</select></p>

					<!-- Envoyer vers le traitement de formulaire: ajout_animaux_BDD_traitement.php -->
					<p><label for="envoi"></label>
					<input type="submit" value="Envoyer" id="envoi" ></p>

					<!-- Effacer la saisie -->
					<p><label for="effacer"></label>
					<input type="reset" value="Effacer" id="effacer" > </p>
			<?php
			}
				//Sinon insertion dans la base de données et retour à l'accueil
				else{
					$requete = "INSERT INTO animaux(nom, espece, taille, race, sexe, date_naissance, age_animal, sauvetage) 
					VALUES('$nom_animal', '$espece', '$taille', '$race', '$sexe_animal', '$date_naissance_animal_FR', '$age_animal', '$sauvetage')";
				 	$result  = $connexion->query($requete) or die ('Erreur '.$requete.' '.$connexion->error);
				 	echo '<p>Félicitations '.$nom_animal.' a bien été ajouté</p>
					<p><a href="../index.php">Retourner à la page d\'acceuil</a></p>
					<p><a href="/administration/ajout_animaux_BDD.php">Ajouter un autre animal </a></p>';

				}
		}
	}
	//Si ce n'est pas un administrateur: redirection vers l'accueil
	else{
		header("Location: ../index.php");
	}

	// Insertion de l'include de pied de page
	include ("../include/footer.php");
?>