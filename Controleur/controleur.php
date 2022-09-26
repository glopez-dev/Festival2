<?php

    require 'Modele/modele.php';

    // ON DEFINIT D'ABORD TOUTES LES FOCNTIONS GÉNÉRANT DES PAGES :

    function accueil() {
        require 'Vue/vueAccueil.php';
    }
    
    function consultationAttributions() {
        $connexion=createConnexion();
        $nbEtab=obtenirNbEtabOffrantChambres($connexion);
        if ($nbEtab!=0) 
            {  
                echo "<table width='75%' cellspacing='0' cellpadding='0' align='center'
                <tr><td>
                <a href='modificationAttributions.php?action=demanderModifAttrib'>
                 Effectuer ou modifier les attributions</a></td></tr></table><br><br>";
   
                // POUR CHAQUE ÉTABLISSEMENT : AFFICHAGE D'UN TABLEAU COMPORTANT 2 LIGNES 
                // D'EN-TÊTE ET LE DÉTAIL DES ATTRIBUTIONS
                $req=obtenirReqEtablissementsAyantChambresAttribuées();
                $rsEtab=$connexion->query($req);
                $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);
                // BOUCLE SUR LES ÉTABLISSEMENTS AYANT DÉJÀ DES CHAMBRES ATTRIBUÉES
                while($lgEtab!=FALSE)
                    {
                    $idEtab=$lgEtab['id'];
                    $nomEtab=$lgEtab['nom'];
   
                    echo "
                    <table width='75%' cellspacing='0' cellpadding='0' align='center' 
                    class='tabQuadrille'>";
      
                    $nbOffre=$lgEtab["nombreChambresOffertes"];
                    $nbOccup=obtenirNbOccup($connexion, $idEtab);
                  // Calcul du nombre de chambres libres dans l'établissement
                  $nbChLib = $nbOffre - $nbOccup;
      
                  // AFFICHAGE DE LA 1ÈRE LIGNE D'EN-TÊTE 
                  echo "
                  <tr class='enTeteTabQuad'>
                  <td colspan='2' align='left'><strong>$nomEtab</strong>&nbsp;
                  (Offre : $nbOffre&nbsp;&nbsp;Disponibilités : $nbChLib)
                  </td>
                  </tr>";
          
                 // AFFICHAGE DE LA 2ÈME LIGNE D'EN-TÊTE 
                echo "
                <tr class='ligneTabQuad'>
                   <td width='65%' align='left'><i><strong>Nom groupe</strong></i></td>
                     <td width='35%' align='left'><i><strong>Chambres attribuées</strong></i>
                     </td>
                </tr>";
        
                // AFFICHAGE DU DÉTAIL DES ATTRIBUTIONS : UNE LIGNE PAR GROUPE AFFECTÉ 
                 // DANS L'ÉTABLISSEMENT       
                 $req=obtenirReqGroupesEtab($idEtab);
                 $rsGroupe=$connexion->query($req);
                 $lgGroupe=$rsGroupe->fetch(PDO::FETCH_ASSOC);
               
                 // BOUCLE SUR LES GROUPES (CHAQUE GROUPE EST AFFICHÉ EN LIGNE)
                while($lgGroupe!=FALSE)
                {
                   $idGroupe=$lgGroupe['id'];
              $nomGroupe=$lgGroupe['nom'];
                  echo "
                 <tr class='ligneTabQuad'>
                  <td width='65%' align='left'>$nomGroupe</td>";
                 // On recherche si des chambres ont déjà été attribuées à ce groupe
                 // dans l'établissement
                 $nbOccupGroupe=obtenirNbOccupGroupe($connexion, $idEtab, $idGroupe);
                echo "
                   <td width='35%' align='left'>$nbOccupGroupe</td>
                 </tr>";
               $lgGroupe=$rsGroupe->fetch(PDO::FETCH_ASSOC);
                } // Fin de la boucle sur les groupes
      
                echo "
                </table><br>";
                $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);
                } // Fin de la boucle sur les établissements
            }
        require '/Vue/vueAttributions.php';
    }

    // PUIS ON DEFINIT LE CONTROLEUR FRONTAL

    function displayVue () {
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'attributions' : 
                    attributions();
                    break;
                case 'consultationAttributions' :
                    consultationAttributions();
                    break;
                case 'creationEtablissement';
                    creationEtablissement();
                    break;
                case 'detailEtablissement';
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

    