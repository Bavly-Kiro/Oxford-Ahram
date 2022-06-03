<?php
session_start();


if($_SESSION["admin"] != 1){

    if(!(isset($_SESSION["code"])) || $_SESSION["access"] == 0 || $_SESSION["type"] == 1){
            header("Location: ../baduser.php");
            exit();
    }

}

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

  
      <form id="natigaform" method="post" enctype="multipart/form-data">

        <p class="p1"> ادخل البيانات</p>


        <select id="resultselectiontn" class="textarea2" name="resultselectiontn">
         <option value="">النتيجه المراد رفع اللينك عليها</option>
         <option value="1"><?php echo $_SESSION["natigan1"] ?></option>
         <option value="2"><?php echo $_SESSION["natigan2"] ?></option>
         <option value="3"><?php echo $_SESSION["natigan3"] ?></option>
         <option value="4"><?php echo $_SESSION["natigan4"] ?></option>
         <option value="5"><?php echo $_SESSION["natigan5"] ?></option>
         <option value="6"><?php echo $_SESSION["natigan6"] ?></option>
         <option value="7"><?php echo $_SESSION["natigan7"] ?></option>
         <option value="8"><?php echo $_SESSION["natigan8"] ?></option>
         <option value="9"><?php echo $_SESSION["natigan9"] ?></option>
         <option value="10"><?php echo $_SESSION["natigan10"] ?></option>
         <option value="11"><?php echo $_SESSION["natigan11"] ?></option>
         <option value="12"><?php echo $_SESSION["natigan12"] ?></option>

       </select>
        <br>


        <textarea name="newnn" id="newnn" class="textarea1" placeholder="ادخل الاسم الجديد لهذه النتيجة" cols="55" rows="1"></textarea>
        <br>

        
        <p class="p2">اختر النتيجة (فقط بصيغة PDF) </p>

        <input style="color: white;" type="file" name="fileresultToUpload" id="fileresultToUpload">
        <br>
        <br>
      
        <input class="input1" type="submit" name="submitresult" id="submitresult" value="ادخال">

        <br>
        <br>

      </form>

    <script>
      $(document).ready(function(){
                // File upload via Ajax
                $("#natigaform").on('submit', function(e){

                  if (!$.trim($("#resultselectiontn").val())) {
                    // textarea is empty or contains only white-space
                    alert('اختر اسم النتيجه المراد رفع اللينك عليها');

                  }else if(document.getElementById("fileresultToUpload").files.length == 0){
                  
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
                            url: 'includes/natigatoshow.php',
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
                                    $('#natigaform')[0].reset();
                                    $('#uploadStatus').html('<p style="color:#28A74B;">تم رفع الملف بنجاح الرجاء قفل هذه الصفحة</p>');
                                }else{
                                    $('#uploadStatus').html('<p style="color:#28A74B;">' + resp + '</p>');
                                }
                            }
                        });
                      }
                });
              
                // File type validation
                $("#fileresultToUpload").change(function(){
                    var allowedTypes = ['application/pdf'];
                    var file = this.files[0];
                    var fileType = file.type;
                    if(!allowedTypes.includes(fileType)){
                        alert('برجاء اختيار ملفات pdf فقط');
                        $("#fileresultToUpload").val('');
                        return false;
                    }
                });
      });
      </script>


</body>
</html>