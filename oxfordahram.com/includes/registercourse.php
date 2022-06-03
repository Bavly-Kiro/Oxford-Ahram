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
    $date = date("Y/m/d");
    
        $sqlcheck = "SELECT * FROM courses WHERE code = '$code'";
        $resultcheck = mysqli_query($conn, $sqlcheck);
        $rowCountcheck = mysqli_num_rows($resultcheck);

        if($resultcheck){
            
            if($rowCountcheck > 0){
                //check if teacher or student
                        $sqlcheckk = "SELECT * FROM users WHERE code = '$code'";
                        $resultcheckk = mysqli_query($conn, $sqlcheckk);
                    
                        if($resultcheckk){
                            
                            $rowcheckk = mysqli_fetch_assoc($resultcheckk);
                            $rowcheckkk = mysqli_fetch_assoc($resultcheck);

                            if($rowcheckk['type'] == 2){
                                
                                                    
                                        echo 'هذا الكود مرتبط بالفعل بكورس رقم:';
                                        
                                        echo $rowcheckkk['course'];
                                        
                                        echo ' قم بالمسح اولا ';
                                        
                                        ?>
                                        </br>
                                        <button onclick="backk()"> Back </button>
                                                
                                        <script type="text/javascript">
                                                
                                        function backk(){
                                                window.location = '../enteryteacheraccountpermiation.php';
                                        }
                                                            
                                         </script>
                                         
                                        <?php

                            }else if($rowcheckk['type'] == 1){
                                
                                $course = $_GET["course"];
                                $code = $_GET["code"];
                                $date = date("Y/m/d");
                                        
                                                $sqlregc = "INSERT INTO courses (bname, course, code, date) VALUES ('', '$course', '$code', '$date')";
                                                $resultregc = mysqli_query($conn, $sqlregc);
                                            
                                                if($resultregc){
                                            
                                                    echo 'تم التحديث بنجاح';
                                            
                                            ?>
                                                    </br>
                                                    <button onclick="back()"> Back </button>
                                                    
                                                         <script type="text/javascript">
                                                    
                                                                function back(){
                                                                        window.location = '../index.php';
                                                                }
                                                                
                                                    </script>
                                            <?php
                                                }else{
                                                    echo "Error: " . $sqlregc . "<br>" . mysqli_error($conn);
                                                }
                            }
                              
                              
                        }else{
                            
                             echo "Error: " . $sqlcheckk . "<br>" . mysqli_error($conn);
                        }   
                        
                        
            }else{    

                $course = $_GET["course"];
                $code = $_GET["code"];
                $date = date("Y/m/d");
                        
                                $sqlregc = "INSERT INTO courses (bname, course, code, date) VALUES ('', '$course', '$code', '$date')";
                                $resultregc = mysqli_query($conn, $sqlregc);
                            
                                if($resultregc){
                            
                                    echo 'تم التحديث بنجاح';
                            
                            ?>
                                    </br>
                                    <button onclick="back()"> Back </button>
                                    
                                         <script type="text/javascript">
                                    
                                                function back(){
                                                        window.location = '../index.php';
                                                }
                                                
                                    </script>
                            <?php
                                }else{
                                    echo "Error: " . $sqlregc . "<br>" . mysqli_error($conn);
                                }

            }
            
        }else{
                        echo "Error: " . $sqlcheck . "<br>" . mysqli_error($conn);
        }

    mysqli_close($conn);
?>