<?php $title = 'Festival - Error';

ob_start();
echo 
"<table width='80%%' cellspacing='0' cellpadding='0' align='center'>
    <tr>
        <td class='texteAccueil'>"
            .$errors->fetchErrors().
        "</td>
    </tr>
</table>";
$contenu = ob_get_clean();

require 'pageTemplate.php'; 
echo $contenu;
?>