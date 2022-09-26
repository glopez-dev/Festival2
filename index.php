<?php

 //require '/Controleur/errorHandling.php';
 require 'Controleur/controleur.php';

 try{
      tryConnexion(); // teste la connexion a la BDD
      displayVue(); // controleur frontal permettant d'afficher de vues
   }
   catch (Exceptions $e) // ex gestion d'erreurs de "_controlesEtGestionErreurs.inc.php" (implémentation a finaliser)
   {
      $msgErreur = $e->getMessage();
      ajouterErreur($msgErreur);
      require 'Vue/vueErreur.php';
   }

?>