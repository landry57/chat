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
  
   $table = array( "message" => "","messageError" => "", "globalError" => "", "isSuccess" => false);
      if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $table["message"] = test_input($_POST["message"]);
        $table["isSuccess"] = true; 
        
        if (empty($table["message"]))
        {
            $table["messageError"] = " que veux-tu me dire!";
            $table["isSuccess"] = false; 
        } 
        else
        {
         
             $table["message"];
        }

        if ($table['isSuccess']==true) {
           $id=(int)$_SESSION['id'];
           $select=$bdd->prepare("SELECT * FROM users WHERE id=?");
           $select->execute(array($id));
           $rows=$select->rowCount();
          if ($rows==1) {
          $list=$select->fetch();
          $insert=$bdd->prepare("INSERT INTO conversation(user_id,name,message,dat_send) VALUES(?,?,?,NOW())");
           $insert->execute(array($id,$list['user_name'],$table["message"]));
           $m="";
           $delete=$bdd->prepare("UPDATE online SET message=? WHERE id_user=?");
           $delete->execute(array($m,$id));
           }else{
           	$table["globalError"]="Verifie ton inscription";
           }
      
        }



       echo json_encode($table);


    }
     function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }    	
?>