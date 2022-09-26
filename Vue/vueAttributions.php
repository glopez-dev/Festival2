<?php $title = 'Festival - Attribution'; ?>


<?php ob_start() ?>
<?php require 'pageTemplate.php'; ?>
<p><?php consultationAttribution() ?></p>
<?php $contenu = ob_get_clean(); ?>
