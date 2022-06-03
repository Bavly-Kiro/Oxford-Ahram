<?php
session_start();


if($_SESSION["admin"] != 1){

    if(!(isset($_SESSION["code"])) || $_SESSION["access"] == 0 || $_SESSION["type"] == 1){
            header("Location: ../baduser.php");
            exit();
    }

}

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
    <body>
        <br><br>
        <p class="p1">الصق لينك الامتحان</p>
         <textarea id="newlinkex" class="textarea1" cols="55" rows="1"></textarea>
           <br>
         <input id="submitexamlink" class="input1"type="submit" value="ادخل">

         <script type="text/javascript">

            document.getElementById("submitexamlink").addEventListener("click", function () {
  

               window.location = 'includes/examshow.php?link=' + document.getElementById("newlinkex").value;
            
            
            });

            </script>
    </body>
</html>