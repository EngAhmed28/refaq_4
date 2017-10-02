

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

<div class="col-md-12">
<div class="panel with-nav-tabs panel-default">
<div class="panel-heading">
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab0default" data-toggle="tab">ترحيل القيد  </a></li>
    <li class=""><a href="#tab1default" data-toggle="tab">إلغاء ترحيل القيد</a></li> 
     <li class=""><a href="#tab2default" data-toggle="tab">جميع القيود المرحلًة </a></li>    
</ul>
</div>
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane fade in active" id="tab0default">
<!--  srart 1   ------------------------------------------------------------------------------------------------>
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
           <a href="<?php echo base_url().'admin/finance_accounting/update_qued_deport/1/'.$row->qued_num?>">
           <input class="btn btn-sm  btn-success"  type="submit" value="ترحيل القيد" />
           
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
<!---  end  1   ------------------------------------------------------------------------------------------------> 
</div>                                                                                   
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab1default">
<!--  srart 2   ------------------------------------------------------------------------------------------------>
<?php   if(isset($deported_quod)&&$deported_quod!=null):?>
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
     <?php $count=1;foreach($deported_quod as $row):?>               
      <tr>
         <td><center><?php echo $count++;?></center></td>
         <td> <?php echo $row->qued_num?> </td>
         <td> <?php echo date("Y-m-d",$row->qued_date) ?></td>
         <td>
           <a href="<?php echo base_url().'admin/finance_accounting/update_qued_deport/0/'.$row->qued_num?>">
           <input class="btn btn-sm  btn-danger"  type="submit" value="إلغاء الترحيل" />
           
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
     لا يوجد قيود مرحلة
          </div>
<?php endif ;?>   
<!---  end  2   ------------------------------------------------------------------------------------------------> 
</div>
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->

<div class="tab-pane fade" id="tab2default">
<!--  srart 3   ------------------------------------------------------------------------------------------------>
<?php   if(isset($deported_quod)&&$deported_quod!=null):?>
<table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th width=""><center>المسلسل</center> </th>
                    <th width=""><center>رقم القيد</center></th>
                    <th width=""><center>تاريخ تسجيل القيد</center></th>
                    <th width=""><center>التفاصيل</center> </th>
                    </tr>    
    		   </thead>    
    	   	<tbody>       
     <?php $count=1;foreach($deported_quod as $row):?>               
      <tr>
         <td><center><?php echo $count++;?></center></td>
         <td> <?php echo $row->qued_num?> </td>
         <td> <?php echo date("Y-m-d",$row->qued_date) ?></td>
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
     لا يوجد قيود مرحلة
          </div>
<?php endif ;?>   
<!---  end  3   ------------------------------------------------------------------------------------------------> 

</div>
<!---  end Tabs ----------------------------------------------------------------------------------------------------->                  
                    </div>
                </div>
            </div>
        </div></div>
<!---  end All ----------------------------------------------------------------------------------------------------->                  
        




<?php   
//DIE;

if(isset($quod)&&$quod!=null):?>          
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













 