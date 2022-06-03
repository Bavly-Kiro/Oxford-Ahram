<?php
    session_start();

    if($_SESSION["admin"] != 1){

         echo "0";

         header("Location: ../baduser.php");
         exit();
        
        }

    require_once 'conn.php';


    $phone1 = $_GET["phone1"];
    $phone2 = $_GET["phone2"];
    $address = $_GET["address"];

    $sqlph = "UPDATE general SET phoneNumber1='$phone1', phoneNumber2='$phone2', address='$address' WHERE id=1";
    $resultph = mysqli_query($conn, $sqlph);

    if($resultph){

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
        echo "Error: " . $sqlph . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>