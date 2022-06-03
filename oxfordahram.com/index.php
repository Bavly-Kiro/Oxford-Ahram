<?php
    require_once 'includes/general.php';
    session_start();
        //$_SESSION["code"] = NULL;
        //echo $admin;
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
        <link rel="stylesheet" href="../css/home bage.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,700&family=Aref+Ruqaa:wght@700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,700&family=Aref+Ruqaa:wght@700&family=El+Messiri:wght@600&family=Jomhuria&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,700&family=Aref+Ruqaa:wght@700&family=El+Messiri:wght@600&family=Jomhuria&family=Lateef&display=swap" rel="stylesheet">
    </head>
    <body>
        
        <?php
                 require_once 'navbar.php';
         ?>

        <img class="cover" src="../images/cover photo.jpeg" title="سنتر أُكسفورد">
        <br>
        <img class="profile" src="../images/profile photo.jpeg" title="سنتر أُكسفورد">
        <h1  title="سنتر أُكسفورد" class="name">منصة سنتر أُكسفورد الاهرام التعليمي</h1>

        
              <br><br><br><br><br><br><br><br><br><br><br>
        <br><br>
    
        <div id="who us" class="who us" title="سنتر أُكسفورد">
              <div class="photos">
            <img class="photo" src="../images/photo1.jpg" title="سنتر أُكسفورد">
            <img class="photo" src="../images/photo2.jpeg" title="سنتر أُكسفورد">
            <img class="photo" src="../images/photo3.jpg" title="سنتر أُكسفورد">
            
        </div>
            <br>
             <div> <h2 title="سنتر أُكسفورد" class="h2word">السنتر يقدم أفضل الخدمات للطلاب والمدرسين وأولياء الأمور</h2></div> 
            
<pre class="preword">1-نقدم لطلابنا الاعزاء أفضل الخدمات التعليمية، 
محاضرات تعليمية لجميع المراحل الدراسية، متابعة الكترونية دورية،
اختبارات إلكترونية دورية، تدريبات وامتحانات شهرية شامله.

2-نقدم للسادة المدرسين أفضل الخدمات حيث القاعات المكيفة 
والسبورات الذكيه والتعليم عن بعد والأجهزة الحديثة ( بروجوكتور)
وقاعات خاصة معزولة بالكامل للتصوير. 

3-للسادة أولياء الأمور متابعة دورية لأبنائهم
متابعة مستوى الطلاب أول بأول،امكانية
متابعة درجات الاختبارات إلكترونيه.</pre>
            
    <img class="photo4" src="../images/photo4.jpg" title="سنتر أُكسفورد">
            
  </div>
        
        <br>
        
        <div class="footer" title="سنتر أُكسفورد">
             <div id="footer-text" class="call-us">
                <h3 class="footer-text"><?php echo $_SESSION["phoneNumber"] ?></h3>      
            </div>   
            <div class="address">
                <pre class="footer-text"><?php echo $_SESSION["address"] ?></pre></br>
            </div>
           
            <div class="account">
                <a class="account-link" target="_blank" href=<?php echo $_SESSION["fbp1"] ?>><img class="account-img" src="../images/facebook photo1.png" width="50px" height="50px"></a>
                <a class="account-link" target="_blank" href=<?php echo $_SESSION["fbp2"] ?>><img class="account-img" src="../images/facebook photo2.jpeg" width="49px" height="49px"></a>
            </div>
        
            <div class="copy-right">
                <p>&copy;2021 All rights reserved | Design by<a class="designers_name" target="_blank" href="https://www.facebook.com/POV-Design-104070635047327/"> POV DESIGN</a></p>
            </div>
        </div>
        
        
        
        
        
    </body>
</html>