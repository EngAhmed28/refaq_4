<div class="col-sm-11 col-xs-12">

      	<?php $this->load->view('admin/family/main_tabs'); ?>
 <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">

<!------------------------------------------------------------------------------------------------->
<div class="col-md-12">
<!--  <div class="panel with-nav-tabs panel-default">
  <div class="panel-heading"> 
  -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab0default" data-toggle="tab">البيانات الأساسية </a></li>
    <li class=""><a href="#tab1default" data-toggle="tab">بيانات الأب </a></li> 
    <li class=""><a href="#tab2default" data-toggle="tab">البيانات الزوجة</a></li>    
    <li class=""><a href="#tab3default" data-toggle="tab">أفراد الأسرة  </a></li>
    <li class=""><a href="#tab4default" data-toggle="tab">بيانات السكن</a></li> 
    <li class=""><a href="#tab5default" data-toggle="tab">البيانات المالية</a></li>  
   <li class=""><a href="#tab6default" data-toggle="tab"> الأجهزة المنزلية</a></li>     
    <li class=""><a href="#tab7default" data-toggle="tab">رأى الباحث</a></li> 
</ul>
</div>
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane fade in active" id="tab0default">
<!--  srart 1   ------------------------------------------------------------------------------------------------>
<?php include('family_details/basic_details.php');?>
<!---  end  1   ------------------------------------------------------------------------------------------------> 
</div>                                                                                   
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab1default">
<!--  srart 2   ------------------------------------------------------------------------------------------------>
<?php include('family_details/father_details.php');?>
<!---  end  2   ------------------------------------------------------------------------------------------------> 
</div>
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->

<div class="tab-pane fade" id="tab2default">
<!--  srart 3   ------------------------------------------------------------------------------------------------>
<?php include('family_details/mother_details.php');?>
<!---  end  3   ------------------------------------------------------------------------------------------------> 
</div>
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab3default">
<!--  srart 4   ------------------------------------------------------------------------------------------------>
<?php include('family_details/family_members_details.php');?>
<!---  end  4   ------------------------------------------------------------------------------------------------> 
</div>
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab4default">
<!--  srart 5   ------------------------------------------------------------------------------------------------>
<?php include('family_details/building_details.php');?>
<!---  end  5   ------------------------------------------------------------------------------------------------> 
</div>
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab5default">
<!--  srart 6   ------------------------------------------------------------------------------------------------>
<?php include('family_details/money_details.php');?>
<!---  end  6   ------------------------------------------------------------------------------------------------> 
</div>
<!--------------------------------------------------------------------------------------------------------------->
  
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab6default">
<!--  srart 7   ------------------------------------------------------------------------------------------------>
<?php include('family_details/devices_details.php');?>
<!---  end  7   ------------------------------------------------------------------------------------------------> 
</div>
<!---  end Tabs ----------------------------------------------------------------------------------------------------->                  
        
          <div class="tab-pane fade" id="tab7default">
         
<?php include('family_details/researcher_opinion_details.php');?>

          </div>
          
          
          
          
                    </div>
                </div>
 <!---  end All ----------------------------------------------------------------------------------------------------->                  
	<div class="col-xs-12 r-inner-btn">

      <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
            <button class="btn center-block " data-toggle="modal" data-target="#modalcon" > تحويل الملف</button>
                       
                         <!---->
                        <?php echo form_open_multipart('Family/operation/3/family_details/'.$mother_id);?>                           
                                       <div class=" modal fade" id="modalcon" >
                                    <div id="modal">
                                        <span class="text-center">  تحويل الملف
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                             <a href="#close" id="close" data-dismiss="modal">&#215;</a></span>
                                        <div class="r-form-add">
                                           <div class="row form-group">
                                               <div class="col-xs-3">
                                                <label > تحويل الى </label>
                                               </div>
                                               <div class="col-xs-9">
                                                <select class="form-control" name="family_file_to"  >
                                                <option >اختر</option>
                                              <?php if(isset($convent) && $convent!=null):
                                              foreach($convent as $one): ?>  
                                                <option value="<?php echo $one->id;?>"><?php echo $one->name; ?></option>
                                                <?php endforeach; endif?>
                                                 </select>
                                               </div>
                                           </div>
                                          <div class="row form-group">
                                               
                                               <div class="col-xs-3">
                                                <label > الملاحظات </label>
                                               </div>
                                               <div class="col-xs-9">
                                            <textarea name="reason" class="form-control"></textarea>
                                               </div>
                                            
                                            </div>
                                        </div>
                                          <div class="col-xs-3"></div>
                                          <div class="col-xs-6">
                                        <input class="btn  center-block" name="operation" type="submit" value=" تحويل الملف" />
                                          </div>
                                    </div>
                                </div>
                                  <?php echo form_close()?>
                                     <!---->  
                          
         </div>
<!--------------------------------------------------------------------->
   <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                 <button  class="btn center-block " data-toggle="modal" data-target="#op">قبول الملف</button> 
			<!------------------------------------------------->
             <?php echo form_open_multipart('Family/operation/1/family_details/'.$mother_id)?>                           
                                       <div class=" modal fade" id="op" >
                                    <div id="modal">
                                        <span class="text-center">  قبول الملف
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                             <a href="#close" id="close" data-dismiss="modal">&#215;</a></span>
                                        <div class="r-form-add">
                                           <div class="row form-group">
                                               <div class="col-xs-3">
                                                <label > الى</label>
                                               </div>
                                               <div class="col-xs-9">
                                               
                                                <select class="form-control" name="family_file_to"  >
                                                <option >اختر</option>
                                              <?php if(isset($convent) && $convent!=null):
                                              foreach($convent as $one): ?>  
                                                <option value="<?php echo $one->id;?>"><?php echo $one->name; ?></option>
                                                <?php endforeach; endif?>
                                                 </select>
                                               
                                               </div>
                                           </div>
                                            <div class="row form-group">
                                               
                                               <div class="col-xs-3">
                                                <label > الاسباب  </label>
                                               </div>
                                               <div class="col-xs-9">
                                            <textarea name="reason" class="form-control"></textarea>
                                               </div>
                                            </div> 
                                            
                                        </div>
                                          <div class="col-xs-3"></div>
                                          <div class="col-xs-6">
                                        <input class="btn  center-block" name="operation" type="submit" value=" قبول الملف" />
                                          </div>
                                    </div>
                                </div>
                                  <?php  echo form_close()?>
            <!------------------------------------------------->
            </div>
			<div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
			   
                 <button  class="btn center-block " data-toggle="modal" data-target="#wop">رفض الملف</button> 
                 	<!------------------------------------------------->
             <?php echo form_open_multipart('Family/operation/2/family_details/'.$mother_id)?>                           
                                       <div class=" modal fade" id="wop" >
                                    <div id="modal">
                                        <span class="text-center">  رفض الملف
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                             <a href="#close" id="close" data-dismiss="modal">&#215;</a></span>
                                        <div class="r-form-add">
                                           <div class="row form-group">
                                               <div class="col-xs-3">
                                                <label > الى</label>
                                               </div>
                                               <div class="col-xs-9">
                                               
                                                <select class="form-control" name="family_file_to"  >
                                                <option >اختر</option>
                                              <?php if(isset($convent) && $convent!=null):
                                              foreach($convent as $one): ?>  
                                                <option value="<?php echo $one->id;?>"><?php echo $one->name; ?></option>
                                                <?php endforeach; endif?>
                                                 </select>
                                               
                                               </div>
                                           </div>
                                            <div class="row form-group">
                                               
                                               <div class="col-xs-3">
                                                <label > الاسباب  </label>
                                               </div>
                                               <div class="col-xs-9">
                                            <textarea name="reason" class="form-control"></textarea>
                                               </div>
                                            </div> 
                                            
                                        </div>
                                          <div class="col-xs-3"></div>
                                          <div class="col-xs-6">
                                        <input class="btn  center-block" name="operation" type="submit" value=" رفض الملف" />
                                          </div>
                                    </div>
                                </div>
                                  <?php  echo form_close()?>
            <!------------------------------------------------->
			
			</div>
		
			<div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
		<?php if($_SESSION['from_id_fk'] == 1){?>
                     <button  class="btn center-block " data-toggle="modal" data-target="#app">إعتماد الملف</button> 
                 	<!------------------------------------------------->
             <?php echo form_open_multipart('Family/operation/4/family_details/'.$mother_id)?>                           
                                       <div class=" modal fade" id="app" >
                                    <div id="modal">
                                        <span class="text-center">  إعتماد الملف
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                             <a href="#close" id="close" data-dismiss="modal">&#215;</a></span>
                                        <div class="r-form-add">
                                     <!--      <div class="row form-group">
                                               <div class="col-xs-3">
                                                <label > الى</label>
                                               </div>
                                               <div class="col-xs-9">
                                               
                                                <select class="form-control" name="family_file_to"  >
                                                <option >اختر</option>
                                              <?php if(isset($convent) && $convent!=null):
                                              foreach($convent as $one): ?>  
                                                <option value="<?php echo $one->id;?>"><?php echo $one->name; ?></option>
                                                <?php endforeach; endif?>
                                                 </select>
                                               
                                               </div>
                                           </div>
                                      -->      <div class="row form-group">
                                               
                                               <div class="col-xs-3">
                                                <label > الملاحظات  </label>
                                               </div>
                                               <div class="col-xs-9">
                                            <textarea name="reason" class="form-control"></textarea>
                                            <input type="hidden" name="family_file_to" value="<?php echo $_SESSION['role_id_fk'] ?>"  />
                                               </div>
                                            </div> 
                                            
                                        </div>
                                          <div class="col-xs-3"></div>
                                          <div class="col-xs-6">
                                        <input class="btn  center-block" name="operation" type="submit" value="إعتماد الملف" />
                                          </div>
                                    </div>
                                </div>
                                  <?php  echo form_close()?>
            <!------------------------------------------------->
        <?php }else{ ?>
        	    <a href="<?php echo  base_url()."Family/";?>"> 
                 <button type="button" class="btn btn-info">عودة</button> </a>
        <?php } ?>
        
        
           </div>
			<div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
			     <button type="button" class="btn btn-info">طبع الخطابات</button>
            </div>
           

          <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
		       <button type="button" class="btn btn-info">طباعة</button>	
            </div>

</div>






</div>
<!--------------------------------------------------------------------------------------------------------->  
    <?php if(isset($all_operation) && $all_operation!=null):?>        
                    <div class="col-xs-12 r-inner-details">
                        <h4 class="r-head"> الاجراءات المتخذة</h4>
                        <table style="width:100%">
                            <tr>
                                <th>م </th>
                                <th>من</th>
                                <th> الي</th>
                                <th>الحالة </th>
                                <th>التاريخ </th>
                                <th>الوقت</th>
                                <th>الاجراءات </th>
                                <th> ملاحظات </th>
                            </tr>  <!-- Y-m-d H:i:s -->
                    <?php $count=1; foreach($all_operation as $row):?>
                            <tr>
                                <td><?php echo $count++?></td>
                                <td><?php echo  $jobs_name[$row->family_file_from]->name?></td>
                                <td><?php echo  $jobs_name[$row->family_file_to]->name?></td>
                                <td><?php if($row->process ==1){
                                              echo ' قبول الملف';
                                          }elseif($row->process ==2){
                                              echo 'رفض الملف';
                                          }elseif($row->process ==3){
                                               echo 'للإطلاع عند'.$jobs_name[$row->family_file_to]->name;
                                          }elseif($row->process ==4){
                                                 echo 'اعتماد الملف';
                                          }?>
                                </td>
                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                <td><?php if($row->process ==1){
                                              echo 'قبول';
                                          }elseif($row->process ==2){
                                              echo 'رفض';
                                          }elseif($row->process ==3){
                                               echo 'تحويل';
                                          }elseif($row->process ==4){
                                                 echo 'اعتماد';
                                          }?>
                               </td>
                               <td><?php echo $row->reason ?></td>
                            </tr>
                     <?php endforeach;?>       
                        </table>
                        
                    </div>
                
                 <?php endif?> 
  
<!--------------------------------------------------------------------------------------------------------->  
   </div>
  </div>

