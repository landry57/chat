<?php 
session_start();
ob_start();

 ?>
<?php
require('config.php');
  if (isset($_SESSION['id']) AND $_SESSION['id']>0) {
   $id=(int)$_SESSION['id'];
   $sur=$bdd->prepare("SELECT * FROM users WHERE id=?");
   $sur->execute(array($id));
   $n=$sur->fetch();
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
           $select=$bdd->prepare("SELECT * FROM online WHERE id_user=?");
           $select->execute(array($id));
           $rows=$select->rowCount();
          if ($rows==0) {
          $list=$select->fetch();
          $insert=$bdd->prepare("INSERT INTO online(id_user,user_name,message) VALUES(?,?,?)");
           $insert->execute(array($id,$n['user_name'],$table["message"]));
           }else{
           	$insert=$bdd->prepare("UPDATE online SET message=? WHERE id_user=?");
            $insert->execute(array($table['message'],$id));
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