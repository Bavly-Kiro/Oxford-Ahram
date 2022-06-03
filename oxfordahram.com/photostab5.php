<?php
    session_start();


    if($_SESSION["admin"] != 1){

        if(!(isset($_SESSION["code"])) || $_SESSION["access"] == 0){
                header("Location: ../baduser.php");
                exit();
        }

    }

    if(!($_SESSION["admin"] == 1 || $_SESSION["type"] == 2)){

        $_SESSION["settd"] = "none";

    }else{

        $_SESSION["settd"] = "";

    }


?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content=""><!--put description-->
        <title>الصور,سنتر اكسفورد التعليمى </title>
        <link rel="shortcut icon" type="image/png" href="../images/profile photo.jpeg">
        <link rel="stylesheet" href="../css/photos tab.css">
        <link rel="stylesheet" href="../css/normalize.css">

    </head>
    <body>

        <div class="container">
            
                
                <?php
                $group = 4;
                require_once 'includes/imageshow.php';
                ?>

            <br><br><br><br>
            <a class="next" href="photostab6.php">التالي</a>
            <br><br><br><br>
        </div>
        
        
    </body>
</html>