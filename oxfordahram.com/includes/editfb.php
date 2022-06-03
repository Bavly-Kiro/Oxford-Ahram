<?php
    session_start();

    if($_SESSION["admin"] != 1){

         echo "0";

         header("Location: ../baduser.php");
         exit();
        
        }

    require_once 'conn.php';


    $fbp1 = $_GET["fbp1"];
    $fbp2 = $_GET["fbp2"];

    $sqlf = "UPDATE general SET fbp1='$fbp1', fbp2='$fbp2' WHERE id=1";
    $resultf = mysqli_query($conn, $sqlf);

    if($resultf){

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
        echo "Error: " . $sqlf . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>