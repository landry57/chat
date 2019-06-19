<?php 
session_start();
ob_start();

 ?>
 <?php
  require('config.php');
 $tab = array( "password"=>"","codeBd"=>"","passwordError"=>"","globalError"=>"", "isSuccess" => false);
      if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        
        $tab["password"] = test_input($_POST["password"]);
        $tab["isSuccess"] = true; 
        
       

        if(empty($tab["password"])) 
        {
            $tab["passwordError"] = "Et oui je veux  tout savoir.même ton password !";
            $tab["isSuccess"] = false; 
        } 
        else
        {
           
            $tab["password"];
          
        }

          //verification nom utilisateur
         $selectu=$bdd->prepare("SELECT * FROM users WHERE  code=?");
          $selectu->execute(array($tab['password']));
          //$rows=$selectu->rowCount();
          $user=$selectu->fetch();
          $tab['codeBd']=$user['code'];
          
          
        
        if ($tab['isSuccess']==true) {
           // $tab['password']=achage( $tab['password']);
          $select=$bdd->prepare("SELECT * FROM users WHERE code=?");
           $select->execute(array($tab['password']));
           $rows=$select->rowCount();
            if($rows==1) {
             
             $tab['id']=$_SESSION['id'];
             
             //
            }else
            {
              $tab['globalError']=" le compte de l'utilisateur {$tab['password']} n'est pas encore créé!";
            }
        }
      echo json_encode($tab);
}
 function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>