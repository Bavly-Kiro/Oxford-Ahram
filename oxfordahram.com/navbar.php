          <ul>
            <div class="li">
                <li ><a class="home" href="index.php">الصفحه الرئيسيه</a></li>
                <li ><a href="login.php">المحاضرات</a></li>
                <li ><a href="#who us">من نحن</a></li>
                <li ><a href="#footer-text">اتصل بنا</a></li>
                <li ><a href="includes/out.php" style="display: <?php if(!isset($_SESSION["code"])){echo none;}  ?> ;">تسجيل الخروج</a></li>

              <div class="dropdown" style="display: <?php if($_SESSION["admin"] != 1){echo none;}  ?> ;">
                    <button class="dropbtn">
                        الاعدادات 
                    </button> 
                    <div class="dropdown-content">
                      <a target="_blank"href="createaccount.php">انشاء حساب</a>
                      <a target="_blank" href="enterystudentcodepage.php">ادخال كود طالب</a>
                      <a target="_blank" href="editlessonsnamepage.php">تعديل اسم المحاضره</a>
                      <a target="_blank"href="editfacebooklinkpage.php">تعديل لينك الفيسبوك</a>
                      <a target="_blank"href="editphonesandadresspage.php">تعديل الارقام و العناويين</a>
                      <a target="_blank"href="appercode.php">اظهار كود الطالب</a>
                      <a target="_blank"href="enteryteacheraccountpermiation.php">اعطاء تصريح للمدرس بالتحكم</a>
                    </div>
                </div> 
                </div>
         </ul>
