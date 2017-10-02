

<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data['about_us'] = 'active'; 
             $this->load->view('admin/public_relations/main_tabs',$data); ?>

             <?php //if(sizeof($all_table) < 5):?>
             
             
     <?php if(isset($result) && $result !=null):
    echo form_open_multipart('Public_relations/update_about_us/'.$result['id'],array('class'=>'form-horizontal'));   
    $out['type']=$result['type'];
    $out['content']=$result['content'];
    $out['input']='  <button name="edit" value="edit" type="submit" class="btn btn-primary">تعديل</button>';
    $disabled="disabled=''";
    else:
    echo form_open_multipart('Public_relations/about_us',array('class'=>'form-horizontal'));  
     $disabled="";
     $out['type']='';
     $out['content']='';
     $out['input']='<button name="add" value="add" type="submit" class="btn btn-primary">حفظ</button>';
    endif; ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                  
                    <div class="col-xs-12 ">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
     
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع المقطع </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                 <?php $arr_types=array("من نحن","أهدافنا","رسالتنا","رؤيتنا","قيمنا",'الفكر','السلوك','الحيادية','عدم التمييز') ?>  
               <?php if(isset($result) && $result !=null): ?> 
                <input type="text" value="<?php echo $arr_types[$out['type']]?>" name="" class="form-control" readonly="" />
                  </div>
                            </div>
        
   
                        </div>
                        
                    </div>
                <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
  
                			<div class="col-xs-12">
								<div class="col-xs-3">
									<h4 class="r-h4"> تفاصيل المقطع </h4>
								</div>
								<div class="col-xs-9 r-input">
								      <textarea id="content"  name="content" class="r-textarea" required ><?php  echo $out['content']; ?></textarea>
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
              <?php else:?>
               <select name="type" class="no-padding form-control" required>
               <option value="">--قم بالإختيار--</option>
                <?php for($x=0;$x<sizeof($arr_types);$x++):
                   if(isset($select_in) && $select_in!=null){
                       if(in_array($x,$select_in)){continue;}}?>
                <option value="<?php echo $x?>"  > <?php echo $arr_types[$x];?></option>
                <?php endfor;?>
               </select>
                                </div>
                            </div>
        
   
                        </div>
                        
                    </div>
                    
                    <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
  
                			<div class="col-xs-12">
								<div class="col-xs-3">
									<h4 class="r-h4"> تفاصيل المقطع </h4>
								</div>
								<div class="col-xs-9 r-input">
								      <textarea id="content"  name="content" class="r-textarea" required ><?php  echo $out['content']; ?></textarea>
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
            <?php endif?>
                 <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                             <th class="text-center">عنوان المقطع</th>
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                  

                                    <?php
                                    $a=1;
                                    foreach ($records as $row ):?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                         <td><?php echo $row->title?></td>
                                            <td> <a href="<?php  echo base_url().'Public_relations/delete_id/'.$row->id."/about/about_us"?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span>  <a href="<?php echo base_url().'Public_relations/update_about_us/'.$row->id?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                        </tr>
               
                                        <?php
                                        $a++;
                                    endforeach;  ?>
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php  endif; //endif; ?>
<!---table------>
        </div>
    </div>
</div>

   
        
          
