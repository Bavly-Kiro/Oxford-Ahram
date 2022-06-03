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
        <meta name="description" content=""><!--put description-->
        <title>الدورات التعليميه,سنتر اكسفورد التعليمى </title>
        <link rel="shortcut icon" type="image/png" href="../images/profile photo.jpeg">
        <link rel="stylesheet" href="../css/courses.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,700&display=swap" rel="stylesheet">

    </head>
    <body onload="test();">
        
        <?php
                 require_once 'navbar.php';
        ?>
        
        <br><br>
        
        <div class="features">
            <div class="container">
                <div class="lines">
                    
                        <a class="part" href="determinetheeducationalgrade.php?course=1"><?php echo $_SESSION["course1"] ?></a>
                        
                        <a class="part" href="determinetheeducationalgrade.php?course=2"><?php echo $_SESSION["course2"] ?></a>

                        <a class="part" href="determinetheeducationalgrade.php?course=3"><?php echo $_SESSION["course3"] ?></a>
                    
                        <a class="part" href="determinetheeducationalgrade.php?course=4"><?php echo $_SESSION["course4"] ?></a>
                </div>

                <div class="lines">
                    
                    <a class="part" href="determinetheeducationalgrade.php?course=5"><?php echo $_SESSION["course5"] ?></a>
                        
                    <a class="part" href="determinetheeducationalgrade.php?course=6"><?php echo $_SESSION["course6"] ?></a>

                    <a class="part" href="determinetheeducationalgrade.php?course=7"><?php echo $_SESSION["course7"] ?></a>
                    
                    <a class="part" href="determinetheeducationalgrade.php?course=8"><?php echo $_SESSION["course8"] ?></a>
                </div>
                
                <div class="lines">
                    
                        
                        
                      
                    <a class="part" href="determinetheeducationalgrade.php?course=9"><?php echo $_SESSION["course9"] ?></a>
                     
                    <a class="part" href="determinetheeducationalgrade.php?course=10"><?php echo $_SESSION["course10"] ?></a>
                    
                    <a class="part" href="determinetheeducationalgrade.php?course=11"><?php echo $_SESSION["course11"] ?></a>
                    
                    <a class="part" href="determinetheeducationalgrade.php?course=12"><?php echo $_SESSION["course12"] ?></a>
   
                </div>
                
                <div class="lines">
                    <a class="part" href="determinetheeducationalgrade.php?course=13"><?php echo $_SESSION["course13"] ?></a>
                    
                    <a class="part" href="determinetheeducationalgrade.php?course=14"><?php echo $_SESSION["course14"] ?></a>
                  
                    <a class="part" href="determinetheeducationalgrade.php?course=15"><?php echo $_SESSION["course15"] ?></a>
                    
                    <a class="part" href="determinetheeducationalgrade.php?course=16"><?php echo $_SESSION["course16"] ?></a>

                        
                    
                        
                </div>
                
                <div class="lines">
                    <a class="part" href="determinetheeducationalgrade.php?course=17"><?php echo $_SESSION["course17"] ?></a>
                     
                    <a class="part" href="determinetheeducationalgrade.php?course=18"><?php echo $_SESSION["course18"] ?></a>
                      
                    <a class="part" href="determinetheeducationalgrade.php?course=19"><?php echo $_SESSION["course19"] ?></a>

                    <a class="part" href="determinetheeducationalgrade.php?course=20"><?php echo $_SESSION["course20"] ?></a>
                        
                    
                   
                    
                       
                </div>
            </div>
        </div>
        


        <script type="text/javascript">

            function test(){

                var type = <?php echo $_SESSION["type"]; ?> ;

                if(<?php if($_SESSION["admin"] == 1 || isset($_SESSION["code"])){ echo "0";}else{echo "true";} ?>){
                    window.location = 'baduser.php';
                   // window.alert("helooooo");
                 }else if(type == 2){

                    window.location = 'determinetheeducationalgrade.php?course=xx';

                 }
            }
        
        </script>
        
        
    </body>
</html>