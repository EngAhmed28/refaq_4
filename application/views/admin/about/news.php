            <div class="col-sm-11 col-xs-12">
              <!--  -->
                	<?php $this->load->view('admin/about/main_tabs'); ?>
               <!--  -->
               
               
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
<!-------------------------------------------------------------------------------------------------------------------------->

  <?php if(isset($result) && $result!=null):?>  
  <?php echo  form_open_multipart('admin/About_association/update_news/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form"));
       $out['title']=$result['title'];
       $out['content']=$result['content'];
       $out['date']=date("m/d/Y",$result['date']);
       $out['input']= ' <input type="submit" name="UPDATE" value="تعديل" class="btn center-block" />';
       ?>
    <?php else:?>
      <?php echo  form_open_multipart('admin/About_association/news',array('class'=>"form-horizontal",'role'=>"form"));
       $out['title']="";
       $out['content']="";
       $out['date']="";
       $out['input']=' <input type="submit" name="ADD" value="إضافة" class="btn center-block" />';
      ?>
   <?php endif?>
 <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">عنوان الخبر</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="title" class="r-inner-h4" value="<?php echo $out['title'] ?>" required="" />
                </div>
            </div>

 </div>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-12 ">
        <div class="col-xs-6">
            <h4 class="r-h4 ">  تاريخ الخبر </h4>
        </div>
        <div class="col-xs-6 r-input ">
            <div class="docs-datepicker">
                <div class="input-group">
                    <input type="text" class="form-control docs-date" value="<?php echo $out['date']?>" name="date" placeholder="شهر / يوم / سنة " required="" />
                </div>
            </div>
        </div>
    </div>    
</div>
<!-- -->
<div class="">

<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
   <div class="col-xs-12 "> 
        <div class="col-xs-6">
            <h4 class="r-h4"> عدد الصور </h4>
        </div>
        <div class="col-xs-2 r-input">
            <input type="number" id="photo_num"  name="photo_num" min="0" max="5"
               onkeyup="return lood_edit($('#photo_num').val());" class="r-inner-h4"  />
        </div>
    </div>
    <div  class="col-xs-12" id="optionearea2"></div>    
    </div>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
     <?php if(isset($images) && $images!=null): ?>
               <div class="col-xs-1"></div>
                <div class="col-xs-11">
                <table  class="table-bordered dt-responsive nowrap"  width="70%">
               <tr>  <th>م</th> <th>الصورة </th>  <th> الاجراء</th></tr>
               <tbody >
               <?php    $i=1;   foreach($images as $one_image): ?>  
              <tr>
              <td> <?php echo $i++?></td> 
              <td><img src="<?php echo base_url()."uploads/images/".$one_image->img?>" width="50px" height="50px" /></td>
              <td> <a href="<?php echo base_url()."admin/About_association/delete_image/".$one_image->id."/update_news/albums_photo/".$result["id"]?>"> 
                             <i class="fa fa-trash-o" aria-hidden="true"></i>  </a> </td>
              </tr>
                <?php endforeach;?>
              </tbody>  </table>
                </div>
                <?php endif;?>
</div>                
<!-- -->

</div>

<div class="col-xs-12 col-sm-12 col-xs-12 inner-side r-data">
<div class="col-sm-3">
    <h4 class="r-h4"> تفاصيل  الخبر </h4>
</div>
<div class="col-sm-9 r-input">
    <div class="adjoined-bottom">
        <div class="grid-container">
            <div class="grid-width-100">

                <textarea class="r-textarea" id="editor" name="content" required="" ><?php echo $out['content'] ?>  </textarea>
            </div>
        </div>
    </div>
</div>
</div>
<!-- -->
<div class="col-xs-12 r-inner-btn">
    <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"> 
     <?php echo $out['input']?>
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
             <th>عنوان الخبر</th>
             <th>تاريخ الخبر</th> 
             <th>الاجراء</th>
             </tr>
             </thead>
             <tbody>
          <?php  $count=1; foreach($record as $row):?>
    <tr>
             <td><?php echo $count++?></td>
              <td> <?php echo $row->title?> </td>
             <td><?php echo date("Y-m-d",$row->date)?></td>
            <!-- <td>  </td> -->
             <td> <a href="<?php echo base_url().'admin/About_association/update_news/'.$row->id?>">
                      <i class="fa fa-pencil " aria-hidden="true"></i></a> 
                  <a href="<?php  echo base_url().'admin/About_association/delete_com/'.$row->id."/news/news"?>">
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
<script>
function lood_edit(num){
    if(num>0 && num != ''){
        var id = num;
        var dataString = 'photo_num=' + id ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/About_association/laod_pages',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#optionearea2").html(html);
            }
        });
        return false;
    }else{
       // $("#vid_num").val('');
        $("#optionearea2").html('');
    }
}



</script>