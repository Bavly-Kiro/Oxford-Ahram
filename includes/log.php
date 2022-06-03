<?php
    
     session_start();


    if(isset($_POST['submit'])){

        require_once 'conn.php';

        $code = $_POST['code'];
        $pass = $_POST['pass'];

        if(empty($code) || empty($pass)){
              header("Location: ../login.php?empty");
              exit();
        }else{

            $sql = "SELECT * FROM users WHERE code = ?";
            $stmt = mysqli_stmt_init($conn);
            
            if(!mysqli_stmt_prepare($stmt, $sql)){
              //echo "sql error 5 !!!";
              header("Location: ../login.php?errorCantConnect");
              exit();
                
            }else{

                mysqli_stmt_bind_param($stmt, "s", $code);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if($row = mysqli_fetch_assoc($result)){

                    if($row['pass'] == $pass){

                        $sql = "UPDATE users SET signednow = 1 WHERE code = '$code'";
                        $result = mysqli_query($conn, $sql);
                        
                        $_SESSION["code"] = $row['code'];
                        header("Location: ../index.php");
                        exit();
                    }else{
                        
                      //echo "wrong pass";
                      header("Location: ../login.php?WrongPassword");
                      exit();
                      
                    }

                }else{
                    //echo "no user with that code!";
                      header("Location: ../login.php?noUserWithThatCode");
                      exit();
                }



            }

        }

    }
    
mysqli_stmt_close($stmt);    
mysqli_close($conn);
?>