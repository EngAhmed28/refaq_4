            <div class="col-sm-11 col-xs-12">
              <!--  -->
                	<?php $this->load->view('admin/about/main_tabs'); ?>
               <!--  -->
               
               
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
<!-------------------------------------------------------------------------------------------------------------------------->
 <?php if(isset($result) && $result!=null):?>  
  <?php echo form_open_multipart('admin/About_association/update_goals/'.$result["id"]); 
       $out['content']=$result['content'];
       $out['title']=$result['title'];
       $out['img']='<img src="'.base_url("").'uploads/images/'.$result['img'].'" width="100px" height="100px" />';
       $out['input']= ' <input type="submit" name="UPDATE" value="تعديل" class="btn center-block" />';?>
    <?php else:?>
      <?php echo form_open_multipart('admin/About_association/goals');
         $out['content']="";
         $out['input']=' <input type="submit" name="ADD" value="إضافة" class="btn center-block" />';
         $out['title']="";
         $out['img']="";
         ?>
      
   <?php endif?>
 
 <!-- <img src="<?php echo base_url('uploads/images').'/'.$out['img'] ?>" width="100px" height="100px" />  -->
 
 <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
 <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">عنوان المقطع</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="title" class="r-inner-h4" value="<?php echo $out['title']?>" />
                </div>
            </div>

 </div>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
 <div class="col-xs-12">
    <div class="col-xs-3">
        <h4 class="r-h4">  صورة المقطع </h4>
    </div>
    <div class="col-xs-5 r-input">
        <div class="field manage-field">
            <input type="file" name="img" class="file_input_with_replacement-1" />  
        </div>
    </div>
     <div class="col-xs-4">
       <?php echo $out['img'];?>
    </div> 
    
</div>
 
</div>
<div class="col-xs-12 col-sm-12 col-xs-12 inner-side r-data">
<div class="col-sm-3">
    <h4 class="r-h4"> تفاصيل  المقطع </h4>
</div>
<div class="col-sm-9 r-input">
    <div class="adjoined-bottom">
        <div class="grid-container">
            <div class="grid-width-100">

                <textarea class="r-textarea" id="editor" name="content" > 
                  <?php echo $out['content'] ?></textarea>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-xs-12 r-inner-btn">
                       
                        <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                       
                      <?php echo $out['input'];?>         
                       
                        </div>
                         <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                    
                    </div>
<?php echo form_close()?>   


                   
<!-------------------------------------------------------------------------------------------------------------------------->     
                    </div>
                    
                    
                    
                </div>
              


<?php if(isset($record) && $record!=null):?>  
   
    <div class="col-sm-12 col-xs-12 r-inner-details"> 
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                           <thead>
             <tr>
             <th>م</th>
             <th>عنوان المقطع </th>
             <th>المقطع</th> 
             <th>الاجراء</th>
             </tr>
             </thead>
             <tbody>
          <?php  $count=1; foreach($record as $row):?>
    <tr>
             <td><?php echo $count++?></td>
              <td> <?php echo $row->title?> </td>
             <td><?php echo word_limiter($row->content,15)?></td>
            <!-- <td>  </td> -->
             <td> <a href="<?php echo base_url().'admin/About_association/update_goals/'.$row->id?>">
                      <i class="fa fa-pencil " aria-hidden="true"></i></a> 
                  <a href="<?php echo base_url().'admin/About_association/delete_about/goals/'.$row->id?>">
                      <i class="fa fa-trash" aria-hidden="true"></i> </a> 
            </td>
     </tr>
           <?php endforeach; ?>   
             </tbody>
             </table>      
 </div>

<?php endif?>

  
            </div>
             <!----------------->
