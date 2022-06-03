<?php
    session_start();

   if(isset($_POST['codeCreate'])){

        require_once 'conn.php';

        $codecheck = $_POST['codeCreate'];

        $sqlcheck = "SELECT * FROM users WHERE code = '$codecheck'";
        $resultcheck = mysqli_query($conn, $sqlcheck);
        $rowCountcheck = mysqli_num_rows($resultcheck);

        if($resultcheck){
            
                if($rowCountcheck > 0){

                    echo '<script language="javascript">';
                    echo 'alert("الكود مستخدم من قبل")';
                    echo '</script>';

                    echo "<script>window.close();</script>";

                }else{
                    
                    $typereg = $_POST['account-type'];
                    $codereg = $_POST['codeCreate'];
                    $passreg = $_POST['passrepeat'];
                    $namereg = $_POST['name'];
                    $schoolreg = $_POST['school'];  
                    $yearreg = $_POST['year'];
                    $emailreg = $_POST['email'];
                    $phonereg = $_POST['phone'];
                    $pphonereg = $_POST['pphone'];
                    $addressreg = $_POST['address'];

                    $sqlreg = "INSERT INTO users (code, pass, name, school, year, email, phone, pphone, address, type, signednow) VALUES ('$codereg', '$passreg', '$namereg', '$schoolreg', '$yearreg', '$emailreg', '$phonereg', '$pphonereg', '$addressreg', '$typereg', '0')";
                    $resultreg = mysqli_query($conn, $sqlreg);

                    if($resultreg){

                        echo '<script language="javascript">';
                        echo 'alert("تم التسجيل بنجاح")';
                        echo '</script>';

                        echo "<script>window.close();</script>";

                    }else{

                        echo "Error: " . $sqlreg . "<br>" . mysqli_error($conn);

                    }
                }

            }else{

                echo "Error: " . $sqlcheck . "<br>" . mysqli_error($conn);

            }


   }

mysqli_close($conn);
?>