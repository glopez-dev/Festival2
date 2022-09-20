<?php

require 'modele.php';

try{

}
catch (Exceptions $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}