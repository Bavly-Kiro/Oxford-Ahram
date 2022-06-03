        <?php
             session_start();
             //$_SESSION["code"] = NULL;
            if (isset($_SESSION["code"])) {
              header("Location: courses.php");
              exit();
            }
        ?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content=""><!--put description-->
        <title>تسجيل الدخول,سنتر اكسفورد التعليمى </title>
        <link rel="shortcut icon" type="image/png" href="../images/profile photo.jpeg">
        <link rel="stylesheet" href="../css/sign in.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,700&family=Aref+Ruqaa&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,700&family=Aref+Ruqaa&family=Harmattan&display=swap" rel="stylesheet">

    </head>
    <body>

        
        <form action="includes/log.php" method="post">
            <div class="overlay">
               <div class="container">
                    <div class="form">
                        <h2 class="sign-in" >تسجيل الدخول</h2>
                        <img class="avt" src="../images/login form cover.svg" >
                        <input type="text" name="code" placeholder="ادخل الكود الخاص بك"><br>
                        <input type="password" name="pass" placeholder="كلمه المرور"><br><br>
                        <button type="submit" name="submit">تسجيل الدخول</button>
                   </div>
                </div>
            </div>
        </form>

        
    </body>
</html>