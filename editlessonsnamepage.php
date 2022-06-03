<?php
session_start();

$_SESSION["showcourses"] = true;

require_once 'includes/coursestoshow.php';

$_SESSION["showcourses"] = false;


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
        <p class="p1">اختر اسم الكورس القديم</p>


        <select id="courseselection" class="textarea1" name="courseselection">
          <option value="">اختر اسم الكورس القديم</option>
          <option value="1"><?php echo $_SESSION["course1"] ?></option>
          <option value="2"><?php echo $_SESSION["course2"] ?></option>
          <option value="3"><?php echo $_SESSION["course3"] ?></option>
          <option value="4"><?php echo $_SESSION["course4"] ?></option>
          <option value="5"><?php echo $_SESSION["course5"] ?></option>
          <option value="6"><?php echo $_SESSION["course6"] ?></option>
          <option value="7"><?php echo $_SESSION["course7"] ?></option>
          <option value="8"><?php echo $_SESSION["course8"] ?></option>
          <option value="9"><?php echo $_SESSION["course9"] ?></option>
          <option value="10"><?php echo $_SESSION["course10"] ?></option>
          <option value="11"><?php echo $_SESSION["course11"] ?></option>
          <option value="12"><?php echo $_SESSION["course12"] ?></option>
          <option value="13"><?php echo $_SESSION["course13"] ?></option>
          <option value="14"><?php echo $_SESSION["course14"] ?></option>
          <option value="15"><?php echo $_SESSION["course15"] ?></option>
          <option value="16"><?php echo $_SESSION["course16"] ?></option>
          <option value="17"><?php echo $_SESSION["course17"] ?></option>
          <option value="18"><?php echo $_SESSION["course18"] ?></option>
          <option value="19"><?php echo $_SESSION["course19"] ?></option>
          <option value="20"><?php echo $_SESSION["course20"] ?></option>
        </select>



           <br>
         
         <p class="p2">ادخل اسم الكورس الجديد</p>
         <textarea id="newcn" class="textarea2" cols="55" rows="1"></textarea>
           <br>
         <input id="submitcn" class="input1" type="submit" value="ادخال">


         <script type="text/javascript">

          document.getElementById("submitcn").addEventListener("click", function () {

          var oldn = document.getElementById("courseselection").value; 

          if(oldn == ""){

               window.alert("اختر اسم الكورس القديم ");

          }else{
               window.location = 'includes/coursestoshow.php?courseN=' + document.getElementById("courseselection").value + '&newcn=' + document.getElementById("newcn").value;
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