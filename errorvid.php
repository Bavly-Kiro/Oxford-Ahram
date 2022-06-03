<?php

$link = $_GET["msg"];

echo $link;

?>

</br>

<?php

    echo "قطع الاتصال بالانترنت برجاء المحاولة مرة اخري";

?>

</br>
<button onclick="back()"> Back </button>

     <script type="text/javascript">

            function back(){
                    window.location = 'index.php';
            }
            
</script>
