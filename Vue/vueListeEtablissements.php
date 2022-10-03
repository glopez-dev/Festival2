<?php 
    $title = 'Accueil > Etablissements'; 
?> 
<?php ob_start() ?>
<?php
echo "
<table width='70%' cellspacing='0' cellpadding='0' align='center' 
class='tabNonQuadrille'>
   <tr class='enTeteTabNonQuad'>
      <td colspan='4'>Etablissements</td>
   </tr>";
   $connexion = $modele->createConnexion();
   $req=$modele->obtenirReqEtablissements();
   $rsEtab=$connexion->query($req);
   $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);
   // BOUCLE SUR LES ÉTABLISSEMENTS
   while ($lgEtab!=FALSE)
   {
      $id=$lgEtab['id'];
      $nom=$lgEtab['nom'];
      echo "
		<tr class='ligneTabNonQuad'>
         <td width='52%'>$nom</td>
         
         <td width='16%' align='center'><a href='index.php?action=detailEtablissement&id=$id'>Voir détail</a></td>
         
         <td width='16%' align='center'> 
         <a href='index.php?action=modificationEtablissements&amp;id=$id&amp;modif=demanderModifEtab'>
         Modifier</a></td>";
      	
         // S'il existe déjà des attributions pour l'établissement, il faudra
         // d'abord les supprimer avant de pouvoir supprimer l'établissement
			if (!($modele->existeAttributionsEtab($connexion, $id)))
			{
            echo "
            <td width='16%' align='center'> 
            <a href='index.php?action=supressionEtablissements&amp;id=$id&amp;modif=demanderSupprEtab'>
            Supprimer</a></td>";
         }
         else
         {
            echo "
            <td width='16%'>(".$modele->obtenirNbOccup($connexion,$id). " attributions)</td>";          
			}
			echo "
      </tr>";
      $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);
   }   
   echo "
   <tr class='ligneTabNonQuad'>
      <td colspan='4'><a href='index.php?action=creationEtablissement&modif=demanderCreEtab'>
      Création d'un établissement</a ></td>
  </tr>
</table>";
?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'pageTemplate.php'; ?>
<?= $contenu ?>