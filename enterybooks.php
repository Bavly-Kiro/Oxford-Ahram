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

  
      <form id="bookform" method="post" enctype="multipart/form-data">

        <p class="p1"> ادخل البيانات</p>


        <select id="bookselectiont" class="textarea2" name="bookselectiont">
         <option value="">اختر اسم الكتاب المراد رفع اللينك عليه</option>
         <option value="1"><?php echo $_SESSION["bookn1"] ?></option>
         <option value="2"><?php echo $_SESSION["bookn2"] ?></option>
         <option value="3"><?php echo $_SESSION["bookn3"] ?></option>
         <option value="4"><?php echo $_SESSION["bookn4"] ?></option>
         <option value="5"><?php echo $_SESSION["bookn5"] ?></option>
         <option value="6"><?php echo $_SESSION["bookn6"] ?></option>
         <option value="7"><?php echo $_SESSION["bookn7"] ?></option>
         <option value="8"><?php echo $_SESSION["bookn8"] ?></option>
         <option value="9"><?php echo $_SESSION["bookn9"] ?></option>
         <option value="10"><?php echo $_SESSION["bookn10"] ?></option>
         <option value="11"><?php echo $_SESSION["bookn11"] ?></option>
         <option value="12"><?php echo $_SESSION["bookn12"] ?></option>

       </select>
        <br>


        <textarea name="newbn" id="newbn" class="textarea1" placeholder="ادخل الاسم الجديد لهذا الكتاب" cols="55" rows="1"></textarea>
        <br>

        
        <p class="p2">اختر الكتاب (فقط بصيغة PDF) </p>

        <input style="color: white;" type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <br>
      
        <input class="input1" type="submit" name="submitbook" id="submitbook" value="ادخال">

        <br>
        <br>

      </form>

    <script>
      $(document).ready(function(){
                // File upload via Ajax
                $("#bookform").on('submit', function(e){

                  if (!$.trim($("#bookselectiont").val())) {
                    // textarea is empty or contains only white-space
                    alert('اختر اسم الكتاب المراد رفع اللينك عليه');

                  }else if(document.getElementById("fileToUpload").files.length == 0){
                  
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
                            url: 'includes/bookstoshow.php',
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
                                    $('#bookform')[0].reset();
                                    $('#uploadStatus').html('<p style="color:#28A74B;">تم رفع الملف بنجاح الرجاء قفل هذه الصفحة</p>');
                                }else{
                                    $('#uploadStatus').html('<p style="color:#28A74B;">' + resp + '</p>');
                                }
                            }
                        });
                      }
                });
              
                // File type validation
                $("#fileToUpload").change(function(){
                    var allowedTypes = ['application/pdf'];
                    var file = this.files[0];
                    var fileType = file.type;
                    if(!allowedTypes.includes(fileType)){
                        alert('برجاء اختيار ملفات pdf فقط');
                        $("#fileToUpload").val('');
                        return false;
                    }
                });
      });
      </script>


</body>
</html>