

<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php 
            $data['news'] = 'active';
            $this->load->view('admin/public_relations/main_tabs',$data); ?>
    <?php   if(isset($result) && $result !=null):
    echo form_open_multipart('Public_relations/update_news/'.$result['id'],array('class'=>'form-horizontal'));   
    $out['title']=$result['title'];
    $out['content']=$result['content'];
    $out['news_category']=$result['news_category'];
    $out['date']=date("Y-m-d",$result['date']);
    $out['input']='  <button name="edit" value="edit" type="submit" class="btn btn-primary">تعديل</button>';
    else:
    echo form_open_multipart('Public_relations/add_news',array('class'=>'form-horizontal'));  
    $out['title']="";
    $out['content']="";
    $out['news_category']="";
    $out['date']="";
    $out['input']='<button name="add" value="add" type="submit" class="btn btn-primary">حفظ</button>';
    endif; ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                  
                    <div class="col-xs-12 ">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
       
  
      
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  تاريخ الخبر </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" value="<?php echo $out['date']?>" name="date" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                               <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  صور الخبر </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                  
                                         <input type="number" id="photo_num"  name="photo_num" min="0" max="5" onkeyup="return lood($('#photo_num').val());" class="r-inner-h4" placeholder="أقصى عدد 5" />
                                      
                                    
                                </div>
                            </div>
                               <div class="col-xs-12" id="optionearea1">
                       </div>
               
               
                  <?php if(isset($images) && $images!=null): ?>
                       
                          <table   id="no-more-tables" class="table table-bordered" role="table"   >
          <thead>      <tr>  <th class="text-right">م</th> 
                             <th class="text-right">الصورة </th>  
                             <th class="text-right"> الاجراء</th>
          </tr>  </thead>
               <tbody>
               <?php    $i=1;   foreach($images as $one_image): ?>  
              <tr>
              <td> <?php echo $i++?></td> 
              <td><img src="<?php echo base_url()."uploads/images/".$one_image->img?>" width="50px" height="50px" /></td>
              <td>  <a  href="<?php  echo base_url().'Public_relations/delete_photo/'.$one_image->id."/update_news/".$result['id']?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs ">
                           <i class="fa fa-trash"></i> حذف</a>
             </tr>
                <?php endforeach;?>
              </tbody>  </table>
                        
                        
                        
                      
                     <?php endif;?>
        
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                
                             <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">عنوان الخبر</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" name="title" value="<?php echo $out['title']?>">
                                </div>
                            </div>
                                            <div class="col-xs-12 " style="margin-bottom: 10px;">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  تفاصيل الخبر </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                              <textarea id="content"  name="content" class="r-textarea" ><?php  echo $out['content']; ?></textarea>
                                     
                                  
                                    </div>
                                </div>
                            </div>
                                           
                            
                            
                            
           
                        </div>

                        
                    </div>
                </div>


                <div class="col-xs-12 r-inner-btn">
                    <div class="col-xs-3">
                    </div>
                    <div class="col-xs-3">
                      <?php  echo $out['input']; ?>

                    </div>
                    <?php echo form_close()?>
                    <div class="col-xs-2">
                       
                    </div>
                </div>

            </div>
          
            <!---table------>
                <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12 r-inner-details">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">عنوان الخبر</th>
                                            <th class="text-center">تاريخ الخبر</th>
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                   

                                    <?php
                                    $a=1;
                                    foreach ($records as $record ):?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td><?php echo $record->title?></td>
                                            <td><?php echo date("Y-m-d",$record->date);?></td>
                                            <td> <a href="<?php  echo base_url().'Public_relations/delete_id/'.$record->id."/news/add_news"?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span>  <a href="<?php echo base_url().'Public_relations/update_news/'.$record->id?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                        </tr>
                                        <?php
                                        $a++;
                                    endforeach;  ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php  endif;  ?>
<!---table------>
        </div>
    </div>
</div>

   
        
          

<script>
    function lood(num){
        if(num>0 && num != '')
        {
            var id = num;
            var dataString = 'num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Public_relations/load',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
            return false;
        }
        else
        {
            $("#optionearea1").html('');
        }
    }
</script>
