
<?php $title = 'Accueil > Attributions chambres'; ?>
<?php ob_start(); ?>
<?php
        $nbEtab = $modele->obtenirNbEtabOffrantChambres($connexion);
if ($nbEtab != 0) {
        echo "<table width='75%' cellspacing='0' cellpadding='0' align='center'
                <tr><td>
                <a href='index.php?action=modificationAttributions&amp;modif=demanderModifAttrib'>
                 Effectuer ou modifier les attributions</a></td></tr></table><br><br>";

        // POUR CHAQUE ÉTABLISSEMENT : AFFICHAGE D'UN TABLEAU COMPORTANT 2 LIGNES
        // D'EN-TÊTE ET LE DÉTAIL DES ATTRIBUTIONS
        $req = $modele->obtenirReqEtablissementsAyantChambresAttribuées();
        $rsEtab = $connexion->query($req);
        $lgEtab = $rsEtab->fetch(PDO::FETCH_ASSOC);
        // BOUCLE SUR LES ÉTABLISSEMENTS AYANT DÉJÀ DES CHAMBRES ATTRIBUÉES
    while ($lgEtab != false) {
            $idEtab = $lgEtab['id'];
            $nomEtab = $lgEtab['nom'];

            echo "
                    <table width='75%' cellspacing='0' cellpadding='0' align='center' 
                    class='tabQuadrille'>";

            $nbOffre = $lgEtab["nombreChambresOffertes"];
            $nbOccup = $modele->obtenirNbOccup($connexion, $idEtab);
          // Calcul du nombre de chambres libres dans l'établissement
          $nbChLib = $nbOffre - $nbOccup;

          // AFFICHAGE DE LA 1ÈRE LIGNE D'EN-TÊTE
          echo "
                  <tr class='enTeteTabQuad'>
                  <td colspan='3' align='left'><strong>$nomEtab</strong>&nbsp;
                  (Offre : $nbOffre&nbsp;&nbsp;Disponibilités : $nbChLib)
                  </td>
                  </tr>";

         // AFFICHAGE DE LA 2ÈME LIGNE D'EN-TÊTE
        echo "
                <tr class='ligneTabQuad'>
                  <td width='50%' align='left'><i><strong>Nom groupe</strong></i></td>
                  <td width='25%' align='left'><i><strong>Chambres attribuées</strong></i></td>
                  <td width='25%' align='left'><i><strong>Pays d'origine</strong></i></td>
                </tr>";

        // AFFICHAGE DU DÉTAIL DES ATTRIBUTIONS : UNE LIGNE PAR GROUPE AFFECTÉ
         // DANS L'ÉTABLISSEMENT
         $req = $modele->obtenirReqGroupesEtab($idEtab);
         $rsGroupe = $connexion->query($req);
         $lgGroupe = $rsGroupe->fetch(PDO::FETCH_ASSOC);

         // BOUCLE SUR LES GROUPES (CHAQUE GROUPE EST AFFICHÉ EN LIGNE)
        while ($lgGroupe != false) {
            $idGroupe = $lgGroupe['id'];
            $nomGroupe = $lgGroupe['nom'];
            $paysGroupe = $lgGroupe['nomPays'];
            echo "
                  <tr class='ligneTabQuad'>
                    <td width='50%' align='left'>$nomGroupe</td>";
            // On recherche si des chambres ont déjà été attribuées à ce groupe
            // dans l'établissement
            $nbOccupGroupe = $modele->obtenirNbOccupGroupe($connexion, $idEtab, $idGroupe);
            echo "
                    <td width='25%' align='left'>$nbOccupGroupe</td>
                    <td width='25%' align='left'>$paysGroupe</td>
                  </tr>";
            $lgGroupe = $rsGroupe->fetch(PDO::FETCH_ASSOC);
        } // Fin de la boucle sur les groupes

        echo "
                </table><br>";
        $lgEtab = $rsEtab->fetch(PDO::FETCH_ASSOC);
    } // Fin de la boucle sur les établissements
}
?>

<?php $contenu = ob_get_clean(); ?>
<?php require 'pageTemplate.php'; ?>
<?php echo $contenu;
