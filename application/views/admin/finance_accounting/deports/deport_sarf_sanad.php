 
 
  <div class="col-sm-11 col-xs-12">
                 <!--  -->
  <?php $this->load->view('admin/finance_accounting/sandat_sarf_tabs'); ?>
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
               
               
               

<div class="details-resorce">
<div class="col-xs-12 r-inner-details">
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#one" aria-controls="one" role="tab" data-toggle="tab">  ترحيل سند </a></li>
    <li role="presentation"><a href="#two" aria-controls="two" role="tab" data-toggle="tab"> إلغاء ترحيل سند </a></li>
    <li role="presentation"><a href="#three" aria-controls="three" role="tab" data-toggle="tab">  جميع السندات المرحلة  </a></li>
 </ul>
<div class="tab-content">






    <div role="tabpanel" class="tab-pane fade in active" id="one">
        <div class="col-xs-12 r-inner-details r-inner-details-sanad">
        <?php   if(isset($vouchers)&&$vouchers!=null):?>
        
            <table style="width:100%">
            
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
     <a href="<?php echo base_url().'admin/Finance_accounting/deports_vouchers_sarf/'.$row->vouch_num.'/1/'.$process."/".$controller?>">
      <input class="btn btn-sm  btn-success"  type="submit" value="ترحيل السند" />
     </a>     </td>
     <td><button type="button" class="btn btn-sm btn-info " 
     data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num?>">
     
     <span class="glyphicon glyphicon-plus"></span> التفاصيل </button></td> 
</tr>

        
        
        
        
        
     
        <!--
                <tr>
                    <td>1</td>
                    <td>111 </td>
                    <td> 2017-07-07 </td>
                    <td>نقدي </td>
                    <td> 212121.00	</td>
                    <td> الصندوق الاول	 </td>
                   <td class="edit-sanad2">ترحيل السند</td>
                <td>
                    <a class="pop-manage-sanad" data-toggle="modal" data-target=".secondModal"> تفاصيل</a>
                       <div class=" modal fade secondModal" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-manage">
                        <h4 class="pop-manage-h4 text-center"> تفاصيل السند </h4>
                         <table  style="width:98%" class="inner-pop-table">
                            <tr>
                                <th>م</th>
                                <th>مدين</th>
                                <th>دائن</th>
                                <th>إسم الحساب</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>212121</td>
                                <td>s</td>
                                <td>يحيى البكري - مؤسسة بئر العبد</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                 <td>s</td>
                                <td>212121</td>
                                <td>يحيى البكري - مؤسسة بئر العبد</td>
                            </tr>
                        </table>
                        <div class="modal-footer ">
                            <button type="button" class="btn manage-close-pop manage-close-pop-sanad"
                             data-dismiss="modal">اغلاق</button>
                        </div>
                    </div>
                </div>
             
                </td>
                 </tr>  
                -->
                 
                 <?php endforeach;?>
                 
                 
            </table>
            
            <?php else:?>
<div class="alert alert-danger" role="alert">
  <strong>عذرا...!</strong> لا توجد هناك سندات 
</div>
<?php endif; ?>
        </div>
    </div>
    
    
    
    
    
    <!-------- end one    ----------------->
    
    
    
    
    
    
    <div role="tabpanel" class="tab-pane fade in" id="two">
     <div class="col-xs-12 r-inner-details r-inner-details-sanad">
     <?php   if(isset($all_vouchers)&&$all_vouchers!=null):?>
            <table style="width:100%">
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
     <td>   <a href="<?php echo base_url().'admin/Finance_accounting/deports_vouchers_sarf/'.$row->vouch_num.'/0/'.$process."/".$controller?>">
        <input class="btn btn-sm  btn-danger"  type="" value="إلغاء ترحيل السند" />  
        </a>  
      </td>
     <td><button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num; ?>"><span class="glyphicon glyphicon-plus"></span> التفاصيل </button></td> 
</tr>
<?php endforeach;?>           
                
       
               
               
            
            </table>
            
            <?php else:?>
<div class="alert alert-danger" role="alert">
  <strong>عذرا...!</strong> لا توجد هناك سندات 
</div>
<?php endif; ?>
            
            
            
     </div>
    </div>
    
    
    
    
    <!-------------- end two ------------------------------>
    
    
    
    
    
    
    
    
    
    <div role="tabpanel" class="tab-pane fade in" id="three">
         <div class="col-xs-12 r-inner-details r-inner-details-sanad">
         <?php   if(isset($all_vouchers)&&$all_vouchers!=null):?>
            <table style="width:100%">
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
     <td>   <a href="<?php echo base_url().'admin/Finance_accounting/deports_vouchers_sarf/'.$row->vouch_num.'/0/'.$process."/".$controller?>">
        <input class="btn btn-sm  btn-danger"  type="" value="إلغاء ترحيل السند" />  
        </a>  
      </td>
     <td><button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myMooodal<?php echo $row->vouch_num; ?>"><span class="glyphicon glyphicon-plus"></span> التفاصيل </button></td> 
</tr>
<?php endforeach;?>   
                 
    
            </table>
            
            
            
            <?php else:?>
<div class="alert alert-danger" role="alert">
  <strong>عذرا...!</strong> لا توجد هناك سندات 
</div>
<?php endif; ?>
         </div>
   </div>
 </div>
</div>
</div>
           
              </div>
              
              
              
                <?php include($details_page.'.php');?>
  