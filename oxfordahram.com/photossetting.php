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


$teext = "اختر الصورة لوضهعا او استبدالها بصورة رقم:  " . $id;

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

      <div>
        <!-- Display upload status -->
        <div id="uploadStatus" style="	padding: 10px 20px;
        margin-top: 10px;
      font-size:18px;
      text-align: center;"></div>
  
          <div class="progress" style="    display: -ms-flexbox;
          display: flex;
          height: 20px;
          overflow: hidden;
          font-size: .75rem;
          background-color: #e9ecef;
          border-radius: .25rem;
        margin-top: 10px;">
          <div class="progress-bar" style="    display: -ms-flexbox;
          display: flex;
          -ms-flex-direction: column;
          flex-direction: column;
          -ms-flex-pack: center;
          justify-content: center;
          overflow: hidden;
          color: #fff;
          text-align: center;
          white-space: nowrap;
          background-color: #28a745;
          transition: width .6s ease;
        font-size: 16px;
        text-align: center;"></div>
      </div>
  
  </div>

  


        <p class="p1"><?php echo $teext; ?></p>


           <form id="uploadimform" method="post" enctype="multipart/form-data">    

            <input style="color: white;" type="file" name="imagetoupload" id="imagetoupload">
            <br>
            <br>
          
            <input class="input1" type="submit" name="submituploadim" id="submituploadim" value="ادخال">
    
            <br>
            <br>
    
          </form>
    
        <script>
          $(document).ready(function(){
                    // File upload via Ajax
                    $("#uploadimform").on('submit', function(e){
    
                        if(document.getElementById("imagetoupload").files.length === 0){
                        
                        alert('اختر الملف لتقوم برفعه');
    
                      }else{
    
                            e.preventDefault();
                            $.ajax({
                                xhr: function() {
                                    var xhr = new window.XMLHttpRequest();
                                    xhr.upload.addEventListener("progress", function(evt) {
                                        if (evt.lengthComputable) {
                                            var percentComplete = ((evt.loaded / evt.total) * 100);
                                            $(".progress-bar").width(percentComplete + '%');
                                            $(".progress-bar").html(percentComplete+'%');
                                        }
                                    }, false);
                                    return xhr;
                                },
                                type: 'post',
                                url: 'includes/uploadim.php',
                                data: new FormData(this),
                                contentType: false,
                                cache: false,
                                processData:false,
                                beforeSend: function(){
                                    $(".progress-bar").width('0%');
                                    $('#uploadStatus').html('<img src="loading.gif"/>');
                                },
                                error:function(){
                                    $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
                                },
                                success: function(resp){
                                    if(resp == 'ok'){
                                        $('#uploadimform')[0].reset();
                                        $('#uploadStatus').html('<p style="color:#28A74B;">تم رفع الملف بنجاح الرجاء قفل هذه الصفحة</p>');
                                    }else{
                                        $('#uploadStatus').html('<p style="color:#28A74B;">' + resp + '</p>');
                                    }
                                }
                            });
                          }
                    });
                  
                    // File type validation
                    $("#imagetoupload").change(function(){
                        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                        var file = this.files[0];
                        var fileType = file.type;
                        if(!allowedTypes.includes(fileType)){
                            alert('برجاء اختيار صور فقط');
                            $("#imagetoupload").val('');
                            return false;
                        }
                    });
          });
          </script>
    


    </body>
</html>