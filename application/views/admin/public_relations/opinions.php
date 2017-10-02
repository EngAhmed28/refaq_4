

<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php 
            $data['opinion'] = 'active';
            $this->load->view('admin/public_relations/main_tabs',$data); ?>
    <?php   if(isset($result) && $result !=null):
    echo form_open_multipart('Public_relations/update_opinion/'.$result['id'],array('class'=>'form-horizontal'));   
    $out['title']=$result['title'];
    $out['content']=$result['content'];
    $out['img']=$result['img'];
    $out['job']=$result['job'];
    $out['input']='  <button name="edit" value="edit" type="submit" class="btn btn-primary">تعديل</button>';
    else:
    echo form_open_multipart('Public_relations/add_opinion',array('class'=>'form-horizontal'));  
    $out['title']="";
    $out['content']="";
    $out['job']="";
    $out['img']='';
    $out['input']='<button name="add" value="add" type="submit" class="btn btn-primary">حفظ</button>';
    endif; ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12 ">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
       
  
      
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  الإسم </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                   
                                            <input type="text" class="form-control " value="<?php echo $out['title']?>" name="title">
                                        </div>
                                   
                                </div>
                            </div>
                            
                               <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  صورة </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                  
                                         <input type="file" id="img"  name="img" min="0" max="5"  class="form-control text-right"  />
                                      
                                    
                                </div>
                            </div>
                      <?php if($out['img'] != ''){ ?>      
               <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    
                                </div>
                                <div class="col-xs-6 r-input ">
                                  
                                         <img src="<?php echo base_url()."uploads/images/".$out['img']?>" width="150px" height="150px" />
                                      
                                    
                                </div>
                            </div>
        <?php } ?>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                
                             <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">الوظيفة</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" name="job" value="<?php echo $out['job']; ?>">
                                </div>
                            </div>
                                            <div class="col-xs-12 " style="margin-bottom: 10px;">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  النص </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                              <textarea id="content"  name="content" class="r-textarea"  ><?php  echo $out['content']; ?></textarea>
                                     
                                  
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
                                            <th class="text-center">الإسم</th>
                                            <th class="text-center">الوظيفة</th>
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
                                            <td><?php echo $record->job;?></td>
                                            <td> <a href="<?php  echo base_url().'Public_relations/delete_id/'.$record->id."/opinions/add_opinion"?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span>  <a href="<?php echo base_url().'Public_relations/update_opinion/'.$record->id?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
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

   
        
          


