<?php
    session_start();


    
    if(!($_SESSION["admin"] == 1 || isset($_SESSION["code"]))){

        echo "0";

        header("Location: ../baduser.php");
        exit();
       
       }

       require_once 'conn.php';

       
       $grade = $_SESSION["grade"];
       $course = $_SESSION["course"];

       $limit = 48 * $group;

       $sqlshowim = "SELECT * FROM vidoes WHERE grade = '$grade' AND course = '$course' LIMIT 48 OFFSET $limit";
       $resultshowim = mysqli_query($conn, $sqlshowim);
   
      // $names = array();

       if($resultshowim){

           while($rowshowim = mysqli_fetch_assoc($resultshowim)){
               
              $link = "";
              $id = $rowshowim['id'];

              // $names[] = $rowshown['name'];

              if($rowshowim['link'] === ""){
                $link = "images/videoplayback.mp4" . "?" . time();

                echo "<a class='container' target='_blank' href='showvideo.php?link=&id=$id'><video class='vid'><source src='$link' type='video/mp4'></video></a>";
                break;
              }

              $link = $rowshowim['link'] . "?" . time();

               echo "<a class='container' target='_blank' href='showvideo.php?link=$link&id=$id'><video class='vid'><source src='$link' type='video/mp4'></video></a>";

            }

        }else{
            echo "Error: " . $sqlshowim . "<br>" . mysqli_error($conn);
        }

       mysqli_close($conn);
?>