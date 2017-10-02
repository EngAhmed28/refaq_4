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
                                <th> تفاصيل</th>
                                                      
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
                         <td> <a href="<?php echo base_url().'Family/one_member_details/'.$mother_national_num."/".$row->id?>">  <i class="fa fa-search-plus" aria-hidden="true"></i> </a>   </td>
                             </tr>
                            <?php endforeach;?>
                          </tbody>
                          </table>
                   
                    
                     <?php endif;?>  
                           <!----------------------------------> 
                        </div>