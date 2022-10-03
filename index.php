<?php
try 
{
    include 'Controleur/controleur.php';
    $modele = new Modele();
    $controleur = new Controleur();
    $connexion = $modele->getBdd(); // Creates a new connexion to the database
    $modele->tryConnexion($connexion); // Tests database connexion
    $controleur->displayVue($connexion, $modele); // This public function implements a front controller
} 
catch (Exception $e) 
{
    $errors = new Errors();
    $errors->setError($e);
    include 'Vue/vueError.php';
}
?>