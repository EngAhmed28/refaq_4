<div class="col-sm-11 col-xs-12">
    <!--  -->
    <?php $this->load->view('admin/family/main_tabs'); ?>
    <!--  -->
    <div class="details-resorce">
        <?php $this->load->view('admin/services/serv_tabs'); ?>
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
                            <h4 class="r-h4">  رقم الفاتورة  </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <input type="text" class="r-inner-h4 " name="fatora_num">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> تاريخ الفاتورة  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="text" class="form-control docs-date" name="fatora_date" placeholder="شهر / يوم / سنة ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  مبلغ الفاتورة  </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <input type="text" class="r-inner-h4 " name="fatora_cost">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> تاريخ سند الدفع  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="text" class="form-control docs-date" name="fatora_sanad_daf3_date" placeholder="شهر / يوم / سنة ">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xs-12 r-top">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> صورة  الفاتورة </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="field">
                                <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                <input type="file" name="fatora_img" class="file_input_with_replacement">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
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

