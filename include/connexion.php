<!-- connexion -->
    
    <div id="connexion">

        <?php
        $serveur="localhost";
        $base="projetweb";
        $user="internaute";
        $pass="pise";
        

        /* Connexion à la base de données */
        $connexion= new mysqli($serveur,$user,$pass,$base);
        


        /* utilisation connect_error */     
        if ($connexion->connect_error) {
        die('Erreur de connexion : ' . $connexion->connect_errno); // errno: code erreur de la connexion sql
        }

        else{
        //printf("Informations sur l'hôte : %s\n", $connexion->host_info);
            echo '';
        }

        ?>
        
    </div>
    
<!-- Fin connexion -->
    