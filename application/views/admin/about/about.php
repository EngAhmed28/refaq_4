            <div class="col-sm-11 col-xs-12">
              <!--  -->
                	<?php $this->load->view('admin/about/main_tabs'); ?>
               <!--  -->
               
               
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
<!-------------------------------------------------------------------------------------------------------------------------->
<?php if(isset($result) && $result!=null):?>  
   
    <div class="col-sm-11 col-xs-12"> 
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                           <thead>
             <tr>
             <th>م</th>
             <th>المقطع</th>
            <!-- <th>تفاصيل</th> -->
             <th>الاجراء</th>
             </tr>
             </thead>
             <tbody>
          <?php  $count=1; foreach($result as $row):?>
    <tr>
             <td><?php echo $count++?></td>
             <td><?php echo word_limiter($row->content,15)?></td>
            <!-- <td>  </td> -->
             <td> <a href="<?php echo base_url().'admin/About_association/update_about/'.$row->id?>">
                      <i class="fa fa-pencil " aria-hidden="true"></i></a> 
                  <a href="<?php echo base_url().'admin/About_association/delete_about/about/'.$row->id?>">
                      <i class="fa fa-trash" aria-hidden="true"></i> </a> 
            </td>
     </tr>
           <?php endforeach; ?>   
             </tbody>
             </table>      
 </div>
   
<!--------------------------------->
<?php else:?>
   
   <?php if(isset($result_edite) && $result_edite!=null):?>  
  <?php echo form_open_multipart('admin/About_association/update_about/'.$result_edite["id"]); 
       $out['content']=$result_edite['content'];
       $out['input']= ' <input type="submit" name="UPDATE" value="تعديل" class="btn center-block" />';?>
    <?php else:?>
      <?php echo form_open_multipart('admin/About_association/about');
         $out['content']="";
         $out['input']=' <input type="submit" name="ADD" value="إضافة" class="btn center-block" />';?>
      
   <?php endif?>
   <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-3">
                            <h4 class="r-h4"> المقطع </h4>
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
                </div>
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
