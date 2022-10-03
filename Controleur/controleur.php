<?php

    require 'Modele/modele.php';

class Controleur
{
    // ON DEFINIT D'ABORD TOUTES LES FONCTIONS APPELANT DES VUE
    public function accueil() {
        require 'Vue/vueAccueil.php';
    }

    public function listeEtablissements($connexion, $modele) {
        require 'Vue/vueListeEtablissements.php';
    }

    public function creationEtablissement($connexion, $modele) {
        $modif=$_REQUEST['modif'];
        require 'Vue/vueCreationEtablissement.php';
    }

    public function modificationEtablissements($connexion, $modele) {
        $modif=$_REQUEST['modif'];
        require 'Vue/vueModificationEtablissements.php';
    }

    public function modificationAttributions($connexion, $modele) {
        require 'Vue/vueModificationAttributions.php';
    }

    public function supressionEtablissement($connexion, $modele) {
        require 'Vue/vueSupressionEtablissements.php';
    }

    public function detailEtablissement($connexion, $modele) {
        require 'Vue/vueDetailEtablissement.php';
    }
    
    public function consultationAttributions($connexion, $modele) {
        require 'Vue/vueAttributions.php';
    }

    public function donnerNbChambres($connexion, $modele) {
        require 'Vue/vueNbChambres.php';
    }

    // PUIS ON DEFINIT LE CONTROLEUR FRONTAL

    public function displayVue ($connexion, $modele) {
    
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'listeEtablissements' :
                    $this->listeEtablissements($connexion, $modele);
                    break;
                case 'consultationAttributions' :
                    $this->consultationAttributions($connexion, $modele);
                    break;
                case 'creationEtablissement' :
                    $this->creationEtablissement($connexion, $modele);
                    break;
                case 'modificationEtablissements' :
                    $this->modificationEtablissements($connexion, $modele);
                    break;
                case 'supressionEtablissements' :
                    $this->supressionEtablissement($connexion, $modele);
                    break;
                case 'detailEtablissement':
                    $this->detailEtablissement($connexion, $modele);
                    break;
                case 'modificationAttributions' :
                    $this->modificationAttributions($connexion, $modele);
                    break;
                case 'donnerNbChambres' : 
                    $this->donnerNbChambres($connexion, $modele);
                    break;
                default : 
                    throw new Exception("Action non reconnue par le contrôleur");
                    break;
            }
        } 
        else { 
            $this->accueil(); 
        }
    }

    
}
    