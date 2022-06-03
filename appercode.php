<?php
    session_start();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content=""><!--Developer put description-->
        <title>سنتر اكسفورد التعليمى </title>
        <link rel="shortcut icon" type="image/png" href="../images/profile photo.jpeg">
        <meta name="Viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="Handheldfriendly" content="true">
        <link rel="stylesheet" href="../css/setting.css">
        <link rel="stylesheet" href="../css/normalize.css">
    </head>

    <body onload="test();">

      <p class="p1">ادخل البيانات</p>
         <textarea id="phone" class="textarea1" placeholder="ادخل رقم الهاتف المحمول " cols="55" rows="1"></textarea>
         <textarea id="pphone" class="textarea1" placeholder="ادخل رقم هاتف محمول ولي الامر" cols="55" rows="1"></textarea>
           <br>
         
         <input id="submitphone" class="input1"type="submit" value="اظهار">

         
         <script type="text/javascript">

          document.getElementById("submitphone").addEventListener("click", function () {

          if(document.getElementById("phone").value == ""){
  
            window.alert("ادخل رقم الهاتف المحمول");

          }else if(document.getElementById("pphone").value == ""){

          window.alert("ادخل رقم هاتف محمول ولي الامر ");

          }else{
             window.location = 'includes/getcode.php?phone=' + document.getElementById("phone").value + '&pphone=' + document.getElementById("pphone").value;
          }
          
          });

          function test(){
              if(<?php if($_SESSION["admin"] == 1){ echo "0";}else{echo "true";} ?>){
                  window.location = 'baduser.php';
                 // window.alert("helooooo");
               }
          }
      
      </script>
    </body>
</html>