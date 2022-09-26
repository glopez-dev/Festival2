<?php

    require '../Modele/modele.php';

    function displayVue () {
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'attributions' : 
                    attributions();
                    break;
                case 'consultationAttributions' :
                    consultationAttributions();
                    break;
                default : 
                    throw new Exception("Action non reconnue par le contôleur");
                    break;
            }
        } 
        else { 
            accueil(); 
        }
    }

    function accueil() {
        require '../Vue/vueAccueil.php';
    }
    
    function attributions() {
        $nbEtab=obtenirNbEtabOffrantChambres($connexion);
        require '../Vue/vueAttributions.php';
    }

    