<?php
    session_start();

    ini_set('upload_max_filesize', '10240M');
    ini_set('post_max_size', '10245M');
    ini_set('max_allowed_packet', '10248M');
    ini_set('max_execution_time', '20000'); //300 seconds = 5 minutes
    ini_set('max_input_time', '20000');

    
    if(!($_SESSION["admin"] == 1 || isset($_SESSION["code"]))){

        echo "0";

        header("Location: ../baduser.php");
        exit();
       
       }


       if($_SESSION["admin"] == 1 || $_SESSION["type"] == 2){

                // (A) FUNCTION TO FORMULATE SERVER RESPONSE
                function verbose($ok=1,$info=""){
                // THROW A 400 ERROR ON FAILURE
                if ($ok==0) { http_response_code(400); }
                die(json_encode(["ok"=>$ok, "info"=>$info]));
                }

                // (B) INVALID UPLOAD
                if (empty($_FILES) || $_FILES['file']['error']) {


                    
                }

                // (C) UPLOAD DESTINATION
                // ! CHANGE FOLDER IF REQUIRED !
                $filePath = "uploads/videos/";
                if (!file_exists($filePath)) { 
                if (!mkdir($filePath, 0777, true)) {
                    verbose(0, "Failed to create $filePath");
                }
                }
                $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
                $filePath = $filePath . DIRECTORY_SEPARATOR . $fileName; //uploads/videos/gdgdv.mp4

                // (D) DEAL WITH CHUNKS
                $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
                $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
                $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                if ($out) {
                $in = @fopen($_FILES['file']['tmp_name'], "rb");
                if ($in) {
                    while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
                } else {
                    verbose(0, "Failed to open input stream");
                }
                @fclose($in);
                @fclose($out);
                @unlink($_FILES['file']['tmp_name']);
                } else {
                verbose(0, "Failed to open output stream");
                }

                // (E) CHECK IF FILE HAS BEEN UPLOADED
                if (!$chunks || $chunk == $chunks - 1) {

                    $grade = $_SESSION["grade"];
                    $course = $_SESSION["course"];
                    $link = $_GET["link"];
                    $id = $_SESSION["imageidtoupload"];

                    $newFileName = $grade . $course . $id . "." . "mp4";

                    rename("{$filePath}.part", "uploads/videos/" .$newFileName);


                    $date = date("Y/m/d");
                    $fileDestinationnew = "includes/uploads/videos/" . $newFileName;

                        require_once 'conn.php';


                    $sqlshowb = "UPDATE vidoes SET link='$fileDestinationnew', date='$date' WHERE grade = '$grade' AND course = '$course' AND id = '$id'";
                    $resultshowb = mysqli_query($conn, $sqlshowb);

                    if($resultshowb){

                        $upload = 'ok'; 


                    }else{
                       // $upload = "Error: " . $sqlshowb . "<br>" . mysqli_error($conn);
                    }

                
                }
                verbose(1, "Upload OK");

}else{

    header("Location: ../baduser.php");
    exit();

}


mysqli_close($conn);
?>