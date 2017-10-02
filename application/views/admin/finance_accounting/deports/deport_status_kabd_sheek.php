        <div class="col-sm-11 col-xs-12">
               
                <!--  -->
                	<?php $this->load->view('admin/finance_accounting/sandat_qabd_tabs'); ?>
               <!--  --> 



<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
unset($_SESSION['catch_addtion'.$_SESSION["user_id"]]);
?>
    </span> 
    <?php $array_paid_typy=array('','نقدي','تحويل بنكي','شيك');?>
<!-------------------------------------------------------------------------------------->  
  <div class="col-md-12">
<div class="panel with-nav-tabs panel-default">
<div class="panel-heading">
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab0default" data-toggle="tab">ترحيل السند </a></li>
    <li class=""><a href="#tab1default" data-toggle="tab">إلغاء ترحيل السند</a></li> 
    <li class=""><a href="#tab2default" data-toggle="tab">جميع السندات المرحلًة  </a></li>    
</ul>
</div>
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane fade in active" id="tab0default">
<!--  srart 1   ------------------------------------------------------------------------------------------------>

<?php   if(isset($vouchers)&&$vouchers!=null):?>
<table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th width=""><center>المسلسل</center> </th>
                    <th width=""><center>رقم السند</center></th>
                    <th width=""><center>تاريخ تسجيل السند</center></th>
                    <th width=""><center>نوع السند</center></th>
                    <th width=""><center>الإجمالي</center></th>
                    <th width=""><center><?php echo $account_name;?></center></th>
                    <th width=""><center>الإجراء</center> </th>
                    <th width=""><center>التفاصيل</center> </th>
                 </tr>    
    		   </thead>    
    	   	<tbody>
<?php $x=1; foreach($vouchers as $row ):?>
 <tr class="">
     <td><center><?php echo $x++;?></center></td>
     <td><center><?php echo $row->vouch_num; ?> </center></td>
     <td><center><?php echo date("Y-m-d",$row->receipt_date); ?> </center></td>
     <td><center><?php echo $array_paid_typy[$row->vouch_type] ?> </center></td>
     <td><center><?php echo $row->sum?> جنية</center></td>
     <td><center> 
     <?php if($process == 3){
         echo  $account_group[$row->dayen]->name;
     }elseif($process == 4){
         echo $account_group[$row->maden]->name;   
     }?></center></td>
     <td> 
     <a href="<?php echo base_url().'dashboard/deports_vouchers/'.$row->vouch_num.'/1/'.$process."/".$controller?>">
      <input class="btn btn-sm  btn-success"  type="submit" value="ترحيل السند" />
     </a>     </td>
     <td><button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num?>"><span class="glyphicon glyphicon-plus"></span> التفاصيل </button></td> 
</tr>










<?php endforeach;?>
             </tbody>
          </table>
<?php else:?>
<div class="alert alert-danger" role="alert">
  <strong>عذرا...!</strong> لا توجد هناك سندات 
</div>
<?php endif; ?>


<!---  end  1   ------------------------------------------------------------------------------------------------> 
</div>                                                                                   
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab1default">
<!--  srart 2   ------------------------------------------------------------------------------------------------>
<?php   if(isset($all_vouchers)&&$all_vouchers!=null):?>
<table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th width=""><center>المسلسل</center> </th>
                    <th width=""><center>رقم السند</center></th>
                    <th width=""><center>تاريخ تسجيل السند</center></th>
                    <th width=""><center>نوع السند</center></th>
                    <th width=""><center>الإجمالي</center></th>
                    <th width=""><center><?php echo $account_name;?></center></th>
                    <th width=""><center>الإجراء</center> </th>
                    <th width=""><center>التفاصيل</center> </th>
                 </tr>    
    		   </thead>    
    	   	<tbody>
<?php $x=1; foreach($all_vouchers as $row ):?>
 <tr class="">
     <td><center><?php echo $x++;?></center></td>
     <td><center><?php echo $row->vouch_num; ?> </center></td>
     <td><center><?php echo date("Y-m-d",$row->receipt_date); ?> </center></td>
     <td><center><?php echo $array_paid_typy[$row->vouch_type] ?> </center></td>
     <td><center><?php echo $row->sum?> جنية</center></td>
   <td><center> 
     <?php if($process == 3){
         echo  $account_group[$row->dayen]->name;
     }elseif($process == 4){
         echo $account_group[$row->maden]->name;   
     }?></center></td>
     <td>   <a href="<?php echo base_url().'dashboard/deports_vouchers/'.$row->vouch_num.'/0/'.$process."/".$controller?>">
        <input class="btn btn-sm  btn-danger"  type="" value="إلغاء ترحيل السند" />  
        </a>  
      </td>
     <td><button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num; ?>"><span class="glyphicon glyphicon-plus"></span> التفاصيل </button></td> 
</tr>
<?php endforeach;?>

             </tbody>
          </table>
<?php else:?>
<div class="alert alert-danger" role="alert">
  <strong>عذرا...!</strong> لا توجد هناك سندات 
</div>
<?php endif; ?>

<!---  end  2   ------------------------------------------------------------------------------------------------> 
</div>
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->

<div class="tab-pane fade" id="tab2default">
<!--  srart 3   ------------------------------------------------------------------------------------------------>
<?php   if(isset($all_vouchers)&&$all_vouchers!=null):?>
<table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th width=""><center>المسلسل</center> </th>
                    <th width=""><center>رقم السند</center></th>
                    <th width=""><center>تاريخ تسجيل السند</center></th>
                    <th width=""><center>نوع السند</center></th>
                    <th width=""><center>الإجمالي</center></th>
                    <th width=""><center><?php echo $account_name;?></center></th>
                    <th width=""><center>التفاصيل</center> </th>
                 </tr>    
    		   </thead>    
    	   	<tbody>
<?php $x=1; foreach($all_vouchers as $row ):?>
<tr class="">
     <td><center><?php echo $x++;?></center></td>
     <td><center><?php echo $row->vouch_num; ?> </center></td>
     <td><center><?php echo date("Y-m-d",$row->receipt_date); ?> </center></td>
     <td><center><?php echo $array_paid_typy[$row->vouch_type] ?> </center></td>
     <td><center><?php echo $row->sum?> جنية</center></td>
     
     <td><center> 
     <?php if($process == 3){
         echo  $account_group[$row->dayen]->name;
     }elseif($process == 4){
         echo $account_group[$row->maden]->name;   
     }?></center></td>
     <td><button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num; ?>"><span class="glyphicon glyphicon-plus"></span> التفاصيل </button></td> 
</tr>
<?php endforeach;?>

             </tbody>
          </table>
<?php else:?>
<div class="alert alert-danger" role="alert">
  <strong>عذرا...!</strong> لا توجد هناك سندات 
</div>
<?php endif; ?>
<!---  end  3   ------------------------------------------------------------------------------------------------> 
</div>
<!---  end Tabs ----------------------------------------------------------------------------------------------------->                  
                    </div>
                </div>
            </div>
        </div>
<!---  end All ----------------------------------------------------------------------------------------------------->                  
    
     </div>
    <!-----------------  التفاصيل ---------------------------------------------------->
    <?php include($details_page.'.php');?>
  
   
    
    
    
    
    