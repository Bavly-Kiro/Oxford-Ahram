<?php
    session_start();


    if($_SESSION["admin"] != 1){

        if(!(isset($_SESSION["code"])) || $_SESSION["access"] == 0){
                header("Location: ../baduser.php");
                exit();
        }

    }


    if($_GET["grade"] != 0){

        $_SESSION["grade"] = $_GET["grade"];

    }


    if($_SESSION["admin"] == 1 || $_SESSION["type"] == 2){

        require_once 'includes/conn.php';

        $course = $_SESSION["course"];

        $sqlcourse = "SELECT * FROM courses WHERE course = '$course'";
        $resultcourse = mysqli_query($conn, $sqlcourse);
        $rowCountcourse = mysqli_num_rows($resultcourse);

        if($resultcourse){

            echo "عدد المسجلين بهذا الكورس كله (من ضمنهم المدرس)" . $rowCountcourse;

        }else{
            echo "Error: " . $sqlcourse . "<br>" . mysqli_error($conn);
        }
        
    }


?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content=""><!--Developer put description-->
        <title>المحتوي,سنتر اكسفورد التعليمى </title>
        <link rel="shortcut icon" type="image/png" href="../images/profile photo.jpeg">
        <meta name="Viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="Handheldfriendly" content="true">
        <link rel="stylesheet" href="../css/lessons.css">
        <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=Reem+Kufi&display=swap" rel="stylesheet">
    </head>

    <body>
       
        
           <div class="lessons-tabs"> 
               
               <a class="text-link" href="books.php">الكتب</a> 
       
               <a class="text-link" href="photostab.php">الصور</a>
        
               <a class="text-link" href="videotab.php">الفيديوهات</a>
        
               <a class="text-link" href="live.php">البث المباشر</a>
        
               <a class="text-link" href="exams.php">الامتحانات</a>
        
               <a class="text-link" href="results.php">النتائج</a>
        </div>
        
    </body>
</html>