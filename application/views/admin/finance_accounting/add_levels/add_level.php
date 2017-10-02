
        
        
          <div class="col-sm-11 col-xs-12">
               
                <!--  -->
                <div class="col-xs-12 r-side-table">
                    <div class="col-sm-9">
                        <h4> <span> <i class="fa fa-money" aria-hidden="true"></i></span>
                               <a style="color: white;" href="<?php echo  base_url()."Dashboard/finance"?>"> 
                          
                           الشؤون المالية والمحاسبة
                           
                           
                            </a>
                           
                               
                                </h4>
                    </div>
                    <div class="col-sm-3">
                         <h5> <?php echo $_SESSION['user_username']?></h5>
                        <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
                    </div>
                </div>
               <!--  --> 
<div class="details-resorce">
<?php if(isset($result)):?>
<!-----------------------------     EDIT  --------------------------------------------------------------> 
<?php echo form_open_multipart('admin/finance_accounting/update_levels/'.$result['id'],array('class'=>'form-horizontal'))?>
<div class="col-md-6 r-sanad-col-md">
        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12 inner-side r-data" id="optionearea4">
                <div class="col-xs-6">
                    <h4 class="r-h4">  المستوي الحسابي الأعلى </h4>
                </div>
                <div class="col-xs-6 r-input">
                 <select name="from_id" id="from_id"  class="selectpicker form-control" data-show-subtext="true" data-live-search="true" onchange="get_code($('#from_id').val(),'<?php echo $this->uri->segment(3)?>')">
            <option data-subtext="" value="nothing"> قم باختيار الحساب الرئيسى</option>
            <option data-subtext=""  value="frist" <?php if($result['level']==1){ echo 'selected';}?>> المستوى الأول </option>
              <?php foreach($all  as $record=>$value):?>
                <?php $selected='';if($result['from_id'] == $all[$record]->id ){$selected ='selected';}?>
                <?php $array_levels=array('','-','--','---','----','----','-----','------'); ?>
            <option data-subtext="" value="<?php echo $all[$record]->code?>" <?php echo $selected?> > 
                        <?php echo $array_levels[ $all[$record]->level].$all[$record]->name ?></option>
              <?php endforeach;?>
        </select>
                </div>
            </div>
            <?php if($result['level'] == 1 || $result['level'] == "1"){?>
            <?php $array_types=array(' قم بإختيار نوع الحساب ','أصول','خصوم','مصروفات','إرادات');?>
              <div class="col-xs-12 inner-side r-data">
                      <div class="col-xs-6">
                    <h4 class="r-h4">نوع الحساب</h4>
              </div>
              <div class="col-xs-6 r-input">
                <select name="types" id="types" class="form-control" >
                  <?php for($x=0;$x<count($array_types);$x++):
                  $selected_type=''; if($result['type'] == $x){$selected_type='selected';}?>
                  <option value="<?php echo $x;?>" <?php  echo $selected_type;?>><?php echo $array_types[$x];?></option>
                  <?php  endfor;?>
                </select>
            </div>
            </div>
            <?php }?>
            <div class="col-xs-12 inner-side r-data" id="optionearea1"> 
                 <div class="col-xs-6">
                    <h4 class="r-h4"> كود الحساب</h4>
                 </div>
                 <div class="col-xs-6 r-input">
                    <input type="text" id="code"  name="code" class="r-inner-h4"  value="<?php echo $result['code']?>" readonly="readonly"/>
                 </div>
            </div> 
              <div class="col-xs-12 inner-side r-data">
                <div class="col-xs-6">
                    <h4 class="r-h4"> إسم الحساب </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" id="name" name="name" class="r-inner-h4" value="<?php echo $result['name']?>" />
                </div>
            </div>
 <div class="col-xs-12 inner-side r-data">
                <div class="col-xs-6">
                    <h4 class="r-h4"> رصيد حساب فرعي </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select name="branch" id="branch" class="form-control"  onchange="get_rased($('#branch').val(),'update_levels')">
                       <option value="34"> قم بإختيار نوع الحساب </option>
                       <option value="1" <?php if($result['last_value']=='0'){echo 'selected';}?>>نعم</option>
                       <option value="2" <?php if($result['last_value']!='0'){echo 'selected';}?>>لا</option>
                   </select>
                </div>
            </div>
           <div id="optionearea2">
             <?php if($result['last_value']!='0'):?>
           <div class="col-xs-12 inner-side r-data">
                <div class="col-xs-6">
                    <h4 class="r-h4"> رصيد الحساب</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" class="r-inner-h4 " id="last_value"  name="last_value" value="<?php echo $result['last_value']?>" required="" />
                    
            </div>
          </div>  
           
              <?php endif;?>  
           </div>

          <div class="col-xs-4 r-input"></div>
            <div class="col-xs-6 r-input">
                <input type="submit" class="btn center-block r-manage-btn" value="تعديل" name="update_code"/> 
            </div>
            <div class="col-xs-2 r-input"></div>


       </div>
</div>
<?php echo form_close()?>
<!-----------------------------     EDIT  -------------------------------------------------------------->    
<?php else: ?>
<!-------------------------------    ADD    -------------------------------------------------------------->    
 <?php echo form_open_multipart('admin/finance_accounting/add_level',array('class'=>"form-horizontal",'role'=>"form" ))?>
    <div class="col-md-6 r-sanad-col-md">
        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12 inner-side r-data" id="optionearea4">
                <div class="col-xs-6">
                    <h4 class="r-h4">  المستوي الحسابي الأعلى </h4>
                </div>
                <div class="col-xs-6 r-input">
                 <select name="from_id" id="from_id" onchange="get_code($('#from_id').val(),'add_level')"  class="selectpicker form-control" data-show-subtext="true" data-live-search="true" >
            <option data-subtext="" value="nothing"> قم باختيار الحساب الرئيسى</option>
            <option data-subtext=""  value="frist"> المستوى الأول </option>
              <?php foreach($all  as $record=>$value):?>
                <?php $array_levels=array('','-','--','---','----','----','-----','------'); ?>
            <option data-subtext="" value="<?php echo $all[$record]->code?>"> 
                        <?php echo $array_levels[ $all[$record]->level].$all[$record]->name ?></option>
              <?php endforeach;?>
        </select>
                </div>
            </div>
           <!-- -->
            <div  id="optionearea1">
               
            </div>
           <!-- -->
           
            <div class="col-xs-12 inner-side r-data">
                <div class="col-xs-6">
                    <h4 class="r-h4"> إسم الحساب </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" id="name" name="name" class="r-inner-h4 "  value="" />
                </div>
            </div>
            <div class="col-xs-12 inner-side r-data">
                <div class="col-xs-6">
                    <h4 class="r-h4"> رصيد حساب فرعي </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select name="branch" id="branch" class="form-control"  onchange="get_rased($('#branch').val(),'<?php echo $this->uri->segment(3)?>')">
                       <option value="34"> قم بإختيار نوع الحساب </option>
                       <option value="1">نعم</option>
                       <option value="2">لا</option>
                   </select>
                </div>
            </div>
           <div id="optionearea2"></div>
           
          <div class="col-xs-4 r-input"></div>
            <div class="col-xs-6 r-input">
                <input type="submit" class="btn center-block r-manage-btn" value="إضافة حساب" name="add_code"/> 
            </div>
            <div class="col-xs-2 r-input"></div>
        </div>
    </div>
   <?php echo form_close()?>
<!-------------------------------    ADD    -------------------------------------------------------------->    
<?php endif; ?>
  <?php // var_dump($this->uri->segment(3));?>
<!---------------------------------------------------------------------------------------------------------------->
    <div class="col-md-6 r-sanad-col-md  r-show-sanad-data">
    <div class="col-xs-12 r-inner-details r-inner-details-bord">
        <div class="col-xs-12 r-sanads">
             <ul id="menu-group-1" class="nav">
             <!---- 1 --> 
             <?php  $i=1; foreach($levels as $level ):?>
                <li class="parent parent-bottom">
                    <a class="" href="#">
                        <span data-toggle="collapse" data-parent="#menu-group-1" href="#item-<?php echo $i?>" class="sign"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="lbl"><?php echo $level->name.$level->code?> </span>
                    </a>
                    <ul class="collapse" id="item-<?php echo $i?>">
                       <?php  if(sizeof($level->sub) >0):
                         $leve_1=1; foreach($level->sub as $level_one): ?>
                        <!--- 2    -->
                        <li class="parent active">
                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-<?php echo $leve_1?>" class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                            <span class="lbl"> <?php echo $level_one->name.$level_one->code?> </span>
                               <a href="<?php echo base_url()."admin/finance_accounting/update_levels/".$level_one->id?>">
                                   <button class="btn btn-primary sanad-btn pull-right">
                                  <i class="fa fa-pencil" aria-hidden="true"></i></button>
                               </a> 
                           <button class="btn btn-success sanad-btn pull-right" 
                           onclick="get_select('<?php echo $level_one->name?>');get_code('<?php echo $level_one->code?>','<?php echo $this->uri->segment(3)?>');"> 
                           <i class="fa fa-plus" aria-hidden="true"></i></button>
                          
                            <ul class="collapse" id="sub-item-<?php echo $leve_1?>">
                               
                                <?php  if(sizeof($level_one->sub) >0):
                         $leve_2=1; foreach($level_one->sub as $level_two): ?>
                               <!--- 3 -->
                                <li class="parent active">
                                    <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-<?php echo $leve_2?>" class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                    <span class="lbl"><?php echo $level_two->name.$level_two->code?></span>
                                       <a href="<?php echo base_url()."admin/finance_accounting/update_levels/".$level_two->id?>">   
                                         <button class="btn btn-primary sanad-btn pull-right">
                                         <i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        </a>
                                    <button class="btn btn-success sanad-btn pull-right"
                                     onclick="get_select('<?php echo $level_two->name?>');get_code('<?php echo $level_two->code?>','<?php echo $this->uri->segment(3)?>');"> 
                                    <i class="fa fa-plus" aria-hidden="true"></i></button>
                             </li>

                                <li>
                                    <ul class="collapse" id="sub-<?php echo $leve_2?>">
                                       
                                        <?php  if(sizeof($level_two->sub) >0):
                                         $leve_3=1; foreach($level_two->sub as $leve_three): ?>
                                       <!---- 4 ------>
                                        <li class="parent active">
                                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#subitem-<?php echo $leve_3?>" class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                            <span class="lbl"> <?php echo $leve_three->name.$leve_three->code?> </span>
                                               <a href="<?php echo base_url()."admin/finance_accounting/update_levels/".$leve_three->id?>" >   
                                         <button class="btn btn-primary sanad-btn pull-right">
                                         <i class="fa fa-pencil" aria-hidden="true"></i></button>
                                              </a>
                                         <button class="btn btn-success sanad-btn pull-right"
                                           onclick="get_select('<?php echo $leve_three->name?>');get_code('<?php echo $leve_three->code?>','<?php echo $this->uri->segment(3)?>');"> 
                                          <i class="fa fa-plus" aria-hidden="true"></i></button>

                                        </li>
                                        <li>
                                            <ul class="collapse" id="subitem-<?php echo $leve_3?>">
                                               <?php  if(sizeof($leve_three->sub) >0):
                                         $leve_4=1; foreach($leve_three->sub as $leve_four): ?>
                                               <!-- 5 ------>
                                                <li class="parent active">
                                                    <span data-toggle="collapse" data-parent="#menu-group-1" href="#s-item-<?php echo $leve_4?>" class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <span class="lbl"><?php echo $leve_four->name.$leve_four->code?> </span>
                                                     <a href="<?php echo base_url()."admin/finance_accounting/update_levels/".$leve_four->id?>" >   
                                         <button class="btn btn-primary sanad-btn pull-right">
                                         <i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                      </a> 
                                                   ,<!-- <button class="btn btn-success sanad-btn pull-right"> 
                                                    <i class="fa fa-plus" aria-hidden="true"></i></button>
                                               -->
                                                </li>
                                                 <?php $leve_4++;  endforeach;endif; ?>
                                               <!-- 5 ------> 
                                            </ul>
                                        </li>
                                         <?php $leve_3++;  endforeach;endif; ?>
                                  <!---- 4 ------>
                                    </ul>
                                </li>
                                 <?php $leve_2++;  endforeach;endif; ?>
                               <!--- 3 -->
                            </ul>
                       </li>
                        <?php $leve_1++;  endforeach;endif; ?>
                        <!--- 2 -->
                    </ul>
                </li>
                 <?php  $i++; endforeach?>
                <!---- 1 -->                   
                                </ul>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------------------------------------------------->
                </div>
            </div>
          <script>
    function get_code(code_post ,controller){

  if(code_post != 'nothing'){
      var dataString = 'code_post='+ code_post ;
      $.ajax({
          type:'post',
          url: '<?php echo base_url() ?>admin/Finance_accounting/'+controller,
          data:dataString,
          dataType: 'html',
          cache:false,
          success: function(html){
              $("#optionearea1").html(html);
          }
      });
  }

    }
</script>           
 
<script>
    function get_rased(rased,controller){

          var dataString = 'rased='+ rased ;
          $.ajax({
              type:'post',
              url: '<?php echo base_url() ?>admin/Finance_accounting/'+controller,
              data:dataString,
              dataType: 'html',
              cache:false,
              success: function(html){
                  $("#optionearea2").html(html);
              }
          });
    }
</script>    

          <script>
    function get_select(name_post){

 
      var dataString = "name_post="+ name_post;
      $.ajax({
          type:'post',
          url: '<?php echo base_url() ?>admin/Finance_accounting/select_code',
          data:dataString,
          dataType: 'html',
          cache:false,
          success: function(html){
              $("#optionearea4").html(html);
          }
      });

    }
</script>      
   