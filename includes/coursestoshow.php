<?php
    session_start();


    
    if(!($_SESSION["admin"] == 1 || isset($_SESSION["code"]))){

        echo "0";

        header("Location: ../baduser.php");
        exit();
       
       }

       require_once 'conn.php';

       if($_SESSION["showcourses"] == true){

                $sqlshowc = "SELECT * FROM courses LIMIT 20";
                $resultshowc = mysqli_query($conn, $sqlshowc);
            
                $names = array();

                if($resultshowc){

                    while($rowshowc = mysqli_fetch_assoc($resultshowc)){
                        
                        $names[] = $rowshowc['bname'];
                    
                     }

                     $_SESSION["course1"] = $names[0];
                     $_SESSION["course2"] = $names[1];
                     $_SESSION["course3"] = $names[2];
                     $_SESSION["course4"] = $names[3];
                     $_SESSION["course5"] = $names[4];
                     $_SESSION["course6"] = $names[5];
                     $_SESSION["course7"] = $names[6];
                     $_SESSION["course8"] = $names[7];
                     $_SESSION["course9"] = $names[8];
                     $_SESSION["course10"] = $names[9];
                     $_SESSION["course11"] = $names[10];
                     $_SESSION["course12"] = $names[11];
                     $_SESSION["course13"] = $names[12];
                     $_SESSION["course14"] = $names[13];
                     $_SESSION["course15"] = $names[14];
                     $_SESSION["course16"] = $names[15];
                     $_SESSION["course17"] = $names[16];
                     $_SESSION["course18"] = $names[17];
                     $_SESSION["course19"] = $names[18];
                     $_SESSION["course20"] = $names[19];


                }else{
                    echo "Error: " . $sqlshowc . "<br>" . mysqli_error($conn);
                }
        

       }else{

                $courseN = $_GET["courseN"];
                $newcn = $_GET["newcn"];
            
                $sqlcn = "UPDATE courses SET bname='$newcn' WHERE id='$courseN'";
                $resultcn = mysqli_query($conn, $sqlcn);
            
                if($resultcn){
            
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
                    echo "Error: " . $sqlcn . "<br>" . mysqli_error($conn);
                }

       }

mysqli_close($conn);
?>