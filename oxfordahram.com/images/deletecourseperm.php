<?php
    session_start();

    if($_SESSION["admin"] != 1){

         echo "0";

         header("Location: ../baduser.php");
         exit();
        
        }

    require_once 'conn.php';


    date_default_timezone_set("Africa/Cairo");

    $course = $_GET["course"];
    $code = $_GET["code"];
    
    
        $sqldeletec = "DELETE FROM courses WHERE course = '$course' AND code = '$code'";
        $resultdeletec = mysqli_query($conn, $sqldeletec);

        if($resultdeletec){
    
                                            echo ' تم المسح بنجاح ';
                                        
                                        ?>
                                        </br>
                                        <button onclick="backk()"> Back </button>
                                                
                                        <script type="text/javascript">
                                                
                                        function backk(){
                                                window.location = '../';
                                        }
                                                            
                                         </script>
                                         
                                        <?php
                
    
    
           }else{
                        echo "Error: " . $sqldeletec . "<br>" . mysqli_error($conn);
        }

    mysqli_close($conn);
?>