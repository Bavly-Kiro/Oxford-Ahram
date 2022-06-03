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

    $_SESSION["shownatiga"] = true;

    require_once 'includes/natigatoshow.php';

    $_SESSION["shownatiga"] = false;


?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content=""><!--put description-->
        <title>الكتب,الكورسات,سنتر اكسفورد التعليمى </title>
        <link rel="shortcut icon" type="image/png" href="../images/profile photo.jpeg">
        <link rel="stylesheet" href="../css/resultes.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
    </head>
    <body>
        
                <div class="features">
                    
                    <a style="display: <?php echo $_SESSION["settd"]; ?> ;" href="enteryresults.php" target="_blank"><img class="setting-icon" src="../images/vector-setting-icon.jpg"></a>
            <div class="container">
                <div class="lines">
                    
                    <a class="part" href="<?php echo $_SESSION["natigal1"] ?>"><?php echo $_SESSION["natigan1"] ?></a>
                        
                    <a class="part" href="<?php echo $_SESSION["natigal2"] ?>"><?php echo $_SESSION["natigan2"] ?></a>

                    <a class="part" href="<?php echo $_SESSION["natigal3"] ?>"><?php echo $_SESSION["natigan3"] ?></a>
                
                    <a class="part" href="<?php echo $_SESSION["natigal4"] ?>"><?php echo $_SESSION["natigan4"] ?></a>
                </div>

                <div class="lines">
                    
                    <a class="part" href="<?php echo $_SESSION["natigal5"] ?>"><?php echo $_SESSION["natigan5"] ?></a>
                        
                    <a class="part" href="<?php echo $_SESSION["natigal6"] ?>"><?php echo $_SESSION["natigan6"] ?></a>

                    <a class="part" href="<?php echo $_SESSION["natigal7"] ?>"><?php echo $_SESSION["natigan7"] ?></a>
                
                    <a class="part" href="<?php echo $_SESSION["natigal8"] ?>"><?php echo $_SESSION["natigan8"] ?></a>
                </div>
                
                <div class="lines">
                      
                    <a class="part" href="<?php echo $_SESSION["natigal9"] ?>"><?php echo $_SESSION["natigan9"] ?></a>
                        
                    <a class="part" href="<?php echo $_SESSION["natigal10"] ?>"><?php echo $_SESSION["natigan10"] ?></a>

                    <a class="part" href="<?php echo $_SESSION["natigal11"] ?>"><?php echo $_SESSION["natigan11"] ?></a>
                
                    <a class="part" href="<?php echo $_SESSION["natigal12"] ?>"><?php echo $_SESSION["natigan12"] ?></a>
   
                </div>

            </div>
        </div>
        
    </body>
</html>