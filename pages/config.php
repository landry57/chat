<?php
error_reporting(E_ALL|E_NOTICE);
$PARAM_hote='localhost'; // le chemin vers le serveur
$PARAM_nom_bd='chat'; // le nom de votre base de données
$PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter
try{
$bdd = new PDO("mysql:host=$PARAM_hote;dbname=$PARAM_nom_bd", $PARAM_utilisateur,
$PARAM_mot_passe);
$bdd->exec('SET NAMES utf8'); // pour éditer en utf-8
 

}
catch(Exception $e){
echo 'Erreur : '.$e->getMessage().'<br>';
echo 'N° : '.$e->getCode();
}
?>