<?php $title = 'Festival - Erreur'; ?>

<?php ob_start() ?>
<!--<p>Une erreur est survenue : <?php echo $msgErreur ?></p>-->
<?php $modele->getErreurs(); ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'pageTemplate.php'; ?>