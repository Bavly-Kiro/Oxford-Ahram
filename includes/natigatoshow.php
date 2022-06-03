<?php
    session_start();


    
    if(!($_SESSION["admin"] == 1 || isset($_SESSION["code"]))){

        echo "0";

        header("Location: ../baduser.php");
        exit();
       
       }

       require_once 'conn.php';

       if($_SESSION["shownatiga"] == true){

                $grade = $_SESSION["grade"];
                $course = $_SESSION["course"];


                $sqlshown = "SELECT * FROM natiga WHERE grade = '$grade' AND course = '$course'";
                $resultshown = mysqli_query($conn, $sqlshown);
            
                $names = array();
                $links = array();

                if($resultshown){

                    while($rowshown = mysqli_fetch_assoc($resultshown)){
                        
                        $names[] = $rowshown['name'];
                        $links[] = $rowshown['link'];

                     }

                     $_SESSION["natigan1"] = $names[0];
                     $_SESSION["natigan2"] = $names[1];
                     $_SESSION["natigan3"] = $names[2];
                     $_SESSION["natigan4"] = $names[3];
                     $_SESSION["natigan5"] = $names[4];
                     $_SESSION["natigan6"] = $names[5];
                     $_SESSION["natigan7"] = $names[6];
                     $_SESSION["natigan8"] = $names[7];
                     $_SESSION["natigan9"] = $names[8];
                     $_SESSION["natigan10"] = $names[9];
                     $_SESSION["natigan11"] = $names[10];
                     $_SESSION["natigan12"] = $names[11];

                     $_SESSION["natigal1"] = $links[0];
                     $_SESSION["natigal2"] = $links[1];
                     $_SESSION["natigal3"] = $links[2];
                     $_SESSION["natigal4"] = $links[3];
                     $_SESSION["natigal5"] = $links[4];
                     $_SESSION["natigal6"] = $links[5];
                     $_SESSION["natigal7"] = $links[6];
                     $_SESSION["natigal8"] = $links[7];
                     $_SESSION["natigal9"] = $links[8];
                     $_SESSION["natigal10"] = $links[9];
                     $_SESSION["natigal11"] = $links[10];
                     $_SESSION["natigal12"] = $links[11];

                }else{
                    echo "Error: " . $sqlshown . "<br>" . mysqli_error($conn);
                }
        

       }else{

        if($_SESSION["admin"] == 1 || $_SESSION["type"] == 2){

                $upload = 'err'; 

                if(!empty($_FILES['fileresultToUpload'])){ 


                                $file = $_FILES['fileresultToUpload'];
                                $name = $_FILES['fileresultToUpload']['name'];
                                $tmp_name = $_FILES['fileresultToUpload']['tmp_name'];
                                $error = $_FILES['fileresultToUpload']['error'];

                                $tempExtension = explode('.', $name);

                                $fileExtension = strtolower(end($tempExtension));

                                $isAllowed = array('pdf');

                                if(in_array($fileExtension, $isAllowed)){


                                    if($error === 0){

                                        $grade = $_SESSION["grade"];
                                        $course = $_SESSION["course"];
                                        $resultselectiontn = $_POST['resultselectiontn'];

                                        $newFileName = $grade . $course . $resultselectiontn . "." . $fileExtension;
                                        $fileDestination = "uploads/results/" . $newFileName;

                                        if(move_uploaded_file($tmp_name, $fileDestination)){


                                            $date = date("Y/m/d");
                                            $bnname = $_POST['newnn'];
                                            $fileDestinationnew = "includes/" . $fileDestination;

                                            $sqlshown = "UPDATE natiga SET link='$fileDestinationnew', date='$date', name='$bnname' WHERE grade = '$grade' AND course = '$course' AND num = '$resultselectiontn'";
                                            $resultshown = mysqli_query($conn, $sqlshown);

                                            if($resultshown){

                                                $upload = 'ok'; 


                                            }else{
                                                $upload = "Error: " . $sqlshown . "<br>" . mysqli_error($conn);
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

                echo $upload; 
            }
       }

mysqli_close($conn);
?>