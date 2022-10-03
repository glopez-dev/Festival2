<?php
 require '/Controleur/controleur.php';?>

<?php $title = 'Festival - Attribution'; 

// ob_start() utilisé pour démarrer la vue en question    ?>
<?php ob_start() ?>
<p><?php consultationAttribution() ?></p>

<?php $contenu = ob_get_clean(); ?>

<?php require 'pageTemplate.php'; ?>