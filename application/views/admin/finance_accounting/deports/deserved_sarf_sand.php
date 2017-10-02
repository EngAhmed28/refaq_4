


  <div class="col-sm-11 col-xs-12">
               
  <?php $this->load->view('admin/finance_accounting/sandat_sarf_tabs'); ?>
            
 <span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
unset($_SESSION['catch_addtion'.$_SESSION["user_id"]]);
?>
    </span> 

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
    <li class="active"><a href="#tab0default" data-toggle="tab">السندات المستحقة خلال اليوم </a></li>
    <li class=""><a href="#tab1default" data-toggle="tab">جميع السندات المستحقة</a></li> 
     <li class=""><a href="#tab2default" data-toggle="tab">جميع السندات المنقضى إستحقاقها  </a></li>    
</ul>
</div>
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane fade in active" id="tab0default">
<!--  srart 1   ------------------------------------------------------------------------------------------------>
   <div class="col-xs-12 r-inner-details r-inner-details-sanad">
<?php   if(isset($dally_sanad)&&$dally_sanad!=null):?>   
   <table style="width:100%">
				<thead>
    		      <tr> 
                    <th style="text-align: right;" width="">المسلسل </th>
                    <th style="text-align: right;" width="">رقم السند</th>
                    <th style="text-align: right;" width="">الإجراء </th>
                    <th style="text-align: right;" width="">التفاصيل </th>
                 </tr>    
    		   </thead>    
    	   	<tbody>
    
<?php $x=1;  foreach($dally_sanad as $row):?>
           <tr>
             <td><?php echo $x++;?></td>
             <td><?php echo $row->vouch_num;?></td>
             <td>
                   <a data-toggle="tooltip" data-placement="bottom" title="موافقة" class="btn btn-success btn-xs"
                         href="<?php echo base_url().'admin/Finance_accounting/deserved_sarf_sand/1/'.$controller."/".$row->vouch_num."/".$row->type."/".$process ?>" > 
                   <i class="fa fa-check"></i></a>
         
                   <a data-toggle="tooltip" data-placement="bottom" title="مرفوضة" class="btn  btn-danger btn-xs"
                         href="<?php echo base_url().'admin/Finance_accounting/deserved_sarf_sand/2/'.$controller."/".$row->vouch_num."/".$row->type."/".$process ?>" > 
                   <i class="fa fa-times"></i></a>
             </td>
             <td>
                 <button type="button" class="btn btn-sm btn-info " data-toggle="modal" 
                       data-target="#myMooodal<?php echo $row->vouch_num?>">
                  <span class="glyphicon glyphicon-plus"> </span> التفاصيل </button>
             </td>
</tr>
<?php endforeach; ?>            
</tbody>
</table>
<?php else :?>
 <div class="alert alert-danger" >
      لا يوجد سندات مستحقة خلال اليوم
          </div>
<?php endif ;?>
<!---  end  1   ------------------------------------------------------------------------------------------------> 
</div>     </div>                                                                              
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab1default">
<!--  srart 2   ------------------------------------------------------------------------------------------------>
 <div class="col-xs-12 r-inner-details r-inner-details-sanad">
<?php   if(isset($all_sanad)&&$all_sanad!=null):?>   
   <table style="width:100%">
				<thead>
    		      <tr> 
                    <th style="text-align: right;" width="">المسلسل </th>
                    <th style="text-align: right;" width="">رقم السند</th>
                    <th style="text-align: right;" width="">نوع السند</th>
                    <th style="text-align: right;" width="">تاريخ الإيداع /تاريخ الاستحقاق </th>
                    <th style="text-align: right;" width="">التفاصيل </th>
                 </tr>    
    		   </thead>    
    	   	<tbody>
            
<?php $x=1;foreach($all_sanad as $row):?>
                    <tr>
                        <td><?php echo $x++;?></td>
                        <td><?php echo $row->vouch_num;?></td>
                        <td><?php echo $array_paid_typy[$row->vouch_type]?></td>
                        <td><?php echo date("Y-m-d",$row->date_received)?></td>
                        <td>
                          <button type="button" class="btn btn-sm btn-info " data-toggle="modal" 
                                    data-target="#myMooodal<?php echo $row->vouch_num?>">
                                  <span class="glyphicon glyphicon-plus"> </span> التفاصيل </button>
                        </td>
                    </tr>
<?php endforeach;?>
</tbody></table>
<?php else :?>
 <div class="alert alert-danger" >
      لا يوجد سندات مستحقة 
          </div>
<?php endif ;?>
<!---  end  2   ------------------------------------------------------------------------------------------------> 
</div></div>
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->

<div class="tab-pane fade" id="tab2default">
<!--  srart 3   ------------------------------------------------------------------------------------------------>

   
   <div class="col-xs-12 r-inner-details r-inner-details-sanad">
<?php   if(isset($finish_sanad)&&$finish_sanad!=null):?>   
 <table style="width:100%">
				<thead>
    		      <tr> 
                    <th style="text-align: right;" width="">المسلسل </th>
                    <th style="text-align: right;" width="">رقم السند</th>
                    <th style="text-align: right;" width="">نوع السند</th>
                    <th style="text-align: right;" width="">تاريخ الإيداع /تاريخ الاستحقاق </th>
                    <th style="text-align: right;" width="">التفاصيل </th>
                 </tr>    
    		   </thead>    
    	   	<tbody>
<?php $x=1;foreach($finish_sanad as $row):?>
                    <tr>
                        <td><?php echo $x++;?></td>
                        <td><?php echo $row->vouch_num;?></td>
                        <td><?php echo $array_paid_typy[$row->vouch_type]?></td>
                        <td><?php echo date("Y-m-d",$row->date_received)?></td>
                        <td>
                          <button type="button" class="btn btn-sm btn-info " data-toggle="modal" 
                                    data-target="#myMooodal<?php echo $row->vouch_num?>">
                                  <span class="glyphicon glyphicon-plus"> </span> التفاصيل </button>
                        </td>
                    </tr>
<?php endforeach;?>
</tbody></table>
<?php else :?>
 <div class="alert alert-danger" >
      لا يوجد سندات  منقضى استحقاقها
          </div>
<?php endif ;?>
<!---  end  3   ------------------------------------------------------------------------------------------------> 

</div></div>
<!---  end Tabs ----------------------------------------------------------------------------------------------------->                  
                    </div>
                </div>
            </div>
        </div>
<!---  end All ----------------------------------------------------------------------------------------------------->                  

    
    <!-----------------  التفاصيل ---------------------------------------------------->
    <?php include($details_page.'.php');?>
  
    
    

