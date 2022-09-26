<?php

    require '../Modele/modele.php';

    function displayVue () {

      if (isset($_GET['action'])){
        if ($_GET['action'] === "attributions") {
           attributions();
        }
        else { throw new Exception("Action non reconnue par le contôleur"); } 
        } else { accueil(); }
    }