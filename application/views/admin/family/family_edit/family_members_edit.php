
            <div class="col-sm-11 col-xs-12">
                <!--  -->
                	<?php $this->load->view('admin/family/main_tabs'); ?>
                <!--  -->
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                      <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li><a href="<?php echo  base_url()."Family/basic/".$mother_national_num;?>"> البيانات الأساسية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_father/".$mother_national_num;?>"> بيانات الأب </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_mother/".$mother_national_num;?>">البيانات الزوجة </a></li>
                            <li class="active"><a href="<?php echo  base_url()."Family/update_family_members/".$mother_national_num;?>">أفراد الأسرة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_house/".$mother_national_num;?>">بيانات السكن</a></li>
                            <li><a href="<?php echo  base_url()."Family/update_money/".$mother_national_num;?>"> البيانات المالية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_devices/".$mother_national_num;?>">  الأجهزة المنزلية</a></li>
                     	  <li><a href="<?php echo  base_url()."Family/researcher_opinion/".$mother_national_num;?>"> رأى الباحث الاجتماعى</a></li>
           
                        </ul>
                    </div>
                        <div class="tab-content">
                           <!---------------------------------->
             <?php if(isset($member_data) && $member_data!=null): ?>
                          <table style="width:100%">
                          <header>
                            <tr>
                                <th>م </th>
                                <th>الإسم</th>
                                <th> إسم الام</th>
                                <th>رقم الهوية</th>
                                <th>الجنس </th>
                                <th>العمر</th>
                                <th>المهنة </th>
                              
                                <th> تعديل</th>
                                <th> حذف </th>                                
                            </tr>
                          </header>
                          <tbody>
          
           <?php  $x=1; foreach($member_data as $row):?>   
                          <tr>
                             <td><?php echo $x++; ?></td>
                            <td><?php echo $row->member_name;  ?></td>  
                            <td><?php echo $mothers_data[$mother_national_num]->m_first_name; ?></td>
                             <td><?php echo $row->member_card_num; ?></td>
                             <td><?php if($row->member_gender ==1){echo 'ذكر';}else{echo 'انثى'; } ?></td>
                             <td>
                                 <?php  $barth=$row->member_birth_date;$today=time();
                                  $age=$today-$barth;
                                  $age=$age /(60*60 * 24 * 360 );
                                  $age=(int) $age;
                                  echo $age." عام";?>
                             </td>
                             <td>
                                 <?php $job_titles_arr=array('اختر','طالب','مزظف حكومة','موظف قطاع  خاص','لا يعمل','أعمال حرة','دون  سن الدراسة');
                                     echo $job_titles_arr[$row->member_job];  ?>
                             </td>
                         
                             <td> <a href="<?php echo base_url().'Family/update_one_member/'.$row->id."/".$row->mother_national_num_fk?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>  </td>
                             <td> <a href="<?php echo base_url().'Family/delete_member/'.$row->id."/".$row->mother_national_num_fk?>"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
                          </tr>
                            <?php endforeach;?>
                          </tbody>
                          </table>
                   
                     <?php else:?>
                     <div class="alert alert-danger" >
                        لايوجد ابناء لهذة الام
                           </div>
                     <?php endif;?>  
                           <!----------------------------------> 
                        </div>
                    </div>
                    <!--3 -->
                    <div class="col-xs-12 r-inner-btn">
                       
                         <div class="col-md-3"></div>
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                          <a href="<?php echo  base_url()."Family/update_mother/".$mother_national_num;?>">
                              <button type="button" class="btn btn-info">عودة</button> </a>  
                        </div>
                         <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                           <a href="<?php echo  base_url()."Family/add_member/".$mother_national_num;?>">
                           <button class="btn center-block">إضافة  فرد</button> </a> 
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                    <a href="<?php echo  base_url()."Family/update_house/".$mother_national_num;?>">
                           <button class="btn center-block">التالى</button> </a>
                        </div>
                      
                      
                    </div>
                    <!--3 -->
                </div>
            </div>
       