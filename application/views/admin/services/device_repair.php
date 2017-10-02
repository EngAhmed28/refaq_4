<div class="col-sm-11 col-xs-12">
    <!--  -->
    <?php $this->load->view('admin/family/main_tabs'); ?>
    <!--  -->
    <div class="details-resorce">
        <?php $this->load->view('admin/services/serv_tabs');?>
        <div class="col-xs-12 r-inner-details">
            <?
            $sub_service='';
            $main_service='';
            $mother_national_id_fk='';
            if(!empty($_POST['sub_service'])):
                $sub_service = $_POST['sub_service'];
            endif;
            if(!empty($_POST['main_service'])):
                $main_service = $_POST['main_service'];
            endif;
            if(!empty($_POST['mother_national_id_fk'])):
                $mother_national_id_fk = $_POST['mother_national_id_fk'];
            endif;
            ?>
            <?php  echo form_open('Family/insert_services/'.$mother_national_id_fk.'/'.$main_service.'/'.$sub_service)?>
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> نوع  الجهاز  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="repair_device_id_fk">
                                <option> - اختر - </option>
                                <?foreach ($devices as$device):?>
                                    <option value="<? echo $device->id;?>"><? echo $device->title;?> </option>
                                <? endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6">
                            <h4 class="r-h4">   ملاحظات  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <textarea class="r-textarea" name="repair_device_note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> العدد    </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " name="repair_device_number">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> صوره  الجهاز</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="field">
                                <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                <input type="file" name="repair_device_img" class="file_input_with_replacement">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-xs-12 r-inner-btn r-new-button">
                <div class="col-xs-3" style="margin-right: 250px">
                    <input type="submit" role="button" name="add" class="btn pull-right"  value="حفظ">
                </div>
                <?php  echo form_close()?>
                <div class="col-xs-6">
                    <a href="<?php echo base_url()?>family/family_services"><button class="btn pull-left" > عودة </button></a>
                    </div>
            </div>



</div>

<!--------------------------------------------------->

