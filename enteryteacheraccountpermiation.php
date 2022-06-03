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


      <p class="p1">ادخل كود المدرس</p>
         <textarea id="tcode" class="textarea1" cols="55" rows="1"></textarea>
           <br>
         
         <p class="p2">اكتب اسم الكورس المراد 
           <br>  اعطاء تصريح بالتحكم فيه</p>

           <select id="courseselectiont" class="textarea2" name="courseselectiont">
            <option value="">اكتب اسم الكورس المراد اعطاء تصريح بالتحكم فيه</option>
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

         <input id="submitct" class="input1" type="submit" value="ادخال">

         <input id="submitdct" class="input1" type="submit" value="مسح">

         


         <script type="text/javascript">

          document.getElementById("submitct").addEventListener("click", function () {

                var courseselectiont = document.getElementById("courseselectiont").value; 
                var tcode = document.getElementById("tcode").value; 

                if(courseselectiont == ""){

                    window.alert("اختر اسم الكورس");

                }else if(tcode == ""){

                window.alert("اكتب الكود ");

                }else{
                    window.location = 'includes/registercourse.php?course=' + document.getElementById("courseselectiont").value + '&code=' + document.getElementById("tcode").value;
                }
          });

          document.getElementById("submitdct").addEventListener("click", function () {

                var courseselectiont = document.getElementById("courseselectiont").value; 
                var tcode = document.getElementById("tcode").value; 

                if(courseselectiont == ""){

                    window.alert("اختر اسم الكورس");

                }else if(tcode == ""){

                window.alert("اكتب الكود ");

                }else{
                    window.location = 'includes/deletecourseperm.php?course=' + document.getElementById("courseselectiont").value + '&code=' + document.getElementById("tcode").value;
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