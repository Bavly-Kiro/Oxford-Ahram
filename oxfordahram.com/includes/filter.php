<?php


require_once 'conn.php';

date_default_timezone_set("Africa/Cairo");


//$sql = "DELETE FROM table_name WHERE condition";


$sql = "SELECT * FROM courses";
$result = mysqli_query($con, $sql);
$rowCount = mysqli_num_rows($result);


if($result){

    if($rowCount > 0){

        while($row = mysqli_fetch_assoc($result)){
            
            if($row['date'] != ""){

                if(strtotime($row['date']) < strtotime('-30 days')){

                    $code = $row['code'];



                }

            }

        }

    }

}else{

    $myfile = fopen("logs.txt", "a") or die("Unable to open file!");
    $txt = date("Y/m/d") . "Error: " . $sql . "    " . mysqli_error($conn) . PHP_EOL;
    fwrite($myfile, $txt);
    fclose($myfile);


}
    
mysqli_close($conn);
?>