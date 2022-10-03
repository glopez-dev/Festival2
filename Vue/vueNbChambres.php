<?php
    $title = 'Accueil > Attribution Chambres > Definir nombre de chambres';
?> 
<?php ob_start() ?>
<?php

// SÉLECTIONNER LE NOMBRE DE CHAMBRES SOUHAITÉES

$idEtab = $_REQUEST['idEtab'];
$idGroupe = $_REQUEST['idGroupe'];
$nbChambres = $_REQUEST['nbChambres'];

echo "
<form method='POST' action='index.php?action=modificationAttributions'>
	<input type='hidden' value='validerModifAttrib' name='modif'>
   <input type='hidden' value='$idEtab' name='idEtab'>
   <input type='hidden' value='$idGroupe' name='idGroupe'>";
   $nomGroupe = $modele->obtenirNomGroupe($connexion, $idGroupe);

   echo "
   <br><center><h5>Combien de chambres souhaitez-vous pour le 
   groupe $nomGroupe dans cet établissement ?";

   echo "&nbsp;<select name='nbChambres'>";
for ($i = 0; $i <= $nbChambres; $i++) {
    echo "<option>$i</option>";
}
   echo "
   </select></h5>
   <input type='submit' value='Valider' name='valider'>&nbsp&nbsp&nbsp&nbsp
   <input type='reset' value='Annuler' name='Annuler'><br><br>
   <a href='index.php?action=modificationAttributions&amp;modif=demanderModifAttrib'>Retour</a>
   </center>
</form>";

?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'pageTemplate.php'; ?>
<?php echo $contenu;
