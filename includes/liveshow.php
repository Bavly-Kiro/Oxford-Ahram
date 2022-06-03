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

       if($_SESSION["showlive"] == true){



                $sqllive = "SELECT * FROM live WHERE grade = '$grade' AND course = '$course'";
                $resultlive = mysqli_query($conn, $sqllive);

                if($resultlive){

                     $rowlive = mysqli_fetch_assoc($resultlive);

                     $_SESSION["livelink"] = $rowlive['livelink'];

                     $_SESSION["livelink"] = addhttp($_SESSION["livelink"]);

                }else{
                    echo "Error: " . $sqllive . "<br>" . mysqli_error($conn);
                }


        }else{

            if($_SESSION["admin"] == 1 || $_SESSION["type"] == 2){

                $link = $_GET["link"];
                $date = date("Y/m/d");

                $sqllive = "UPDATE live SET livelink='$link', date='$date' WHERE course = '$course' AND grade = '$grade'";
                $resultlive = mysqli_query($conn, $sqllive);

                if($resultlive){

                    echo 'تم التحديث بنجاح';

            ?>
                    </br>
                    <button onclick="back()"> Back </button>
                    
                        <script type="text/javascript">
                    
                                function back(){
                                        window.location = '../live.php';
                                }
                                
                    </script>
            <?php
                }else{
                    echo "Error: " . $sqllive . "<br>" . mysqli_error($conn);
                }

            }
        }

        function addhttp($url) {
            if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                $url = "http://" . $url;
            }
            return $url;
        }

    mysqli_close($conn);
    ?>