
        <div class="col-sm-11 col-xs-12">
               
                <!--  -->
                	<?php $this->load->view('admin/finance_accounting/sandat_qabd_tabs'); ?>
               <!--  --> 








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
    <li class="active"><a href="#tab0default" data-toggle="tab">الشيكات الواردة </a></li>
    <li class=""><a href="#tab1default" data-toggle="tab">الشيكات الموافق عليها </a></li> 
    <li class=""><a href="#tab2default" data-toggle="tab">الشيكات المرفوضة</a></li>  
    <li class=""><a href="#tab3default" data-toggle="tab">جميع الشيكات</a></li>    
</ul>
</div>
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane fade in active" id="tab0default">
<!--  srart 1   ------------------------------------------------------------------------------------------------>
    <?php   if(isset($all_sheek)&&$all_sheek!=null):?>
<table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th style="text-align: right;" width="">المسلسل </th>
                    <th style="text-align: right;" width="">رقم السند </th>
                    <th style="text-align: right;" width="">رقم الشيك</th>
                    <th style="text-align: right;" width="">إسم البنك</th> 
                    <th style="text-align: right;" width="">الإجراء </th>
                    <th style="text-align: right;" width="">التفاصيل </th>
                 </tr>    
    		   </thead>    
    	   	<tbody>
         <?php $x=1; foreach($all_sheek as $row):?>   
         <tr>
         <td><?php echo $x++?></td>
         <td><?php echo $row->vouch_num;?></td>
         <td><?php echo $row->sheek_num;?></td>
         <td><?php echo $account_group[$row->maden]->name?></td>
         <td>
            
        <a href="<?php echo base_url().'admin/finance_accounting/ation_accept_refuse_sheek/1/'.$row->vouch_num."/".$row->date."/2"?>">
      <input class="btn btn-sm  btn-success" type="submit" value="موافق على الشيك" />
     </a>
        <a href="<?php echo base_url().'admin/finance_accounting/ation_accept_refuse_sheek/2/'.$row->vouch_num."/".$row->date."/2"?>">
      <input class="btn btn-sm  btn-danger" type="submit" value="رفض الشيك" />
     </a>
         </td>
         <td>
         <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num?>">
                   <span class="glyphicon glyphicon-plus"></span> التفاصيل </button>
         
         </td>
         </tr>   
         
           <?php endforeach;?>
            </tbody></table>

<div id="optionearea3"></div>
   <?php else :?>
 <div class="alert alert-danger" >
     لا توجد شيكات 
          </div>
<?php endif ;?>         
<!---  end  1   ------------------------------------------------------------------------------------------------> 
</div>                                                                                   
<!-------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab1default">
<!--  srart 2   ------------------------------------------------------------------------------------------------>
    <?php   if(isset($accept_sheek)&&$accept_sheek!=null):?>
<table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th style="text-align: right;" width="">المسلسل </th>
                    <th style="text-align: right;" width="">رقم السند </th>
                    <th style="text-align: right;" width="">رقم الشيك</th>
                    <th style="text-align: right;" width="">إسم البنك</th> 
                    <th style="text-align: right;" width="">التفاصيل </th>
                 </tr>    
    		   </thead>    
    	   	<tbody>
         <?php $x=1; foreach($accept_sheek as $row):?>   
         <tr>
         <td><?php echo $x++?></td>
         <td><?php echo $row->vouch_num;?></td>
         <td><?php echo $row->sheek_num;?></td>
         <td><?php echo $account_group[$row->maden]->name?></td>
         <td>
         <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num?>">
                   <span class="glyphicon glyphicon-plus"></span> التفاصيل </button>
         
         </td>
         </tr>   
           <?php endforeach;?>
            </tbody></table>

<div id="optionearea3"></div>
   <?php else :?>
 <div class="alert alert-danger" >
     لا توجد شيكات موافق عليها
          </div>
<?php endif ;?>   
<!---  end  2   ------------------------------------------------------------------------------------------------> 
</div>
<!-------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab2default">
<!--  srart 3   ------------------------------------------------------------------------------------------------>
    <?php   if(isset($refuse_sheek)&&$refuse_sheek!=null):?>
<table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th style="text-align: right;" width="">المسلسل </th>
                    <th style="text-align: right;" width="">رقم السند </th>
                    <th style="text-align: right;" width="">رقم الشيك</th>
                    <th style="text-align: right;" width="">إسم البنك</th> 
                    <th style="text-align: right;" width="">التفاصيل </th>
                 </tr>    
    		   </thead>    
    	   	<tbody>
         <?php $x=1; foreach($refuse_sheek as $row):?>   
         <tr>
         <td><?php echo $x++?></td>
         <td><?php echo $row->vouch_num;?></td>
         <td><?php echo $row->sheek_num;?></td>
         <td><?php echo $account_group[$row->maden]->name?></td>
         <td>
         <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num?>">
                   <span class="glyphicon glyphicon-plus"></span> التفاصيل </button>
         
         </td>
         </tr>   
           <?php endforeach;?>
            </tbody></table>

<div id="optionearea3"></div>
   <?php else :?>
 <div class="alert alert-danger" >
     لا توجد شيكات مرفوضة
          </div>
<?php endif ;?>   
<!---  end  3   ------------------------------------------------------------------------------------------------> 
</div>
<!-------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab3default">
<!--  srart 4   ------------------------------------------------------------------------------------------------>
 <?php   if(isset($all_sheekat)&&$all_sheekat!=null):?>
<table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th style="text-align: right;" width="">المسلسل </th>
                    <th style="text-align: right;" width="">رقم السند </th>
                    <th style="text-align: right;" width="">رقم الشيك</th>
                    <th style="text-align: right;" width="">إسم البنك</th> 
                    <th style="text-align: right;" width="">الحالة</th>
                    <th style="text-align: right;" width="">التفاصيل </th>
                 </tr>    
    		   </thead>    
    	   	<tbody>
         <?php $x=1; foreach($all_sheekat as $row):?>   
         <tr>
         <td><?php echo $x++?></td>
         <td><?php echo $row->vouch_num;?></td>
         <td><?php echo $row->sheek_num;?></td>
         <td><?php echo $account_group[$row->maden]->name?></td>
         <td>  <?php if($row->sheek_status == 1):?>
                 <input class="btn btn-sm  btn-success" type="submit" value="مقبول" />          
               <?php elseif($row->sheek_status == 2):?>
                 <input class="btn btn-sm  btn-danger" type="submit" value="مرفوض" />
               <?php elseif($row->sheek_status == 0):?>
               <input class="btn btn-sm  btn-default" type="submit" value="لم يتم الموافقة أو الرفض" />
               <?php endif?>
          </td>
         <td>
         <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num?>">
                   <span class="glyphicon glyphicon-plus"></span> التفاصيل </button>
         
          </td>
         </tr>   
           <?php endforeach;?>
            </tbody></table>

<div id="optionearea3"></div>
   <?php else :?>
 <div class="alert alert-danger" >
     لا توجد شيكات 
          </div>
<?php endif ;?>   
<!---  end  4   ------------------------------------------------------------------------------------------------> 
</div>
<!---  end Tabs ----------------------------------------------------------------------------------------------------->                  
                    </div>
                </div>
            </div>
        </div>
<!---  end All div ----------------------------------------------------------------------------------------------------->                  


<?php //die; ?>
<!--- التفاصيل --------------------------------------------------------------------------------------------------------->
 <?php   if(isset($all)&&$all!=null):?> 
    <?php foreach($all as $record):?>
    <div class="modal fade" id="myMooodal<?php echo $record->vouch_num?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:850px">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">تفاصيل السند</h5>
             </div>
            <br /> 
             <div class="row">
                <div class="col-md-2">  <h4>رقم السند :</h4>   </div>
                <div class="col-md-2"> <h5><?php echo $record->vouch_num; ?></h5></div>
                <div class="col-md-2"><h4>  تاريخ السند :</h4></div>
                <div class="col-md-2"><h5><?php  echo date("Y-m-d",$all_details[$record->vouch_num][0]->receipt_date) ?></h5> </div>
                <div class="col-md-2"> <h4> إسم البنك:</h4></div>
                <div class="col-md-2"><h5> <?php echo $account_group[$all_details[$record->vouch_num][0]->maden]->name?> </h5></div>
             </div>
             <br />
             
    <div class="row" style="width:800px;margin-right:15px">
                   <table  class="table table-bordered "  >
                   <thead>
                  <tr><th style="text-align: right;">مسلسل</th>
                <th style="text-align: right;">دائن</th>
                    <th style="text-align: right;">مدين</th> 
                   <th style="text-align: right;">إسم الحساب</th>
                   </tr>
                   </thead>
                   <tbody>
    <?php $y=1; 
    $total=0;
    foreach($all_details[$record->vouch_num] as $sub_row):?>
    <?php $total+=$sub_row->value ?>
    <?php endforeach;?>
    <tr>
    <td><?php  echo $y++;?></td>
    <td>  <?php echo $total ?> </td>
    <td> - </td>
    <td> <?php echo $account_group[$all_details[$record->vouch_num][0]->sheek_under_recived]->name ?> </td>
    </tr>
   
    
    <tr>
    <td> <?php  echo $y++;?> </td> 
    <td> - </td> 
    <td> <?php echo $total?> </td> 
    <td> <?php echo $awrak_kabd[0]->s ?> </td> 
    </tr>
                   </tbody>
                   </table>
                   </div>
    
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
       
      </div>
    </div>
  </div>
</div>   </div> 
    <?php endforeach;endif;?>
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    