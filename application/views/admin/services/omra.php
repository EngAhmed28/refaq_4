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
                            <h4 class="r-h4"> الاسم  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="hij_family_id_fk">
                                <option> - اختر - </option>
                                <? if(!empty($get_mother[$_POST['mother_national_id_fk']])):?>
                                    <option value="<? echo $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk; ?>"><? echo $get_mother[$_POST['mother_national_id_fk']]->m_first_name; ?></option>
                                <? endif;?>
                                <? if (!empty($get_family_members[$_POST['mother_national_id_fk']])):
                                    foreach ($get_family_members[$_POST['mother_national_id_fk']] as $member):?>
                                        <option value="<? echo $member->id; ?>"><? echo $member->member_name; ?></option>
                                    <? endforeach; endif;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> اسم المحرم  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " name="muhrem_hij_name">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  العمرة لاول مرة  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="first_hij">
                                <option> - اختر - </option>
                                <option value="1"> نعم </option>
                                <option value="2"> لا </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> العلاقة </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " name="relationship">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> تاريخ الميلاد  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="text" class="form-control docs-date" name="birth_date" placeholder="شهر / يوم / سنة ">
                                </div>
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

</div>

<!--------------------------------------------------->

