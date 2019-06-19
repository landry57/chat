$(function () {
    
    $('#registerform').submit(function(e) {
        e.preventDefault();
        $('#nameError').empty();
        $('#passwordError').empty();
        $('#repeatpasswordError').empty();
        var postdata = $('#registerform').serialize();
        
        $.ajax({
            type: 'POST',
            url: 'inscription.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                 
                if(json.isSuccess) 
                {
                    if (json.globalError) {
                         $('#ret').html(json.globalError).css("color","red").css("font-style","italic");
                         $('#ret')[0].reset();
                     }else{
                    $('#haut').append("<div id='error'>Votre enregistrement a bien été pris en compte. Merci </div>");
                    $('#haut')[0].reset();
                }
                }
                else
                {    
                     
                    $('#nameError').html(json.nameError).css("color","red").css("font-style","italic");
                    $('#passwordError').html(json.passwordError).css("color","red").css("font-style","italic");
                    $('#repeatpasswordError').html(json.repeatpasswordError).css("color","red").css("font-style","italic");

                   return false;
                }                
            }
        });
    });

})
///login
$(function () {
    
    $('#loginform').submit(function(e) {
        e.preventDefault();
        $('#nameError').empty();
        $('#passwordError').empty();
        var postdata = $('#loginform').serialize();
        
        $.ajax({
            type: 'POST',
            url: 'pages/connexion.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                 
                if(json.isSuccess) 
                {
                  
                  if (json.globalError) {
                         $('#ret').html(json.globalError).css("color","red").css("font-style","italic");
                         $('#ret')[0].reset();
                     }else{
                    document.location.href = 'pages/qr.php?id='+json.id;

                }
                }
                else
                {    
                     
                    $('#nameError').html(json.nameError).css("color","red").css("font-style","italic");
                    $('#passwordError').html(json.passwordError).css("color","red").css("font-style","italic");
            

                   return false;
                }                
            }
        });
    });

})
//connexion ou login (verification avec keyup)

$(document).ready(function(){
  $(function(){
    $("#loginform").keyup(function(e){
     e.preventDefault();
     $("#nameError").empty();
     $("#passwordError").empty();
     var data =$("#loginform").serialize();
     
     
     $.ajax({
       type:'POST',
       url:'pages/connexion.php',
       data:data,
       dataType:'json',
       success:function(dataUse){
         //verification directe des coordonnees de login user
         //verify nom
         if (dataUse.nameDb) {
           $("input:text").css({
            color:'green',
            fontSize:'18px',
            fontStyle:'italic',
            fontFamily:'sans-serif',
            borderColor:'green' 
           });
           
         }else
         {

          $("input:text").css({
            color:'red',
            fontSize:'18px',
            fontStyle:'italic',
            fontFamily:'sans-serif',
            borderColor:'red' 
           });
         }
         //password verify
         if (dataUse.passwordDb) {
          $("input:password").css({
           color:'green',
           fontSize:'18px',
           fontStyle:'italic',
           fontFamily:'sans-serif',
           borderColor:'green' 
          });
        }else
        {
         $("input:password").css({
           color:'red',
           fontSize:'18px',
           fontStyle:'italic',
           fontFamily:'sans-serif',
           borderColor:'red' 
          });
        }
        if (dataUse.isSuccess) {
          
        }else
        {
          //  console.log(dataUse.emailError);
        }
       }
     });
    });
})
})

///message enregistrement definitf du message
$(function () {
    
    $('#messageForm').submit(function(e) {
        e.preventDefault();
         
        var postdata = $('#messageForm').serialize();
        $.ajax({
            type: 'POST',
            url: 'message.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                 
                if(json.isSuccess) 
                {
                   if (json.globalError) {
                    alert(json.globalError);
                   }else
                   {

                    var str = new String("message envoyé avec succès");
                     $('input:submit').hide();

                        //swal ( " Bon boulot! " , " Tu as cliqué sur le bouton! " , " succès " )   ;
                    $("#messageForm")[0].reset();
                    
                    
                   }

                }
                else
                {    

                    var error= new String(json.messageError);
                     alert(error);
                     $('input:submit').hide();


                   return false;
                }                
            }
        });
    });

})




//chat
setInterval('load_messages()', 500);
function load_messages() {
$('#load').load('load.php');
  }
  //supmessage
  setInterval('load_sup()', 500);
function load_sup() {
$('#chat').load('supmessage.php');
  }
///

///online
setInterval('load_messagesonline()', 500);
function load_messagesonline(){
$('#online').load('onlinem.php');
  }

//afficher la touche avec l'objet keyup et faire la misse ajour
$(document).ready(function(){
  $('#env').hide();
  $("#voir").keyup(function(e){
        e.preventDefault();
        var postdata = $('#voir').serialize();
        
           var tail=postdata;
         var leg=tail.length;

        if (leg!='') {
          console.log(leg+'hh');
           
           $("input:submit").fadeIn("slow");
           $("input:submit").mouseover(function(){
           $("input:submit").css("background-color", "#00F");
               });
          $("input:submit").mouseout(function(){
          $("input:submit").css("background-color", "#ddd");
          });
           }
        $.ajax({
            type: 'POST',
            url: 'page.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                if(json.isSuccess) 
                {
                    //$('#voir')[0].reset();
                    var x = e.which;
                    console.log(x);
                    var  mess=json.message;
                    if (x==8) {
                        $('#aff').html(mess);
                    }
                     $('#aff').html(mess);
                }
            }
        
    });
  });
});



 function myFunction() {
    $('#env1').css('background-color',"red") ;
    window.SpeechRecognition = window.webkitSpeechRecognition || window.SpeechRecognition;
    let finalTranscript = '';
    
    let recognition = new window.SpeechRecognition();
    recognition.interimResults = true;
    recognition.maxAlternatives = 10;
    recognition.continuous = true;
     recognition.lang = "fr-FR";
    recognition.onresult = (event) => {
      let interimTranscript = '';
      for (let i = event.resultIndex, len = event.results.length; i < len; i++) {
        let transcript = event.results[i][0].transcript;
        if (event.results[i].isFinal) {
          finalTranscript += transcript;
        } else {
          interimTranscript += transcript;
        }
      }
      var text= finalTranscript  ;
          text+= interimTranscript
      console.log(text);
      $("#voir").val(text);
      
      if (text!='') {
          var postdata= $("#voir").serialize();

           $.ajax({
            type: 'POST',
            url: 'page.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                if(json.isSuccess) 
                {
                  $('#env1').css('background-color',"yellow") ;
                }
            }
        
    });
           $("input:submit").fadeIn("slow");
           $("input:submit").mouseover(function(){
           $("input:submit").css("background-color", "#00F");
               });
          $("input:submit").mouseout(function(){
          $("input:submit").css("background-color", "#ddd");
          });
       
      }
      

    }
    recognition.start();
}
//
//qrcode

$(document).ready(function(){
  var code =$('#cod').val();
 var qrcode = new QRCode("qr", {
  text:code,
   width: 128,
   height: 128,
   colorDark : "#000000",
  colorLight : "#ffffff",
  correctLevel : QRCode.CorrectLevel.H
  });

})


$(function () {
    
    $('#loginformQr').submit(function(e) {
        e.preventDefault();
        $('#passwordError').empty();
        var postdata = $('#loginformQr').serialize();
      
        $.ajax({
            type: 'POST',
            url: 'confQr.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                 
                if(json.isSuccess) 
                {
                  
                  if (json.codeBd) {
                     document.location.href = 'espacechat.php?id='+json.id;
                      $('#loginformQr')[0].reset();
                  }
                   
                
                }
                else
                {    
                     
                   
                    $('#passwordError').html(json.passwordError).css("color","red").css("font-style","italic");
            

                   return false;
                }                
            }
        });
    });

})

$(document).ready(function(){
  $(function(){
    $("#loginformQr").keyup(function(e){
     e.preventDefault();
     
     $("#password").empty();
     var data =$("#loginformQr").serialize();
     
     
    $.ajax({
       type:'POST',
       url:'confQr.php',
       data:data,
       dataType:'json',
       success:function(dataUse){
         //verification directe des coordonnees de login user
         //verify nom
         
         if (dataUse.codeBd) {
           $("input:password").css({
            color:'green',
            fontSize:'18px',
            fontStyle:'italic',
            fontFamily:'sans-serif',
            borderColor:'green', 
            backgroundColor:'#fff'
           });
          
         }else
         {
            console.log(dataUse.codeBd);
          $("input:password").css({
            color:'red',
            fontSize:'18px',
            fontStyle:'italic',
            fontFamily:'sans-serif',
            borderColor:'red'
            
           });
         }
        
        if (dataUse.isSuccess) {
          
        }else
        {
          //  console.log(dataUse.emailError);
        }
       }
     });
    });
})
})
///

function textareaSizeLimites(zoneTexte,colMin,colMax,rowMin,rowMax) {
 if (zoneTexte) {
  nbrLignesMin=rowMin;longueurDeLigneMin=colMin; // Taille minimal de la zone de texte.
  nbrLignesMax=rowMax;longueurDeLigneMax=colMax; // Taille maximale de la zone de texte.
  nbrLignes=nbrLignesMin;
  longueurDeLigne=longueurDeLigneMin;
  lesLignes=escape(zoneTexte.value).split("%0D%0A"); 
  if (lesLignes) {nbrLignes=lesLignes.length;}
  if (nbrLignes>nbrLignesMax) {nbrLignes=nbrLignesMax;}
  else if (nbrLignes<nbrLignesMin) {nbrLignes=nbrLignesMin;}

  if (lesLignes) {
   for(n=0; n<(lesLignes.length); n++) {
    if (longueurDeLigneMin<unescape(lesLignes[n]).length) {longueurDeLigne=unescape(lesLignes[n]).length;}
    if (longueurDeLigne>longueurDeLigneMax)
   {
   longueurDeLigne=longueurDeLigneMax;
   nbrLignes+=unescape(lesLignes[n]).length/longueurDeLigneMax;
   }
   }
  }
  else {longueurDeLigne=zoneTexte.value.length}
  if (nbrLignes>nbrLignesMax) {nbrLignes=nbrLignesMax;}
  else if (nbrLignes<nbrLignesMin) {nbrLignes=nbrLignesMin;}

  zoneTexte.cols=(longueurDeLigne+1); // Charge le nombre de colonnes utile, plus une colonne pour la clarté
  zoneTexte.rows=(nbrLignes+1); // Charge le nombre de lignes utile, plus une ligne pour la clarté
  zoneTexte.empty();
 }
}