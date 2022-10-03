<?php $title = 'Festival - Error'; ?>

<?php ob_start() ?>
<!--<p>Une erreur est survenue : <?php echo $msgError ?></p>-->
<?php $modele->getErrors(); ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'pageTemplate.php'; ?>