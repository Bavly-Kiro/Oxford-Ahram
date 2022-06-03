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
    
    
        $sqld = "DELETE FROM courses WHERE course = '$course' AND code = '$code'";
        $resultd = mysqli_query($conn, $sqld);

        if($resultd){
    
    
                                
                                    echo 'تم المسح بنجاح';
                            
                            ?>
                                    </br>
                                    <button onclick="back()"> Back </button>
                                    
                                         <script type="text/javascript">
                                    
                                                function back(){
                                                        window.location = '../enteryteacheraccountpermiation.php';
                                                }
                                                
                                    </script>
                            <?php
    
    
            }else{
                        echo "Error: " . $sqld . "<br>" . mysqli_error($conn);
        }

    mysqli_close($conn);
?>