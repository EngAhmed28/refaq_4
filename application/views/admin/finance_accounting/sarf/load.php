

<?php   if(isset($_SESSION[$session_name]) && count($_SESSION[$session_name])>0){ //if we have session variable
        $mode = current($_SESSION[$session_name]); ?>
 <table id="colored-bgg" class="table table-bordered success">
 <thead>
     <tr>
       <th>م</th> 
       <th>اسم الحساب</th>
       <th>القيمة</th>
       <th>الأجراء</th>
     </tr>
 </thead>
<tbody>
 <?php    $all_value=0; $i=1; for($x = 0 ; $x < count($_SESSION[$session_name]) ; $x++){ ?>
  <tr>
                <td scope="row"><?php echo $i++?></td>          
                <td><?php echo $mode['account_name'] ?></td>        
                <td><?php echo $mode['value']?></td>                            
                <td><i class="fa fa-times" onclick="return CancelAcount(<?php echo $mode['account_code']?> ,'<?php echo $session_name ?>' );"></i></td>
           </tr> 

<?php $all_value += $mode['value']  ;
       $mode = next($_SESSION[$session_name]);
      }// END FOR ?>
   <tr>
                <td colspan="2"> الإجمالى</td>
                <td><?php echo $all_value ?></td><td></td>
                </tr>
                </tbody>
                </table>  
              <div class="col-xs-12 r-input">

  <button type="submit"  name="ADD"  value="ADD" class="btn center-block r-manage-btn "> حفظ السند </button>
                            </div>   
<?php  }?>

<script>
    document.getElementById("vouch_num").readOnly = true;
    document.getElementById("receipt_date").readOnly = true;
    $("#value").val("");
    $("#byan_sarf").val("");
    document.getElementById("r-style-resours").disabled = true;
    document.getElementById("box_name").disabled = true;
    document.getElementById("bank_name").disabled = true;
    document.getElementById("check_num").readOnly = true;
    document.getElementById("recive_date").readOnly = true;
    $("#times").val("second");
</script>
<script>
   function CancelAcount(code,name){
   //  alert(name);
             var dataString = 'code=' + code +"&session_name="+name;
        
       $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>admin/Sessins_data/sanad_sarf_account',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#results').html(html);
                }
            });
           // return false;
   }   
   
   
</script>














