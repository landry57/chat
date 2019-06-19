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

<!DOCTYPE html>
<html>
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
       <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Charm" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="../css/style.css">
       
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
	<title>Chat</title>
</head>
<body>
   <div class="container">
   	 <div class="row">
      <div class="col-md-12 col-lg-12 col-xs-12" >
        <div id="dec"><?php if (isset($id)){ 
               echo '<a class="btn btn-info" href="logout.php">Logout</a>';
             } ?></div>
             
               <div class="short">
              <div id="online">
              <?php  $direct =$bdd->prepare("SELECT * FROM online WHERE id_user!=?");
                $direct->execute(array($id));
                while ($list=$direct->fetch()) { ?>
                
               <p style="color: #000; background: #fff;width: 50%;border-radius: 5px;word-wrap: break-word;"><strong style="color: green;">
                <?php if (!empty($list['message']) AND strlen($list['message'])>1) {
                 
                echo $list['user_name'].' dit..</strong>'.$list["message"].'</p>';
                 }?>
                <?php }  ?>
             </div>
             </div>

            </div>
   	 	 <div class="col-xs-12 col-md-8  col-lg-8 col-md-offset-2 col-lg-offset-2 ">
           <div class="clear"></div>
   	 		     
              <table>
                <tr>
                  <td style="background: none;"><button id="env1" onclick="myFunction()"><i class="fas fa-microphone"></i><button></td>
                </tr>
              </table>
              <div style="margin-bottom: 20px;"></div>
              <form  method="POST" class="text-center espace" id="messageForm" name="menu1">
   	 		  	   <h1>Espace-Chat</h1>
                 <div class="cadre">
                 <div class="row">
                   <div class="col-md-8  col-lg-8 col-xs-11 col-md-offset-2 col-xs-offset-2 col-lg-offset-2" id="load">
                      <div class="col-xs-12 col-md-8 col-lg-8">
                        <?php
                      $id=(int)$_SESSION['id'];
                      $select=$bdd->prepare("SELECT * FROM conversation WHERE user_id=? ORDER BY dat_send DESC LIMIT 1");
                      $select->execute(array($id));
                       while ($list=$select->fetch()) { ?>
                         <?php
                       $datform= date_create($list['dat_send']);
                       $annee=date_format($datform,"d/m/Y");
                       $heure=date_format($datform,"G:i");
                                                      
                      ?>
                       <p class="moi" id="text"><small class="glyphicon glyphicon-time"><?=$heure?> <?=$annee?></small><br>
                       <?php echo $list['message'];?>
                       </p>
                      <?php }  ?>
                      
                      </div>
                      <div  class="col-xs-12 col-md-4 col-lg-4"></div>

                       <div class="col-xs-12 col-md-8 col-lg-8">
                                 <?php
                       $id=(int)$_SESSION['id'];
                      $select=$bdd->prepare("SELECT * FROM conversation WHERE user_id!=? ORDER BY dat_send DESC LIMIT 1");
                       $select->execute(array($id));
                       while ($list=$select->fetch()) { ?>
                       <?php
                       $datform= date_create($list['dat_send']);
                       $annee=date_format($datform,"d/m/Y");
                       $heure=date_format($datform,"G:i");
                                                      
                      ?>
                       <p class="toi" id="text"><small class="glyphicon glyphicon-time"> <?=$heure?> <?=$annee?></small><br>
                       <?php echo $list['message'];?>
                       </p>
                    <?php }  ?>
                      </div>
                   </div>
                 </div>
                 </div>
                 <table>
                  <tr>
                    
                    <td><TEXTAREA  name="message" NAME="unescapettt" id="voir"  COLS=15 ROWS=1 onKeyDown="textareaSizeLimites(this,15,20,1,5);" onKeyUp="textareaSizeLimites(this,15,20,1,5);" ></TEXTAREA ></td>
                    <td><input type="submit" name="submit" value="send" id="env"></td>

                     </form>
                       
                  </tr>
                  
   	 			       </table>
                 
   	 		    
   	 	     </div>
   	  </div>
   </div> 
    
    <div class="col-xs-1 col-md-1 col-lg-1" id="chat">

      <?php
                           
     //suppression de message auto
      $sel=$bdd->query("SELECT dat_send FROM conversation");
      while($a=$sel->fetch()){
     $jouract=date("d", time());
     $creat=date_create($a['dat_send']);
     $jourAnc=date_format($creat,"d");
     $difference=$jouract-$jourAnc;
     $heuresupp=$difference * 24;
     if ($heuresupp >=168) {
     $delet=$bdd->query("DELETE FROM conversation "); 
     }
    }
     ?>
 </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>