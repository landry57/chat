<?php 
session_start();
ob_start();

 ?>
 

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
       <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Charm" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="../css/style.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/qrcode.js"></script>

  <title>QRcode</title>
</head>
<body>
  
  </script>
   <div class="container">
     <div class="row">
      <div class="col-xs-8 col-md-8 col-xs-offset-2 col-md-offset-2 ">
        <form  method="POST" class="text-center box" id="loginformQr">
          <input type="hidden" name="code" value='<?=$_SESSION["code"]?>' id="cod">
          <div  id="qr">
     
          </div>
          <h1>code</h1>
          <div id="haut">
            

          </div>
                
          <input type="password" name="password" placeholder="code" id="password">
          <p id="passwordError"></p> 
          <input type="submit"value="Ok">
           <p id="ret"></p>
          
        </form>
      </div>
      
     </div>
   </div> 

    <script type="text/javascript" src="../js/script.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
