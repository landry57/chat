<?php 
session_start();
ob_start();

 ?>
<?php
  require('config.php');



 $tab = array( "name" => "", "id"=>"","nameDb"=>"","passwordDb"=>"", "codeqr"=>"", "nameError" => "","password"=>"","passwordError"=>"","globalError"=>"", "isSuccess" => false);
      if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $tab["name"] = test_input($_POST["name"]);
        $tab["password"] = test_input($_POST["password"]);
        $tab["isSuccess"] = true; 
        
        if (empty($tab["name"]))
        {
            $tab["nameError"] = " je veux savoir ton nom !";
            $tab["isSuccess"] = false; 
        } 
        else
        {
         if (!nameVerify($tab["name"])) {
            $tab["nameError"] = " tu essai de me tromper avec des chiffres!";
            $tab["isSuccess"] = false; 
         }else{
             $tab["name"];
         }
           
        }

        if(empty($tab["password"])) 
        {
            $tab["passwordError"] = "Et oui je veux  tout savoir.même ton password !";
            $tab["isSuccess"] = false; 
        } 
        else
        {
            if (!verifyPass($tab["password"])) {
            $tab["passwordError"] = "6 caractères demandés pour le password!";
            $tab["isSuccess"] = false; 
            }else
            {
            $tab["password"];
           }
        }

          $tab['password']=achage($tab['password']);
          //verification nom utilisateur
          $selectu=$bdd->prepare("SELECT * FROM users WHERE user_name=?");
          $selectu->execute(array($tab['name']));
          $rows=$selectu->rowCount();
          $user=$selectu->fetch();
          $tab['nameDb']=$user['user_name'];
           //verification pass utilisateur
          $selectp=$bdd->prepare("SELECT * FROM users WHERE user_pass=?");
          $selectp->execute(array($tab['password']));
          $userp=$selectp->fetch();
          $tab['passwordDb']=$userp['user_pass'];

        if ($tab['isSuccess']==true) {
           // $tab['password']=achage( $tab['password']);
           $select=$bdd->prepare("SELECT * FROM users WHERE user_name=? AND user_pass=?");
           $select->execute(array($tab['name'],$tab['password']));
           $rows=$select->rowCount();
            if ($rows==1) {
             $list=$select->fetch();
             $_SESSION['id']=$list['id'];
             $tab['id']=$_SESSION['id'];
             //
             $tab['codeqr']=rand(4,999);
             $upd =$bdd->prepare('UPDATE users SET code=?  WHERE user_name=? AND user_pass=?');
             $upd->execute(array($tab['codeqr'],$tab['name'],$tab['password']));
              $_SESSION['code']=$tab['codeqr'];
            }else
            {
              $tab['globalError']=" le compte de l'utilisateur {$tab['name']} n'est pas encore créé!";
            }
        }
        echo json_encode($tab);
}



    function isEmail($email) 
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    function isPhone($phone) 
    {
        return preg_match("/^[0-9 ]*$/",$phone);
    }
    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    function nameVerify($na){
        $na=preg_match("/^[a-zA-Z]*$/",$na);
        return $na;    
    }
    function verifyPass($pa){
      if (strlen($pa)==6) {
        return $pa;
      }
       
    }
   function achage($h){
    $h=sha1($h);
    return $h;
   }
   ?>