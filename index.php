<?php
   try 
   {
      require 'Controleur/controleur.php';
      $connexion = createConnexion(); // Creates a new connexion to the database
      tryConnexion($connexion); // Tests database connexion
      displayVue($connexion); // This function implements a front controller
   } 
   catch (Exception $e) 
   {
      $msgErreur = $e->getMessage();
      ajouterErreur($msgErreur);
      require 'Vue/vueErreur.php';
   }
?>