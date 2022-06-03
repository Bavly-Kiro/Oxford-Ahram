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

    $_SESSION["showbooks"] = true;

    require_once 'includes/bookstoshow.php';

    $_SESSION["showbooks"] = false;


?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content=""><!--put description-->
        <title>الكتب,الكورسات,سنتر اكسفورد التعليمى </title>
        <link rel="shortcut icon" type="image/png" href="../images/profile photo.jpeg">
        <link rel="stylesheet" href="../css/books.css">
        <link rel="stylesheet" href="../css/normalize.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    </head>
    <body>
        
                <div class="features">
                    
                    <a style="display: <?php echo $_SESSION["settd"]; ?> ;" href="enterybooks.php" target="_blank"><img class="setting-icon" src="../images/vector-setting-icon.jpg"></a>

            <div class="container">
                <div class="lines">
                    
                        <a class="part" href="<?php echo $_SESSION["bookl1"] ?>"><?php echo $_SESSION["bookn1"] ?></a>
                        
                        <a class="part" href="<?php echo $_SESSION["bookl2"] ?>"><?php echo $_SESSION["bookn2"] ?></a>

                        <a class="part" href="<?php echo $_SESSION["bookl3"] ?>"><?php echo $_SESSION["bookn3"] ?></a>
                    
                        <a class="part" href="<?php echo $_SESSION["bookl4"] ?>"><?php echo $_SESSION["bookn4"] ?></a>
                </div>

                <div class="lines">
                    
                    <a class="part" href="<?php echo $_SESSION["bookl5"] ?>"><?php echo $_SESSION["bookn5"] ?></a>
                        
                    <a class="part" href="<?php echo $_SESSION["bookl6"] ?>"><?php echo $_SESSION["bookn6"] ?></a>

                    <a class="part" href="<?php echo $_SESSION["bookl7"] ?>"><?php echo $_SESSION["bookn7"] ?></a>
                
                    <a class="part" href="<?php echo $_SESSION["bookl8"] ?>"><?php echo $_SESSION["bookn8"] ?></a>
                </div>
                
                <div class="lines">
                      
                    <a class="part" href="<?php echo $_SESSION["bookl9"] ?>"><?php echo $_SESSION["bookn9"] ?></a>
                        
                    <a class="part" href="<?php echo $_SESSION["bookl10"] ?>"><?php echo $_SESSION["bookn10"] ?></a>

                    <a class="part" href="<?php echo $_SESSION["bookl11"] ?>"><?php echo $_SESSION["bookn11"] ?></a>
                
                    <a class="part" href="<?php echo $_SESSION["bookl12"] ?>"><?php echo $_SESSION["bookn12"] ?></a>
   
                </div>

            </div>
        </div>
        
    </body>
</html>