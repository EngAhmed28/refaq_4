
            <div class="col-sm-11 col-xs-12">
              <!--main tabs -->
              	<?php $this->load->view('admin/family/main_tabs'); ?>
         
                <!--main tabs -->
               <!------------------------------------------------------------------------------------------>   
        <?php if(isset($all_family) && $all_family !=null):?>   
           
                   <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">الاسم</th>
                                        <th class="text-center">رقم الطلب </th>
                                        <th class="text-center">رقم الهوية</th>
                                        <th class="text-center">عرض</th>
                                        <th class="text-center">تعديل</th>
                                        <th class="text-center last-th">حاله الاسرة </th>
                                        <th class="text-center"> حذف </th>
                                    </tr>
                                </thead>
   
                                <tbody class="text-center">
   <!-------------->
   <?php $x=1; foreach($all_family as $row):?>
                <tr>
                    <td><?php echo $x++;?></td>
                    <td><?php echo $row->m_first_name." ".$row->m_father_name." ".$row->m_grandfather_name." ".$row->m_family_name ?></td>
                    <td><?php echo $row->id;?></td>
                    <td><?php echo $row->mother_national_num?></td>
                    <td><a href="<?php echo base_url().'Family/family_details/'.$row->mother_national_num ?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                    <td><a href="<?php echo base_url().'Family/basic/'.$row->mother_national_num ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    <td>
                    <?php if(isset($last_state[$row->mother_national_num]) && $last_state[$row->mother_national_num]!=null):
                         $process=$last_state[$row->mother_national_num]->process;
                         $file_in=$last_state[$row->mother_national_num]->family_file_to;
                              if($process ==1){
                                  echo ' قبول الملف عند'.$jobs_name[$file_in]->name;
                              }elseif($process ==2){
                                  echo 'رفض الملف عند'.$jobs_name[$file_in]->name;
                              }elseif($process ==3){
                                   echo 'للإطلاع عند'.$jobs_name[$file_in]->name;
                              }elseif($process ==4){
                                     echo 'اعتماد الملف عند'.$jobs_name[$file_in]->name;
                              }?>
                  <?php   else: echo "لم يتم إتخاذ أى إجراء"; endif;?>
                     </td>
                    <td>
                                       
                                       
                                       
<i class="fa fa-trash button" aria-hidden="true"></i>
<div class="modal-bg-delet">
    <div id="modal-delet">
        
        <h5>هل  انت متاكد  من حذف هذا العنصر ؟</h5>
        <div class="col-xs-6">
            <button class="btn  center-block" type="submit">حذف </button>
        </div>
        <div class="col-xs-6">
            <button class="btn  center-block" type="submit"> <a href="#close" id="close">&#215;</a> </button>
        </div>
    </div>
</div>
                                        </td>
                                    </tr>
   <?php endforeach;?>                                 
     <!----------------------->                            
                                </tbody>
                            </table>
                        </div>
                    </div> 
    
    <?php else:?>
    <div class="alert alert-danger" >
      <div class="col-sm-11 col-xs-12">
      لا يوجد اسر جديدة
                </div>
        </div>
    <?php endif;?>           
              <!------------------------------------------------------------------------------------------->    
                
            </div>

       