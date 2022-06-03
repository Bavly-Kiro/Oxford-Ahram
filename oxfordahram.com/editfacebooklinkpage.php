<?php
    session_start();
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
    </head>
    <body onload="test();">
        
        <p class="p1">ادخل لينك الصفحه الاولى الجديد</p>
         <textarea id="area1" class="textarea1" cols="55" rows="1"><?php echo $_SESSION["fbp1"] ?></textarea>
           <br>

         <p class="p2">ادخل لينك الصفحه الثانيه الجديد</p>
         <textarea id="area2" class="textarea2" cols="55" rows="1"><?php echo $_SESSION["fbp2"] ?></textarea>
           <br>
         <input id="submitf" class="input1" type="submit" value="ادخال">
         
         
<script type="text/javascript">

    document.getElementById("submitf").addEventListener("click", function () {

      window.location = 'includes/editfb.php?fbp1=' + document.getElementById("area1").value + '&fbp2=' + document.getElementById("area2").value;

    });

    function test(){
        if(<?php if($_SESSION["admin"] == 1){ echo "0";}else{echo "true";} ?>){
            window.location = 'baduser.php';
           // window.alert("helooooo");
         }
    }

</script>
       
       
    </body>
</html>