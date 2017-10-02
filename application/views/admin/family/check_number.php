<?php
$value = $_POST['number'];
if(empty($get_mother[$value])):
    echo ' <div style="text-align: center" class="col-xs-12 alert alert-danger" >
              هذا الرقم غير مسجل...تأكد من إدخال رقم الأسرة الصحيح.
              </div>'; ?>
    <script>
        document.getElementById("myBtn").type = "button";
    </script>
 <? else :?>
    <script>
        document.getElementById("myBtn").type = "submit";
    </script>
 <? endif;  ?>