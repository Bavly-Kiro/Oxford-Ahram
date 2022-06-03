<?php
    session_start();

    if(!($_SESSION["admin"] == 1 || isset($_SESSION["code"]))){

        echo "0";

        header("Location: ../baduser.php");
        exit();
       
       }


    require_once 'conn.php';

    $course = $_GET["course"];
    $codeco = $_SESSION["code"];

    if(!($_SESSION["admin"] == 1)){

            if($course == 'xx'){ //teacher
        
                    $sqlcourse = "SELECT * FROM courses WHERE code = '$codeco'";
                    $resultcourse = mysqli_query($conn, $sqlcourse);
                    $rowCountcourse = mysqli_num_rows($resultcourse);
        
                    if($resultcourse){
        
                                if($rowCountcourse > 0){
        
                                    $rowcourse = mysqli_fetch_assoc($resultcourse);
        
                                    if(strtotime($rowcourse['date']) < strtotime('-120 days')){
        
                                        $_SESSION["access"] = 0;
                                        header("Location: ../teachernoperm.php?expiredAccess");
                                        exit();
        
                                    }else{
        
                                         $_SESSION["course"] = $rowcourse['course'];
                                         $_SESSION["access"] = 1;
        
                                    }
        
                                }else{
        
                                    $_SESSION["access"] = 0;
                                    header("Location: ../teachernoperm.php");
                                    exit();
        
        
                                }
        
                    }else{
                        echo "Error: " . $sqlcourse . "<br>" . mysqli_error($conn);
                    }
        
            }else{
        
        
                $sqlcourse = "SELECT * FROM courses WHERE code = '$codeco' AND course = '$course'";
                $resultcourse = mysqli_query($conn, $sqlcourse);
                $rowCountcourse = mysqli_num_rows($resultcourse);
        
                if($resultcourse){
        
                            if($rowCountcourse > 0){
        
                                $rowcourse = mysqli_fetch_assoc($resultcourse);
                                $_SESSION["course"] = $rowcourse['course'];
        
                                if (strtotime($rowcourse['date']) < strtotime('-30 days')){
        
                                    $_SESSION["access"] = 0;
                                    header("Location: ../studentnopermtime.php");
                                    exit();
        
                                }
        
                                $_SESSION["access"] = 1;
                                header("Location: ../lessons.php?grade=0");
                                exit();
        
                            }else{
        
                                $_SESSION["access"] = 0;
                                header("Location: ../studentnoperm.php");
                                exit();
        
        
                            }
        
                }else{
                    echo "Error: " . $sqlcourse . "<br>" . mysqli_error($conn);
                }
        
        
        
            }
            
    }else{
        
        $_SESSION["access"] = 1;
        $_SESSION["course"] = $course;
        
    }

    mysqli_close($conn);
?>