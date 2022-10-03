<?php

    require 'Modele/modele.php';

class Controleur 
{
    // ON DEFINIT D'ABORD TOUTES LES FONCTIONS APPELANT DES VUE
    public function accueil() {
        require 'Vue/vueAccueil.php';
    }

    public function listeEtablissements($connexion) {
        require 'Vue/vueListeEtablissements.php';
    }

    public function creationEtablissement($connexion) {
        $modif=$_REQUEST['modif'];
        require 'Vue/vueCreationEtablissement.php';
    }

    public function modificationEtablissements($connexion) {
        $modif=$_REQUEST['modif'];
        require 'Vue/vueModificationEtablissements.php';
    }

    public function modificationAttributions($connexion) {
        $this->$connexion = $connexion;
        require 'Vue/vueModificationAttributions.php';
    }

    public function supressionEtablissement($connexion) {
        require 'Vue/vueSupressionEtablissements.php';
    }

    public function detailEtablissement($connexion) {
        require 'Vue/vueDetailEtablissement.php';
    }
    
    public function consultationAttributions($connexion) {
        require 'Vue/vueAttributions.php';
    }

    public function donnerNbChambres($connexion) {
        require 'Vue/vueNbChambres.php';
    }

    // PUIS ON DEFINIT LE CONTROLEUR FRONTAL

    public function displayVue ($connexion) {
    
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'listeEtablissements' :
                    $this->listeEtablissements($connexion);
                    break;
                case 'consultationAttributions' :
                    $this->consultationAttributions($connexion);
                    break;
                case 'creationEtablissement' :
                    $this->creationEtablissement($connexion);
                    break;
                case 'modificationEtablissements' :
                    $this->modificationEtablissements($connexion);
                    break;
                case 'supressionEtablissements' :
                    $this->supressionEtablissement($connexion);
                    break;
                case 'detailEtablissement':
                    $this->detailEtablissement($connexion);
                    break;
                case 'modificationAttributions' :
                    $this->modificationAttributions($connexion);
                    break;
                case 'donnerNbChambres' : 
                    $this->donnerNbChambres($connexion);
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
    