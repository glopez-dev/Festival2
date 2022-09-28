<?php

    require 'Modele/modele.php';

    // ON DEFINIT D'ABORD TOUTES LES FONCTIONS APPELANT DES VUES

    function accueil() {
        require 'Vue/vueAccueil.php';
    }

    function listeEtablissements($connexion) {
        require 'Vue/vueListeEtablissements.php';
    }

    function creationEtablissement($connexion) {
        $modif=$_REQUEST['modif'];
        require 'Vue/vueCreationEtablissement.php';
    }

    function modificationEtablissements($connexion) {
        $modif=$_REQUEST['modif'];
        require 'Vue/vueModificationEtablissements.php';
    }

    function modificationAttributions($connexion) {
        require 'Vue/vueModificationAttributions.php';
    }

    function supressionEtablissement($connexion) {
        require 'Vue/vueSupressionEtablissements.php';
    }

    function detailEtablissement($connexion) {
        require 'Vue/vueDetailEtablissement.php';
    }
    
    function consultationAttributions($connexion) {
        require 'Vue/vueAttributions.php';
    }

    function donnerNbChambres($connexion) {
        require 'Vue/vueNbChambres.php';
    }

    // PUIS ON DEFINIT LE CONTROLEUR FRONTAL

    function displayVue ($connexion) {
    
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'listeEtablissements' :
                    listeEtablissements($connexion);
                    break;
                case 'consultationAttributions' :
                    consultationAttributions($connexion);
                    break;
                case 'creationEtablissement' :
                    creationEtablissement($connexion);
                    break;
                case 'modificationEtablissements' :
                    modificationEtablissements($connexion);
                    break;
                case 'supressionEtablissements' :
                    supressionEtablissement($connexion);
                    break;
                case 'detailEtablissement':
                    detailEtablissement($connexion);
                    break;
                case 'modificationAttributions' :
                    modificationAttributions($connexion);
                    break;
                case 'donnerNbChambres' : 
                    donnerNbChambres($connexion);
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

    