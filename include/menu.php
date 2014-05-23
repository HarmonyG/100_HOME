
<!-- Corps -->
    <div id="contenu">

<!-- Menu -->

<nav>
  <ul class="nav">
    <li><a href="/index.php">Accueil</a></li>
    <li><a href="/association/index.php">Association</a>
      <ul>
        <li><a href="/association/refuge.php">Refuge</a></li>
        <li><a href="/association/equipe.php">Equipe</a></li>
      </ul>
    </li>
    <li><a href="/actualites/liste_actualites.php">Actualités</a></li>
    <li><a href="/adoptions/index.php">Adoptions</a></li>
    <li><a href="/adoptes/index.php">Adoptés</a></li>
    <li><a href="/conseils/index.php">Conseils</a>
      <ul>
        <li><a href="/conseils/conseils_chiens.php">Vous avez adopté un chien</a></li>
        <li><a href="/conseils/conseils_chats.php">Vous avez adopté un chat</a></li>
        <li><a href="/conseils/conseils_adoption.php">Soins et santé</a></li>
        <li><a href="/conseils/conseils_aliments_nocifs.php">Les aliments nocifs pour les animaux</a></li>
        <li><a href="/conseils/conseils_perdu.php">Animal perdu ?</a></li>
        <li><a href="/conseils/conseils_abandon.php">Vous voulez abandonner votre animal ?</a></li>
      </ul>
    </li>
    <li><a href="/forum/index.php">FAQ</a></li>
    <li><a href="/contact/index.php">Contact</a></li>

    <?php
      if (isset($_SESSION['pseudo'])){
        if($_SESSION['pseudo'] == "administrateur"){
    ?>
          <li><a href="/administration/index.php">Administration</a>
            <ul>
              <li><a href="/administration/ajout_animaux_BDD.php">Ajouter un animal</a></li>
              <li><a href="/administration/modif_animaux_BDD_tableau.php">Modifier un animal</a></li>
              <li><a href="/administration/suppression_animaux_BDD_tableau.php">Suppression d'un animal</a></li>
              <li><a href="/administration/modif_user_BDD_tableau.php">Modification d'un utilisateur</a></li>
              <li><a href="/administration/suppression_user_BDD_tableau.php">Suppression d'un utilisateur</a></li>
              <li><a href="/actualites/insertion_actualites_BDD.php">Insertion d'une actualité</a></li>
              <li><a href="/actualites/modification_actualites_BDD_tableau.php">Modification d'une actualité</a></li>           
              <li><a href="/actualites/suppression_actualites_BDD_tableau.php">Suppression d'une actualité</a></li>
          </li>

    <?php
        }
      }
    ?>
  </ul>
</nav>

<!-- Fin menu -->
 



