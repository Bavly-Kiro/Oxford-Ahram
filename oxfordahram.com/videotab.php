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
        <title>الفيدوهات,سنتر اكسفورد التعليمى </title>
        <link rel="shortcut icon" type="image/png" href="../images/profile photo.jpeg">
        <link rel="stylesheet" href="../css/video tab.css">
        <link rel="stylesheet" href="../css/normalize.css">

    </head>
    <body>
       
        
        
        <?php
        $group = 0;
        require_once 'includes/vidoeshow.php';
        ?>

            
            <br><br><br><br>
            <a class="next" href="videotab2.php">التالي</a>
            <br><br>
        
        
    </body>
</html>