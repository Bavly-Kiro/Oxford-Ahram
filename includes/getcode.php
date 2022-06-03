<?php
    session_start();

    if($_SESSION["admin"] != 1){

         echo "0";

         header("Location: ../baduser.php");
         exit();
        
        }

    require_once 'conn.php';

    $phone = $_GET["phone"];
    $pphone = $_GET["pphone"];

    $sqlgetc = "SELECT * FROM users WHERE phone = '$phone' AND pphone = '$pphone'";
    $resultgetc = mysqli_query($conn, $sqlgetc);
    $rowCountgetc = mysqli_num_rows($resultgetc);


    if($resultgetc){


        if($rowCountgetc > 0){

            while($rowgetc = mysqli_fetch_assoc($resultgetc)){

                echo $rowgetc['code']."</br>";
                echo $rowgetc['pass']."</br>";
                echo $rowgetc['name']."</br>";
                echo $rowgetc['school']."</br>";

                if($rowgetc['year'] == 1){
                     echo "المرحلة الاعدادية"."</br>";
                }else if($rowgetc['year'] == 2){
                    echo "الصف الاول الثانوي"."</br>";
                }else if($rowgetc['year'] == 3){
                    echo "الصف الثاني الثانوي"."</br>";
                }else if($rowgetc['year'] == 4){
                    echo "الصف الثالث الثانوي"."</br>";
                }

                echo $rowgetc['email']."</br>";
                echo $rowgetc['phone']."</br>";
                echo $rowgetc['pphone']."</br>";
                echo $rowgetc['address']."</br>";

                if($rowgetc['type'] == 1){
                    echo "طالب"."</br>";
               }else if($rowgetc['type'] == 2){
                   echo "مدرس"."</br>";
               }

            }

        }else{

            echo 'لا يوجد اي بيانات تاكد من الارقام'; 

        }
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
        echo "Error: " . $sqlgetc . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>