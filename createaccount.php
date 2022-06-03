<?php
    session_start();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content=""><!--put description-->
        <title>انشاء حساب,سنتر اكسفورد التعليمى </title>
        <link rel="shortcut icon" type="image/png" href="../images/profile photo.jpeg">
        <link rel="stylesheet" href="../css/create account.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,700&family=Aref+Ruqaa&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,700&family=Aref+Ruqaa&family=Harmattan&display=swap" rel="stylesheet">

    </head>
    <body onload="test();">
            
            <form target="_blank" action="includes/createAcc.php" method="POST" id="formcreate" name="formcreate">
               <div class="container">
                    <div class="form">
                        <h2 class="sign-up" >انشاء حساب</h2>
                        <hr><br>

                        
                        <div class="account-type1">
                            <input type="radio" id="Student" name="account-type" value="1">
                            <label for="Student">طالب</label>
                        </div>
                        <br>
                        <div class="account-type2">
                            <input type="radio" id="Teacher" name="account-type" value="2">
                            <label for="Teacher">مدرس</label>
                        </div>
                        <br>


                        <input name="codeCreate" class="input" type="text" placeholder="ادخل الكود"><br> <a id="generateCode" href="#">generate code</a> <br>
                        <input name="pass" class="input" type="password" placeholder="كلمه المرور"><br>
                        <input name="passrepeat" class="input" type="password" placeholder="تاكيد كلمه المرور"><br>
                        <input name="name" class="input" type="text" placeholder="الاسم"><br>
                        <input name="school" class="input" type="text" placeholder="المدرسه"><br>

                        <select class="input" name="year">
                            <option value="">اختر الصف الدراسي</option>
                            <option value="1">المرحلة الاعدادية</option>
                            <option value="2">الصف الاول الثانوى</option>
                            <option value="3">الصف الثانى الثانوى</option>
                            <option value="4">الصف الثالث الثانوى</option>
                          </select>

                        <input name="email" class="input" type="email" placeholder="الايميل"><br>
                        <input name="phone" class="input" type="tel" placeholder="رقم الهاتف"><br>
                        <input name="pphone" class="input" type="tel" placeholder="رقم ولي الامر"><br>
                        <input name="address" class="input" type="text" placeholder="العنوان"><br><br>
                        <a id="submitcreat" name="submitcreat" type="submit" class="create" href="#">انشاء حساب</a>
                   </div>
                </div>
            </form>
        
     <script type="text/javascript">


                var form = document.getElementById("formcreate");

                document.getElementById("submitcreat").addEventListener("click", function () {

                    var type = document.forms["formcreate"]["account-type"].value; 
                    codeCreate = document.forms["formcreate"]["codeCreate"].value; 
                    var pass = document.forms["formcreate"]["pass"].value; 
                    var passrepeat = document.forms["formcreate"]["passrepeat"].value; 
                    var name = document.forms["formcreate"]["name"].value; 
                    var school = document.forms["formcreate"]["school"].value; 
                    var year = document.forms["formcreate"]["year"].value; 
                    var email = document.forms["formcreate"]["email"].value; 
                    var phone = document.forms["formcreate"]["phone"].value; 
                    var pphone = document.forms["formcreate"]["pphone"].value; 
                    var address = document.forms["formcreate"]["address"].value; 


                    if(!(type == 1 || type == 2)){
                        window.alert("اختر طالب او مدرس ");
                    }else if(codeCreate == "" || codeCreate == " " || codeCreate == null){
                        window.alert("ادخل الكود!!!!");
                    }else if(pass == "" || pass == " "|| pass == null){
                        window.alert("ادخل كلمة المرور!!!!");
                    }else if(passrepeat == "" || passrepeat == " "|| passrepeat == null){
                        window.alert("اكتب كلمة المرور مرة اخري ");
                    }else if(!(passrepeat == pass)){
                        window.alert("كلمات المرور غير متطابقة ");
                    }else if(school == "" || school == " "|| school == null){
                        window.alert("ادخل اسم المدرسة");
                    }else if(year == "" || year == null){
                        window.alert("اختر الصف الدراسي");
                    }else if(email == "" || email == " "|| email == null){
                        window.alert("ادخل الايميل");
                    }else if(phone == "" || phone == " "|| phone == null){
                        window.alert("ادخل رقم الهاتف");
                    }else if(pphone == "" || pphone == " "|| pphone == null){
                        window.alert("ادخل رقم هاتف ولي الامر");
                    }else if(address == "" || address == " "|| address == null){
                        window.alert("ادخل العنوان");
                    }else{

                       form.submit();
                    }
                    

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