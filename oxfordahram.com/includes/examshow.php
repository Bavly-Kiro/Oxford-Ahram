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

       if($_SESSION["showexam"] == true){



                $sqllive = "SELECT * FROM exams WHERE grade = '$grade' AND course = '$course'";
                $resultlive = mysqli_query($conn, $sqllive);

                if($resultlive){

                     $rowlive = mysqli_fetch_assoc($resultlive);

                     $_SESSION["examlink"] = $rowlive['link'];

                     $_SESSION["examlink"] = addhttp($_SESSION["examlink"]);

                }else{
                    echo "Error: " . $sqllive . "<br>" . mysqli_error($conn);
                }


        }else{

            if($_SESSION["admin"] == 1 || $_SESSION["type"] == 2){

                $link = $_GET["link"];
                $date = date("Y/m/d");

                $sqllive = "UPDATE exams SET link='$link', date='$date' WHERE course = '$course' AND grade = '$grade'";
                $resultlive = mysqli_query($conn, $sqllive);

                if($resultlive){

                    echo 'تم التحديث بنجاح';

            ?>
                    </br>
                    <button onclick="back()"> Back </button>
                    
                        <script type="text/javascript">
                    
                                function back(){
                                        window.location = '../exams.php';
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