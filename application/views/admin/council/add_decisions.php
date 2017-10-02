
<div class="col-sm-11 col-xs-12">
   <!--  -->
                    <?php $this->load->view('admin/council/main_tabs'); ?>
   <!--  -->
    <?php if(!isset($edit)):?>
    <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
            <div class="col-xs-12">
                <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12 ">
                        <div class="col-xs-5">
                            <h4 class="r-h4 ">  تاريخ الجلسة </h4>
                        </div>
                        <div class="col-xs-6 r-input ">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="text" class="form-control " name="session_date" readonly value="<? echo  date('Y-m-d',$data['session_date']);?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-5">
                            <h4 class="r-h4">عدد الحضور </h4>
                        </div>
                        <div class="col-xs-4 r-input">
                            <input type="number"  readonly   class="form-control text-right"   value="<?if(!empty($count_members[$data['council_id_fk']])): echo sizeof($count_members[$data['council_id_fk']]); endif;?>">
                        </div>

                    </div>
                </div>
                <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-5">
                            <h4 class="r-h4">عدد البنود </h4>
                        </div>
                        <div class="col-xs-4 r-input">
                            <input type="number"  readonly    class="form-control text-right"   value="<?if(!empty($count[$data['council_id_fk']])): echo sizeof($count[$data['council_id_fk']]); endif;?>">
                        </div>

                    </div>
                </div>
            </div>

        

         
                <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer" style="width: 50%;margin-right: 160px">
                    <h4 class="r-table-text text-left"> الحضور : </h4>
                    <thead><tr>
                        <th >م</th>
                        <th >إسم العضو</th>
                        <th >المسمي الوظيفي</th>
                    </tr></thead>
                    <tbody>
                     <?php if(!empty($all_members[$data['id']])):
                             $a=1;
                             foreach ($all_members[$data['id']] as $row):
                            ?>
                         <tr>
                             
                        <td><?php  echo $a ;?></td>
                        <td> <?php echo $get_job_title[$row->members_nums]->member_name?></td>
                        <td> <?php echo $job_title[$get_job_title[$row->members_nums]->job_title_id_fk]->name?></td>
                       </tr>
                        <?php  $a++;  endforeach; endif;?>
                    </tbody>
                </table>
        
        <?php echo form_open_multipart('admin/Directors/add_decisions/'.$data['council_id_fk'])?>
        <?php if(!empty($details)):   ?>
            <input type="hidden" name="max" value="<?php echo sizeof($details);?>"/>




     <!--   <div class="details-resorce">
            <div class="col-xs-12 r-inner-details">
                <div  class="col-xs-12" >  -->


            <?php  $g=1; foreach($details as $records):
           $type= $this->uri->segment(5);
                $value='';
                $readonly='readonly';
                if($type =='edit'){
                  $value=$records->decision_title;
                    $readonly='';
                }
                
                if($records->decision_title != "null") {
                 $value=$records->decision_title;  
                }
                
                
                ?>
           
                    <div class="col-md-2  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">رقم البند  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text" name="" class="form-control"    value="<?php echo  $records->item_num;?>"  readonly=""/>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-4">
                                <h4 class="r-h4">  البند  </h4>
                            </div>
                            <div class="col-xs-8 r-input">
                                <textarea class="r-textarea" name="" id="" <?php echo $readonly?> > <?php echo  $records->item_title; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-4">
                                <h4 class="r-h4">  القرار عليه  </h4>
                            </div>
                            <div class="col-xs-8 r-input">
                                <textarea class="r-textarea" name="decision_title_edit<?php echo $records->id;?>" id="decision_title_edit" > <?php echo$value; ?></textarea>
                            </div>
                        </div>
                    </div>
                     <input type="hidden" name="id<? echo $g; ?>" value="<? echo $records->id;?>"/> 
               <?php $g++; endforeach;endif;?>
         <!--       </div> 
            </div>
   </div> -->
      <!-------------------------------------------------------------------------->  
       </div>   
        <div class="col-xs-3">
        </div>
        <?php if($type =='edit'){ ?>
        <div class="col-xs-4">
            <input type="submit" class="btn center-block r-manage-btn2 "   name="edit" value="تعديل" />
        </div>
        <?php }else{?>
            <div class="col-xs-4">
                <input type="submit" class="btn center-block r-manage-btn2 "   name="add" value="حفظ" />
            </div>
        <?}?>
        <?php echo form_close()?>
        <?php endif;?>


        <script>
            function lood(num){
                if(num>0 && num != '')
                {
                    var id = num;
                    var val = 'edit' ;
                    var dataString = 'band_num='+ id + '&val='+ val;
                    $.ajax({
                        type:'post',
                        url: '<?php echo base_url() ?>/admin/Directors/add_decisions/<? echo $data['council_id_fk']?>',
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
                    $("#vid_num").val('');
                    $("#optionearea1").html('');
                }
            }
        </script>

