<?php 
   $title = 'Festival - Accueil'; 
   ob_start(); 
?>
<table width='80%%' cellspacing='0' cellpadding='0' align='center'>
   <tr>  
      <td class='texteAccueil'>
         Cette application web permet de gérer l'hébergement des équipes sportives 
         durant le festival Sp'Or.
      </td>
   </tr>
   <tr>
      <td>&nbsp;
      </td>
   </tr>
   <tr>
      <td class='texteAccueil'>
          Elle offre les services suivants :
      </td>
   </tr>
   <tr>
      <td>&nbsp;
      </td>
   </tr>
   <tr>
      <td class='texteAccueil'>
      <ul>
         <li>Gérer les établissements (caractéristiques et capacités d'accueil) acceptant d'héberger les groupes de sportifs.
         <p>
          </p>
         <li>Consulter, réaliser ou modifier les attributions des chambres aux groupes dans les établissements.
      </ul>
      </td>
   </tr>
</table>
<?php
   $contenu = ob_get_clean();
require 'pageTemplate.php';
echo $contenu;
?>