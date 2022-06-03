<?php
    session_start();

    require_once 'includes/checkperm.php';
    

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content=""><!--Developer put description-->
        <title>الصفوف الدراسيه,سنتر اكسفورد التعليمى </title>
        <link rel="shortcut icon" type="image/png" href="../images/profile photo.jpeg">
        <meta name="Viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="Handheldfriendly" content="true">
        <link rel="stylesheet" href="../css/determine%20the%20educational%20grade.css">
        <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=Reem+Kufi&display=swap" rel="stylesheet">
    </head>


    <body onload="test();">
       
        
           <div class="lessons-tabs"> 
               
               <a class="text-link" href="lessons.php?grade=1">المرحله الاعداديه</a> 
       
               <a class="text-link" href="lessons.php?grade=2">الصف الاول الثانوى</a>
        
               <a class="text-link" href="lessons.php?grade=3">الصف الثانى الثانوى</a>
        
               <a class="text-link" href="lessons.php?grade=4">الصف الثالث الثانوى</a>
        

               <script type="text/javascript">

                function test(){
    
                    var type = <?php echo $_SESSION["type"]; ?> ;
    
                    if(<?php if($_SESSION["admin"] == 1 || isset($_SESSION["code"])){ echo "0";}else{echo "true";} ?>){
                        window.location = 'baduser.php';
                       // window.alert("helooooo");
                     }
                }
            
            </script>
            
            
        </body>
    </html>
