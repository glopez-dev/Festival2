<?php $title = 'Festival - Attribution'; ?>


<?php ob_start() ?>
<p><?php consultationAttribution() ?></p>
<?php $contenu = ob_get_clean(); ?>

<?php require 'pageTemplate.php'; ?>