            <div class="col-sm-11 col-xs-12">
              <!--  -->
                	<?php $this->load->view('admin/about/main_tabs'); ?>
               <!--  -->
               
               
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
<!-------------------------------------------------------------------------------------------------------------------------->
<?php if(isset($records) && $records !=null):?> 


 <div class="col-sm-11 col-xs-12"> 
            <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                           <thead>
             <tr>
             <th>إسم الجمعية</th>
             <th>الاجراء</th>
             </tr>
             </thead>
             <tbody>
          <?php foreach($records as $row):?>
    <tr>
             <td><?php echo$row->name?></td>
             <td> <a href="<?php echo base_url().'admin/About_association/update_main_data/'.$row->id?>">
                      <i class="fa fa-pencil " aria-hidden="true"></i></a> 
                  <a href="<?php echo base_url().'admin/About_association/delete_com/'.$row->id."/main_data/main_data/"?>">
                      <i class="fa fa-trash" aria-hidden="true"></i> </a> 
            </td>
     </tr>
           <?php endforeach; ?>   
             </tbody>
             </table>      
 </div>


<?php else:?> 
   
    <?php if(isset($result) && $result!=null):?>  
  <?php echo form_open_multipart('admin/About_association/update_main_data/'.$result["id"]); 
       $out['name']=$result['name'];
       $out['address']=$result['address'];
       $out['date_created']=$result['date_created'];
       $out['web_name']=$result['web_name'];
       $out['logo']='<img src="'.base_url().'uploads/images/'.$result['logo'].'" width="100px" height="100px" />';
       $out['facebook']=$result['facebook'];
       $out['google']=$result['google'];
       $out['twitter']=$result['twitter'];
       $out['youtube']=$result['youtube'];
       $out['instagram']=$result['instagram'];
       $out['input']= ' <input type="submit" name="UPDATE" value="تعديل" class="btn center-block" />';
       $out['phone_title']='إضاف ارقام للهاتف';
       $out['emails_title']='إضافة بريد الكترونى';
       ?>
    <?php else:?>
      <?php echo form_open_multipart('admin/About_association/main_data',array('class'=>"form-horizontal",'role'=>"form"));
       $out['name']="";
       $out['address']="";
       $out['date_created']="";
       $out['web_name']="";
       $out['logo']="";
       $out['facebook']="";
       $out['google']="";
       $out['twitter']="";
       $out['youtube']="";
       $out['instagram']="";
       $out['input']=' <input type="submit" name="ADD" value="إضافة" class="btn center-block" />';
       $out['phone_title']='أرقام الهاتف ';
       $out['emails_title']='البريد الإلكتروني ';?>
      
   <?php endif?>
<h4 class="r-h4"> <i class="fa fa-book" aria-hidden="true"></i> البيانات الأساسية </h4>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">إسم الجمعية</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="name" class="r-inner-h4" value="<?php echo $out['name']?>" required="" />
                </div>
            </div>
      
      <div class="col-xs-12 ">
        <div class="col-xs-6">
            <h4 class="r-h4 ">  تاريخ الإنشاء </h4>
        </div>
        <div class="col-xs-6 r-input ">
            <div class="docs-datepicker">
                <div class="input-group">
                    <input type="text" class="form-control docs-date" value="<?php echo $out['date_created']?>" name="date_created" placeholder="شهر / يوم / سنة "/>
                </div>
            </div>
        </div>
    </div> 
      
 </div>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
 <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">عنوان الجمعية</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="address" class="r-inner-h4" value="<?php echo $out['address']?>" required="" />
                </div>
            </div>
<div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">إسم الموقع</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="web_name" class="r-inner-h4" value="<?php echo $out['web_name']?>" required="" />
                </div>
            </div>      
      
</div>
<!----------------->

<div class="col-xs-12  inner-side r-data">
        <div class="col-xs-3">
            <h4 class="r-h4"> لوجو الجمعية </h4>
        </div>
       <div class="col-xs-3 r-input">
        <div class="">
            <input type="file" name="logo" class="" />  
        </div>
    </div>
        <div class="col-xs-3">
        <?php echo $out['logo']?>
       <!-- <img src="" width="100px" height="100px" /> -->
 </div>    
</div>
<!----------------->
<h4 class="r-h4"> <i class="fa fa-phone-square" aria-hidden="true"></i> وسائل الاتصال </h4>
<div class="row">
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
 
 <!---------------------------------->
                <?php if(isset($phones) && $phones!=null): ?>
              
               <div class="col-xs-1"></div>
                <div class="col-xs-5">
                <table style="width: 200px;" >
               <tr>  <th>م</th> <th> رقم الهاتف </th>  <th> الاجراء</th></tr>
               <tbody >
               <?php    $i=1;   foreach($phones as $one_phone): ?>  
              <tr>
              <td> <?php echo $i++?></td> <td><?php echo $one_phone->data_com?></td>
                  <td> <a href="<?php echo base_url()."admin/About_association/delete_com/".$one_phone->id."/update_main_data/main_data_com/".$result["id"]?>"> 
                             <i class="fa fa-trash-o" aria-hidden="true"></i>  </a> </td>
              </tr>
                <?php endforeach;?>
              </tbody>  </table>
                </div>
                <div class="col-xs-6"></div>
               
                <?php endif;?>
<!---------------------------------->
<div class="col-xs-12  inner-side r-data">
        <div class="col-xs-6">
            <h4 class="r-h4"> <?php echo $out['phone_title']?> </h4>
        </div>
        <div class="col-xs-3 r-input">
            <input type="number" id="tel_num"  name="tel_nums" min="0" max="5"
               onkeyup="return lood_edit($('#tel_num').val(),'tel_num','optionearea2');" class="r-inner-h4"  />
        </div>
    <div class="col-xs-3 r-input"></div>
    <div  class="col-xs-12" id="optionearea2"></div>    
    </div>


</div>

<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<!---------------------------------->
                <?php if(isset($emails) && $emails!=null): ?>
               <div class="col-xs-1"></div>
                <div class="col-xs-5">
               <table >
               <tr>  <th>م</th> <th> البريد الالكترونى</th>  <th> الاجراء</th></tr>
               <tbody style="width: 200px;">
               <?php    $i=1;   foreach($emails as $one_email): ?>  
              <tr>
              <td> <?php echo $i++?></td> <td><?php echo $one_email->data_com?></td>
                  <td> <a href="<?php echo base_url()."admin/About_association/delete_com/".$one_email->id."/update_main_data/main_data_com/".$result["id"]?>"> 
                             <i class="fa fa-trash-o" aria-hidden="true"></i>  </a> </td>
              </tr>
                <?php endforeach;?>
              </tbody>  </table>
              </div>
                <div class="col-xs-6"></div>
                <?php endif;?>
<!---------------------------------->



<div class="col-xs-12  inner-side r-data">
        <div class="col-xs-6">
            <h4 class="r-h4"><?php echo $out['emails_title']?>  </h4>
        </div>
        <div class="col-xs-3 r-input">
            <input type="number" id="email_num"  name="email_nums" min="0" max="5"
               onkeyup="return lood_edit($('#email_num').val(),'email_num','optionearea3');" class="r-inner-h4"  />
        </div>
         <div class="col-xs-3 r-input"></div>
        
    <div  class="col-xs-12" id="optionearea3"></div>    
    </div>
</div>

</div>
<!------------------->

<h4 class="r-h4"> <i class="fa fa-handshake-o" aria-hidden="true"></i> وسائل التواصل الإجتماعى</h4>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
             <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">فيس بوك</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="facebook" class="r-inner-h4" value="<?php echo $out['facebook']?>"  />
                </div>
            </div>  
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">تويتر</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="twitter" class="r-inner-h4" value="<?php echo $out['twitter']?>"  />
                </div>
            </div>  
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">انستجرام</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="instagram" class="r-inner-h4" value="<?php echo $out['instagram']?>" />
                </div>
            </div>  
</div>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
          <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> اليوتيوب</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="youtube" class="r-inner-h4" value="<?php echo $out['youtube']?>"  />
                </div>
            </div>  
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> الجوجل بلس </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="google" class="r-inner-h4" value="<?php echo $out['google']?>"  />
                </div>
            </div>  
           <!-- <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"></h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="title" class="r-inner-h4" value="<?php echo $out['']?>" required="" />
                </div>
            </div>  -->
</div>
<!-------------------------------------------->
<div class="col-xs-12 r-inner-btn">       
                        <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                         <?php echo $out['input'];?>         
                        </div>
                         <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                    </div>
 <?php echo form_close()?>                    


<?php endif;?> 

<!-------------------------------------------------------------------------------------------------------------------------->     
                    </div>
                </div>
            </div>
             <!----------------->
<script>
function lood_edit(num,post_name,div_name){
    if(num>0 && num != ''){
        var id = num;
        var dataString = post_name+'=' + id ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/About_association/laod_pages',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#"+div_name).html(html);
            }
        });
        return false;
    }else{
        $("#"+div_name).html('');
    }
}



</script>