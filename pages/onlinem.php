<?php 
session_start();
ob_start();

 ?>
 <?php
 require('config.php');
 if (isset($_SESSION['id']) AND $_SESSION['id']>0) {
   $id=(int)$_SESSION['id'];
  }else
  {
    header('Location:../index.html');
  }
?>
<div id="online">
              <?php  $direct =$bdd->prepare("SELECT * FROM online WHERE id_user!=?");
                $direct->execute(array($id));
                while ($list=$direct->fetch()) { ?>
                <div style="margin-bottom: 2px;"></div>
              <p style="color: #000; background: #fff;width: 50%;border-radius: 5px; word-wrap: break-word;"><strong style="color: green;">
              	<?php if (!empty($list['message']) AND strlen($list['message'])>1) {
                 
                echo $list['user_name'].' dit..</strong>'.$list["message"].'</p>';
                 }?>

                <?php }  ?>
    </div>