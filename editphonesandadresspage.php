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

        <p class="p1">ادخل ارقام الهاتف الجديده</p>
         <textarea id="phone1" class="textarea1" placeholder="ادخل رقم الهاتف المحمول الجديد" cols="55" rows="1"><?php echo $_SESSION["phoneNumber1"] ?></textarea>
         <textarea id="phone2" class="textarea1" placeholder="ادخل رقم التليفون الارضى الجديد" cols="55" rows="1"><?php echo $_SESSION["phoneNumber2"] ?></textarea>
           <br>
         
         <p class="p2">ادخل العنوان الجديد</p>
         <textarea id="address" class="textarea2" cols="55" rows="1"><?php echo $_SESSION["address"] ?></textarea>
           <br>
         <input id="submitaddr" class="input1"type="submit" value="ادخال">



         <script type="text/javascript">

          document.getElementById("submitaddr").addEventListener("click", function () {

          window.location = 'includes/editphadd.php?phone1=' + document.getElementById("phone1").value + '&phone2=' + document.getElementById("phone2").value + '&address=' + document.getElementById("address").value;

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