<br />

          <div class="col-sm-11 col-xs-12">
               
                <!--  -->
                	<?php $this->load->view('admin/finance_accounting/qued_tabs'); ?>



<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>
<div class="well bs-component" >

<?php   if(isset($result)&&$result!=null):?>
<?php echo form_open_multipart('admin/finance_accounting/update_qued/'.$result[0]->qued_num,array('class'=>"form-horizontal",'role'=>"form" ))?>
<div class="row">
 <div class="col-md-3">
 <div class="form-group">
 <label class="control-label">رقم القيد</label>
<input type="number" id="qued_num"  name="qued_num" value="<?php echo $result[0]->qued_num ?>"   class="form-control text-right" placeholder="رقم القيد" readonly="readonly"/>
 </div>
 </div>

 <div class="col-md-3">
 <div class="form-group">
 <label class="control-label">تاريخ القيد</label>
  <input type="date" id="qued_date"  name="qued_date" value="<?php echo date("Y-m-d",$result[0]->qued_date); ?>" class="form-control text-right" placeholder="تاريخ القيد" />
 </div>
 </div>

<div class="col-md-3">
 <div class="form-group">
 <label class="control-label">البيان</label>
   <input type="text" id="qued_byan"  name="qued_byan" value="<?php echo $result[0]->qued_byan ?>" class="form-control text-right" placeholder="البيان"/>
 </div>
 </div>
</div><!-- row-->


<table  class="table table-bordered "  >
   <thead>
  <tr>
      <th style="text-align: right;">مسلسل</th>
      <th style="text-align: right;"><center>دائن </center></th>
      <th style="text-align: right;"><center> مدين </center></th> 
      <th style="text-align: right;">إسم الحساب</th>
      <th style="text-align: right;">الإجراء</th>
  </tr>
   </thead>
   <tbody>
   <?php $count_maden=1;$count_dayen=1;  $r=1; foreach($result as $row):?>
<tr>
   <?php 
    $delete_type=2;   if(sizeof($result) == 1){$delete_type=1;}
   
   if($row->maden !=0){
   $account_name = $account_group[$row->maden]->name;
   $dayen_value='<center>--</center>';
   $maden_value='<input type="number" id="madeen_value'.$count_maden.'"  name="madeen_value'.$count_maden.'" value="'.$row->value.'" class="form-control clmadeen " />';
   echo' <input type="hidden" name="madeen_acoount_name'.$count_maden.'" value="'.$row->maden.'" />';
   $count_maden++;
       
   }else {
   $account_name = $account_group[$row->dayen]->name;
   $maden_value='<center>--</center>';
   $dayen_value='<input type="number"  id="dayen_value'.$count_dayen.'" name="dayen_value'.$count_dayen.'" value="'.$row->value.'" class="form-control cldayen" />';
   echo' <input type="hidden" name="dayen_acoount_name'.$count_dayen.'" value="'.$row->dayen.'" />';
   $count_dayen++;
   }?>
   <td><?php echo $r++;?></td>
   <td><?php echo $dayen_value?> </td>
   <td><?php echo $maden_value ?></td>
   <td><?php echo $account_name?></td>
   <td> <a href="<?php echo base_url().'admin/finance_accounting/delete_qued/'.$delete_type.'/'.$row->id."/".$row->qued_num?>"> 
          <i class="fa fa-times" aria-hidden="true"></i> </a> 
   </td>
   
</tr>
   <?php endforeach;?>
   
  </tbody> </table>
  <input type="hidden"  value="0" id="total_dayen" class="form-control cldayen"   />
   <input type="hidden"  value="0" id="total_madeen"   class="form-control clmadeen"  />
  
          <input type="hidden" name="total_madeen_num" value="<?php echo ($count_maden -1) ?>" />
          <input type="hidden" name="total_dayen_num" value="<?php echo ( $count_dayen-1) ?>" />
    
    <div class="row">
 <div class="form-group" >
                <div class="col-xs-10 col-xs-pull-2">
    
      <input type="submit"  onclick="return checkas();" name="update_qued" value="تعديل "  class="btn btn-primary" />
                </div>
            </div>

</div>   
</div>   
      <?php echo form_close()?>  

  <?php
	echo '<script>
 $(".cldayen").keyup(function () {
  kar='.($count_dayen -1).';
  totalSum = 0;
          for (i = 1; i <= kar; i++) { 
    end=($("#dayen_value"+i).val());
  totalSum +=  parseFloat(end);
  }           
   $("#total_dayen").val(totalSum);
     }); 
</script>
<script>                       
//-----------------------------------------
function checkas(){
   var dayeen= $("#total_dayen").val();
   var madeen= $("#total_madeen").val();
   var sub= parseFloat(dayeen) - parseFloat(madeen) ;
if( sub != 0  ){ alert(dayeen+"خطأ فى الارقام الحسابية"+madeen);
return false;}    }
</script>
<script>                       
//---------------------------------------
 $(".clmadeen").keyup(function () {
  kar='.($count_maden -1).';
  totalSum = 0;
          for (i = 1; i <= kar; i++) { 
    end=($("#madeen_value"+i).val());
  totalSum +=  parseFloat(end);
  }           
   $("#total_madeen").val(totalSum);
     });                   
</script>';?>               



<?php else: ?>
<!------------------------------  ALL  --------------------------------------------------------------->
<?php   if(isset($quod)&&$quod!=null):?>
<table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th width=""><center>المسلسل</center> </th>
                    <th width=""><center>رقم القيد</center></th>
                    <th width=""><center>تاريخ تسجيل القيد</center></th>
                    <th width=""><center>الإجراء</center> </th>
                    <th width=""><center>التفاصيل</center> </th>
                    </tr>    
    		   </thead>    
    	   	<tbody>       
     <?php $count=1;foreach($quod as $row):?>               
      <tr>
         <td><center><?php echo $count++;?></center></td>
         <td> <?php echo $row->qued_num?> </td>
         <td> <?php echo date("Y-m-d",$row->qued_date) ?></td>
         <td>
           <a href="<?php echo base_url().'admin/finance_accounting/update_qued/'.$row->qued_num?>">
           <input class="btn btn-sm  btn-success"  type="submit" value="تعديل القيد" />
            <a href="<?php echo base_url().'admin/finance_accounting/delete_qued/1/0/'.$row->qued_num?>">
           <input class="btn btn-sm  btn-danger"  type="submit" value="حذف القيد" />
           </a>
         </td>
         <td> 
         <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->qued_num?>">
         <span class="glyphicon glyphicon-plus"></span> التفاصيل </button>
         </td>
      </tr>
<?php endforeach;?>
</tbody>
</table>         
<?php else :?>
 <div class="alert alert-danger" >
     لا يوجد قيود
          </div>
<?php endif ;?>                    
<?php endif; ?>
<!------------------------------  ALL  --------------------------------------------------------------->
</div>                    
                    
<?php   if(isset($quod)&&$quod!=null):?>          
      <?php foreach($quod as $row):?>      
            <div class="modal fade" id="myMooodal<?php echo $row->qued_num?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:850px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">تفاصيل القيد</h5>
             </div>

    
    <div class="row" style="width:800px;margin-right:15px">
    <table  class="table table-bordered "  >
   <thead>
  <tr>
      <th style="text-align: right;">مسلسل</th>
      <th style="text-align: right;"><center>دائن </center></th>
      <th style="text-align: right;"><center> مدين </center></th> 
      <th style="text-align: right;">إسم الحساب</th>

  </tr>
   </thead>
   <tbody>
   <?php $r=1; foreach($details[$row->qued_num] as $sub_row):  ?>
   
    <?php 
   if($sub_row->maden !=0){
   $account_name = $account_group[$sub_row->maden]->name;
   $dayen_value='<center>--</center>';
   $maden_value=$sub_row->value;
   }else {
   $account_name = $account_group[$sub_row->dayen]->name;
   $maden_value='<center>--</center>';
   $dayen_value=$sub_row->value;
   }?>
   <tr>
   <td><?php echo $r++;?></td>
   <td><?php echo $dayen_value?> </td>
   <td><?php echo $maden_value ?></td>
   <td><?php echo $account_name?></td>
   </tr>
   
   <?php endforeach;?>
    </tbody>
</table>    
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
       
      </div>
    </div>
  </div>
</div>          
    <?php endforeach?>                
                    <?php endif; ?>

           
                    