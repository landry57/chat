<?php
   require('config.php');

    $array = array( "name" => "",   "nameError" => "","password"=>"","repeatpassword"=>"","passwordError"=>"","repeatpasswordError"=>"","globalError"=>"", "isSuccess" => false);
   

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $array["name"] = test_input($_POST["name"]);
        $array["password"] = test_input($_POST["password"]);
        $array["repeatpassword"] = test_input($_POST["repeatpassword"]);
        $array["isSuccess"] = true; 
        
        if (empty($array["name"]))
        {
            $array["nameError"] = " je veux savoir ton nom !";
            $array["isSuccess"] = false; 
        } 
        else
        {
         if (!nameVerify($array["name"])) {
            $array["nameError"] = " tu essai de me tromper avec des chiffres!";
            $array["isSuccess"] = false; 
         }else{
             $array["name"];
         }
           
        }

        if(empty($array["password"])) 
        {
            $array["passwordError"] = "Et oui je veux  tout savoir.même ton password !";
            $array["isSuccess"] = false; 
        } 
        else
        {
            if (!verifyPass($array["password"])) {
            $array["passwordError"] = "6 caractères demandés pour le password!";
            $array["isSuccess"] = false; 
            }else
            {
            $array["password"];
           }
        }

        if (empty($array["repeatpassword"]))
        {
            $array["repeatpasswordError"] = "je veux  que tu repète  ton password !";
            $array["isSuccess"] = false; 
        }
        else
        {
         if (!verifyPass($array["repeatpassword"])) {
            $array["repeatpasswordError"] = "6 caractères demandés pour le password!";
            $array["isSuccess"] = false; 
            }else
            {
            $array["repeatpassword"];
           }
        }
        
        if ($array["repeatpassword"]!=$array["password"]) {
            $array["repeatpasswordError"] = "le password doit être identique";
            $array["isSuccess"] = false; 
            }else
            {
            $array["repeatpassword"];
           }
        
        

        if($array["isSuccess"]==true) 
        {
            $array['password']=achage( $array['password']);
            $select=$bdd->prepare("SELECT * FROM users WHERE user_name=?");
            $select->execute(array($array['name']));
            $rows=$select->rowCount();
            if ($rows==0) {
               $insert=$bdd->prepare("INSERT INTO users(user_name,user_pass) VALUES(?,?)");
               $insert->execute(array($array['name'],$array['password']));
            }else
            {
                $array['globalError']="{$array['name']} existe deja";
            }
            
        }
       
        
        echo json_encode($array);
        
    }
//connexion




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


