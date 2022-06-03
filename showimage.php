<?php
    session_start();

    if(!($_SESSION["admin"] == 1 || $_SESSION["type"] == 2)){

        $_SESSION["settd"] = "none";

    }else{

        $_SESSION["settd"] = "";

    }
    
    if(!($_SESSION["admin"] == 1 || isset($_SESSION["code"]))){

        echo "0";

        header("Location: ../baduser.php");
        exit();
       
       }

       $link = $_GET["link"];
       $id = $_GET["id"];


       if(!($_SESSION["settd"] === "none")){

             echo "<a href='photossetting.php?link=$link&id=$id'><img width='50' height='50' class='setting icon' src='../images/vector-setting-icon.jpg'></a><br><br>";
             
       }


       echo "<img class='img' src='$link'>";

?>