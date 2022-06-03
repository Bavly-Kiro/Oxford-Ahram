<?php
    session_start();


    
    if(!($_SESSION["admin"] == 1 || isset($_SESSION["code"]))){

        echo "0";

        header("Location: ../baduser.php");
        exit();
       
       }

       require_once 'conn.php';

       if($_SESSION["showbooks"] == true){

                $grade = $_SESSION["grade"];
                $course = $_SESSION["course"];


                $sqlshowb = "SELECT * FROM books WHERE grade = '$grade' AND course = '$course'";
                $resultshowb = mysqli_query($conn, $sqlshowb);
            
                $names = array();
                $links = array();

                if($resultshowb){

                    while($rowshowb = mysqli_fetch_assoc($resultshowb)){
                        
                        $names[] = $rowshowb['name'];
                        $links[] = $rowshowb['link'];

                     }

                     $_SESSION["bookn1"] = $names[0];
                     $_SESSION["bookn2"] = $names[1];
                     $_SESSION["bookn3"] = $names[2];
                     $_SESSION["bookn4"] = $names[3];
                     $_SESSION["bookn5"] = $names[4];
                     $_SESSION["bookn6"] = $names[5];
                     $_SESSION["bookn7"] = $names[6];
                     $_SESSION["bookn8"] = $names[7];
                     $_SESSION["bookn9"] = $names[8];
                     $_SESSION["bookn10"] = $names[9];
                     $_SESSION["bookn11"] = $names[10];
                     $_SESSION["bookn12"] = $names[11];

                     $_SESSION["bookl1"] = $links[0];
                     $_SESSION["bookl2"] = $links[1];
                     $_SESSION["bookl3"] = $links[2];
                     $_SESSION["bookl4"] = $links[3];
                     $_SESSION["bookl5"] = $links[4];
                     $_SESSION["bookl6"] = $links[5];
                     $_SESSION["bookl7"] = $links[6];
                     $_SESSION["bookl8"] = $links[7];
                     $_SESSION["bookl9"] = $links[8];
                     $_SESSION["bookl10"] = $links[9];
                     $_SESSION["bookl11"] = $links[10];
                     $_SESSION["bookl12"] = $links[11];

                }else{
                    echo "Error: " . $sqlshowb . "<br>" . mysqli_error($conn);
                }
        

       }else{
           
            if($_SESSION["admin"] == 1 || $_SESSION["type"] == 2){

                $upload = 'err'; 

                if(!empty($_FILES['fileToUpload'])){ 


                                $file = $_FILES['fileToUpload'];
                                $name = $_FILES['fileToUpload']['name'];
                                $tmp_name = $_FILES['fileToUpload']['tmp_name'];
                                $error = $_FILES['fileToUpload']['error'];

                                $tempExtension = explode('.', $name);

                                $fileExtension = strtolower(end($tempExtension));

                                $isAllowed = array('pdf');

                                if(in_array($fileExtension, $isAllowed)){


                                    if($error === 0){

                                        $grade = $_SESSION["grade"];
                                        $course = $_SESSION["course"];
                                        $bookselectiontn = $_POST['bookselectiont'];

                                        $newFileName = $grade . $course . $bookselectiontn . "." . $fileExtension;
                                        $fileDestination = "uploads/books/" . $newFileName;

                                        if(move_uploaded_file($tmp_name, $fileDestination)){


                                            $date = date("Y/m/d");
                                            $bbname = $_POST['newbn'];
                                            $fileDestinationnew = "includes/" . $fileDestination;

                                            $sqlshowb = "UPDATE books SET link='$fileDestinationnew', date='$date', name='$bbname' WHERE grade = '$grade' AND course = '$course' AND num = '$bookselectiontn'";
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

                echo $upload; 
            }else{

                header("Location: ../baduser.php");
                exit();

            }
       }

mysqli_close($conn);
?>