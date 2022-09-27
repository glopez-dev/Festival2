<?php

    require 'Modele/modele.php';

    // ON DEFINIT D'ABORD TOUTES LES FONCTIONS APPELANT DES VUES

    function accueil() {
        require 'Vue/vueAccueil.php';
    }

    function listeEtablissements() {
        require 'Vue/vueListeEtablissements.php';
    }

    function creationEtablissement() {
        require 'Vue/vueCreationEtablissement.php';
    }

    function modificationAttributions() {
        require 'Vue/vueModificationAttributions.php';
    }

    function supressionEtablissement() {
        
    }

    function detailEtablissement() {
        require 'Vue/vueDetailEtablissement.php';
    }
    
    function consultationAttributions() {
        require 'Vue/vueAttributions.php';
    }

    // PUIS ON DEFINIT LE CONTROLEUR FRONTAL

    function displayVue () {
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'listeEtablissements' :
                    listeEtablissements();
                    break;
                case 'consultationAttributions' :
                    consultationAttributions();
                    break;
                case 'creationEtablissement' :
                    creationEtablissement();
                    break;
                case 'modificationAttributions' :
                    modificationAttributions();
                    break;
                case 'detailEtablissement':
                    detailEtablissement();
                    break;
                case 'demanderModifAttrib':
                    modificationAttributions();
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

    