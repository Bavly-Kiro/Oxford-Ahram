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


        <p class="p2">اختر اسم الكورس المراد ادخال الكود اليه</p>

        <select id="courseselectionc" class="textarea1" name="courseselectionc">
          <option value="">اسم الكورس المراد ادخال الكود اليه</option>
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

         <p class="p2">اكتب كود الطالب</p>
         <textarea id="codec" class="textarea2" placeholder="ادخل كود الطالب" cols="55" rows="1"></textarea>
           <br>
         <input class="input1" id="submitc" type="submit" value="ادخال">



         <script type="text/javascript">

            document.getElementById("submitc").addEventListener("click", function () {
  
            var courseselectionc = document.getElementById("courseselectionc").value; 
            var codec = document.getElementById("codec").value; 

            if(courseselectionc == ""){
  
                 window.alert("اختر اسم الكورس");
  
            }else if(codec == ""){
  
            window.alert("اكتب الكود ");

            }else{
                 window.location = 'includes/registercourse.php?course=' + document.getElementById("courseselectionc").value + '&code=' + document.getElementById("codec").value;
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