<?php
    session_start();


    
    if(!($_SESSION["admin"] == 1 || isset($_SESSION["code"]))){

        echo "0";

        header("Location: ../baduser.php");
        exit();
       
       }



       if($_SESSION["admin"] == 1 || $_SESSION["type"] == 2){

                    $upload = 'err'; 

                    if(!empty($_FILES['imagetoupload'])){ 

                        $file = $_FILES['imagetoupload'];
                        $name = $_FILES['imagetoupload']['name'];
                        $tmp_name = $_FILES['imagetoupload']['tmp_name'];
                        $error = $_FILES['imagetoupload']['error'];
            
                        $tempExtension = explode('.', $name);
            
                        $fileExtension = strtolower(end($tempExtension));
            
                        $isAllowed = array('jpg', 'png', 'jpeg', 'gif');

                        if(in_array($fileExtension, $isAllowed)){

                            if($error === 0){

                                $grade = $_SESSION["grade"];
                                $course = $_SESSION["course"];
                                $link = $_GET["link"];
                                $id = $_SESSION["imageidtoupload"];
            
                                $newFileName = $grade . $course . $id . "." . $fileExtension;
                                $fileDestination = "uploads/images/" . $newFileName;
            
                                if(move_uploaded_file($tmp_name, $fileDestination)){

                                    $date = date("Y/m/d");
                                    $fileDestinationnew = "includes/" . $fileDestination;
            
                   require_once 'conn.php';

                                    $sqlshowb = "UPDATE images SET link='$fileDestinationnew', date='$date' WHERE grade = '$grade' AND course = '$course' AND id = '$id'";
                                    $resultshowb = mysqli_query($conn, $sqlshowb);
            
                                    if($resultshowb){
            
                                        $upload = 'ok'; 
            
            
                                    }else{
                                        $upload = "Error: " . $sqlshowb . "<br>" . mysqli_error($conn);
                                    }


                                }else{

                                    $upload =  'problem in moving file'; 


                                }

                            }else{

                                $upload =  'error variable'; 

                            }


                        }else{

                            $upload = 'not pdf'; 

                        }

                    }else{
                        $upload = 'no file choosed'; 
    
    
                    }
        }else{

            header("Location: ../baduser.php");
            exit();

        }

echo $upload; 


mysqli_close($conn);
?>