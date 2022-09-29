<?php
   require 'Controleur/controleur.php';
   try 
   {
      $connexion = createConnexion();
      tryConnexion($connexion); // teste la connexion a la BDD
      displayVue($connexion); // controleur frontal permettant d'afficher de vues
   } 
   catch (Exceptions $e) 
   {
      $msgErreur = $e->getMessage();
      ajouterErreur($msgErreur);
      require 'Vue/vueErreur.php';
   }
?>