<?php
    session_start();

    date_default_timezone_set("Africa/Cairo");

    require_once 'includes/conn.php';

     $_SESSION["admin"] = 0;
                
         
        $sql = "SELECT * FROM general WHERE id = 1";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        $_SESSION["fbp1"] = 0;
        $_SESSION["fbp2"] = 0;
        $_SESSION["phoneNumber"] = 0;
        $_SESSION["phoneNumber1"] = 0;
        $_SESSION["phoneNumber2"] = 0;
        $_SESSION["address"] = 0;

        if($rowCount > 0){

                while($row = mysqli_fetch_assoc($result)){
                    $_SESSION["fbp1"] = $row['fbp1'];
                    $_SESSION["fbp2"] = $row['fbp2'];
                    $_SESSION["phoneNumber"] = "اتصل بنا: " . $row['phoneNumber1'] . " - " . $row['phoneNumber2'] ;
                    $_SESSION["phoneNumber1"] = $row['phoneNumber1'];
                    $_SESSION["phoneNumber2"] = $row['phoneNumber2'];
                    $_SESSION["address"] = $row['address'];

                }

        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        if (isset($_SESSION["code"])) {

            $codee = $_SESSION["code"];

            $sql = "SELECT * FROM users WHERE code = '$codee'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);

            if($rowCount > 0){

                while($row = mysqli_fetch_assoc($result)){
                        if($row['type'] == admin){
                                $_SESSION["admin"] = 1;
                                $_SESSION["type"] = 0;
                        }else{
                            $_SESSION["admin"] = 0;
                            $_SESSION["type"] = $row['type'];
                            $_SESSION["grade"] = $row['year'];
                        }
                    
                    }
            
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
    }


mysqli_close($conn);
?>