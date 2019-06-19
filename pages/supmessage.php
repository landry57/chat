<?php 
session_start();
ob_start();

 ?>
 <?php
 require('config.php');

//su
$sel=$bdd->query("SELECT dat_send FROM conversation");
while($a=$sel->fetch()){
$jouract=date("d", time());
$creat=date_create($a['dat_send']);
$jourAnc=date_format($creat,"d");
$difference=$jouract-$jourAnc;
$heuresupp=$difference * 24; //7jours
if ($heuresupp >=168) {
   $delet=$bdd->query("DELETE FROM conversation "); 
}
}





?>
