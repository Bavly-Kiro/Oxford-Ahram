<?php
    session_start();


    if($_SESSION["admin"] != 1){

        if(!(isset($_SESSION["code"])) || $_SESSION["access"] == 0){
                header("Location: ../baduser.php");
                exit();
        }

    }

    if(!($_SESSION["admin"] == 1 || $_SESSION["type"] == 2)){

        $_SESSION["settd"] = none;

    }else{

        $_SESSION["settd"] = "";

    }

    $_SESSION["showlive"] = true;

    require_once 'includes/liveshow.php';

    $_SESSION["showlive"] = false;


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
        <link rel="stylesheet" href="../css/live.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,700&display=swap" rel="stylesheet">

    </head>
    <body>
        <br><br><br><br>
        <a style="display: <?php echo $_SESSION["settd"]; ?> ;" href="livesetting.php" target="_blank"><img class="setting icon" src="../images/vector-setting-icon.jpg"></a>
        
       <div class="div">
        <p class="p1"> لينك البث المباشر</p>
         <textarea id="linkk" class="textarea1" cols="55" rows="1"><?php echo $_SESSION["livelink"] ?></textarea>
             <input id="submitl" class="input1" type="submit" value="ذهاب للبث">
        </div>


        <script type="text/javascript">

        document.getElementById("submitl").addEventListener("click", function () {

                 window.location = document.getElementById("linkk").value;
            
        });


        </script>

    </body>
</html>