<?php

 //require '/Controleur/errorHandling.php';
 require '/Controleur/controleur.php';

 try{
      $connexion=createConnexion();
      tryConnexion();

      displayVue();

      if (isset($_GET['action'])){
         if ($_GET['action'] === "attributions") {
            attributions();
         }
         else{
            throw new Exception("Action non reconnue par le contôleur");
         } 
      }
      else {
         accueil();
      }
   
   }
   catch (Exceptions $e) // ex gestion d'erreurs de "_controlesEtGestionErreurs.inc.php" (implémentation a finaliser)
   {
      $msgErreur = $e->getMessage();
      ajouterErreur($msgErreur);
      require '/Vue/vueErreur.php';
   }