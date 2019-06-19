<?php 
session_start();
ob_start();

 ?>
 <?php 
  require('config.php');
  session_destroy();
  $del=$bdd->prepare('DELETE FROM online WHERE id_user=?');
  $del->execute(array($_SESSION['id']));
  header('Location:../index.html');

  ?>