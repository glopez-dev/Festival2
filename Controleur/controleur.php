<?php

    require 'Modele/modele.php';

class Controleur
{
    // ON DEFINIT D'ABORD TOUTES LES FONCTIONS APPELANT DES VUE
    public function accueil()
    {
        include 'Vue/vueAccueil.php';
    }

    public function listeEtablissements($connexion, $modele)
    {
        include 'Vue/vueListeEtablissements.php';
    }

    public function creationEtablissement($connexion, $modele, $errors)
    {
        $modif=$_REQUEST['modif'];
        include 'Vue/vueCreationEtablissement.php';
    }

    public function modificationEtablissements($connexion, $modele, $errors)
    {
        $modif=$_REQUEST['modif'];
        include 'Vue/vueModificationEtablissements.php';
    }

    public function modificationAttributions($connexion, $modele)
    {
        include 'Vue/vueModificationAttributions.php';
    }

    public function supressionEtablissement($connexion, $modele)
    {
        include 'Vue/vueSupressionEtablissements.php';
    }

    public function detailEtablissement($connexion, $modele)
    {
        include 'Vue/vueDetailEtablissement.php';
    }
    
    public function consultationAttributions($connexion, $modele)
    {
        include 'Vue/vueAttributions.php';
    }

    public function donnerNbChambres($connexion, $modele)
    {
        include 'Vue/vueNbChambres.php';
    }

    // PUIS ON DEFINIT LE CONTROLEUR FRONTAL

    public function displayVue($connexion, $modele, $errors)
    {
    
        if (isset($_GET['action'])) {
            switch ($_GET['action']){
            case 'listeEtablissements' :
                $this->listeEtablissements($connexion, $modele);
                break;
            case 'consultationAttributions' :
                $this->consultationAttributions($connexion, $modele);
                break;
            case 'creationEtablissement' :
                $this->creationEtablissement($connexion, $modele, $errors);
                break;
            case 'modificationEtablissements' :
                $this->modificationEtablissements($connexion, $modele, $errors);
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
                throw new Exception("Action non reconnue par le contr??leur");
                    break;
            }
        } 
        else { 
            $this->accueil(); 
        }
    }

    
}
    