<?php
session_start();


if($_SESSION["admin"] != 1){

    if(!(isset($_SESSION["code"])) || $_SESSION["access"] == 0 || $_SESSION["type"] == 1){
            header("Location: ../baduser.php");
            exit();
    }

}

$link = $_GET["link"];
$id = $_GET["id"];
$_SESSION["imageidtoupload"] = $id;


$teext = "اختر الفيديو لوضعه او استبداله بفيديو رقم:  " . $id;

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content=""><!--Developer put description-->
        <title>سنتر اكسفورد التعليمى </title>
        <link rel="shortcut icon" type="image/png" href="../images/profile photo.jpeg">
        <meta name="Viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="Handheldfriendly" content="true">
        <link rel="stylesheet" href="../css/setting.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>

    <body>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/plupload/3.1.2/plupload.full.min.js"></script>

<script>
window.addEventListener("load", function () {
  var uploader = new plupload.Uploader({
    runtimes: 'html5,html4',
    browse_button: 'pickfiles',
    url: 'includes/uploadvid.php',
    chunk_size: '5mb',
    max_retries: 2000000,
    multi_selection: false,
    filters: {
    //  max_file_size: '150mb',
      mime_types: [{title: "Video files", extensions: "mp4"}]
    },
    
    init: {
      PostInit: function () {
        document.getElementById('filelist').innerHTML = '';
      },
      FilesAdded: function (up, files) {
        plupload.each(files, function (file) {
          document.getElementById('filelist').innerHTML += `<div id="${file.id}"> (${plupload.formatSize(file.size)}) <strong></strong></div>`;
        });
        uploader.start();
      },
      UploadProgress: function (up, file) {
        document.querySelector(`#${file.id} strong`).innerHTML = `<span>${file.percent}%</span>`;

        document.getElementById('loadimage').style.display = '';
      },
      UploadComplete: function (up, file) {
        window.location = 'finishuploadim.php';

      },
      Error: function (up, err) {
        //console.log(err);
       // alert("\nError #" + err.code + ": " + err.message);
        window.open('errorvid.php?msg=' + err.code + ":" + err.message, '_blank');
      }
    }
  });
  uploader.init();
});


function doSomething(){
    //do some stuff here. eg:
    document.getElementById("test").innerHTML="Goodbye!";
}
function showADialog(e){
    var confirmationMessage = 'تأكيد الخروج ؟؟';
    //some of the older browsers require you to set the return value of the event
    (e || window.event).returnValue = confirmationMessage;     // Gecko and Trident
    return confirmationMessage;                                // Gecko and WebKit
}
window.addEventListener("beforeunload", function (e) {
    // to do something (Remember, redirects or alerts are blocked here by most browsers):
    doSomething();    
    // to show a dialog (uncomment to test):
    return showADialog(e);  
});

</script>
 



        <p class="p1"><?php echo $teext; ?></p>


          <br>
          <br>
        
<!-- UPLOAD FORM -->
<div style="color: white;" id="container">
  <button class="input1" id="pickfiles">choose file</button>
</div>
<br>
<!-- UPLOAD FILE LIST -->
<div style="color: white; text-align: center;" id="filelist">قم باختيار ملفات mp4 فقط</div>

<img id="loadimage" style="display: none;" src="loading.gif"/>

    </body>
</html>