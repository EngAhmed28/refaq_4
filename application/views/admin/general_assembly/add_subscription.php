<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/general_assembly/main_tabs'); ?>

            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('General_assembly/add_subscription')?>
                    <div class="col-xs-12">
                        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> التاريخ  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" name="date" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> إسم العضو </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="member_id" id="member_id" class="form-control">
                                        <option value="إختر العضو"></option>
                                        <?php if (!empty($members)):
                                            foreach ($members  as  $member):?>
                                                <option value="<?php echo $member->id;?>"> <?php echo $member->name;?></option>
                                         <?  endforeach;
                                        endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">قيمة الإشتراك </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" id="value" name="value" class="form-control" required>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 ">

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 r-inner-btn">
                    <div class="col-xs-3">
                    </div>
                    <div class="col-xs-3">
                        <input type="submit" role="button" name="save" value="حفظ" class="btn pull-right">
                    </div>
                    <?php echo form_close()?>
                    <div class="col-xs-2">
                        <button class="btn pull-left" > عودة </button>
                    </div>
                    <div class="col-xs-7"></div>
                </div>
                <div class="col-sm-12 col-xs-12 r-inner-details">
                  <?php if(!empty($records)):?>
                    <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer" style="width: 70%;margin-right: 160px">
                        <thead><tr>
                            <th >م</th>
                            <th >إسم العضو</th>
                            <th >تاريخ الإشتراك</th>
                            <th >قيمة الإشتراك</th>
                            <th >الإجراء</th>
                        </tr></thead>
                        <tbody>
                      <?php  $serial = 0;
                        foreach($records as $record):
                            $serial++; ?>
                        <tr>
                            <td><?php echo $serial ?></td>
                                  <td><?php
                                      if (!empty($name[$record->member_id])):
                                          echo $name[$record->member_id][0]->name;
                                      endif;
                                      ?></td>
                                  <td><?php echo date('Y-m-d',$record->date);?></td>
                            <td><?php echo $record->value;?></td>
                            <td> <a href="<?php echo base_url('General_assembly/delete_subscription').'/'.$record->id ?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span></td>
                        </tr>
                    <?php endforeach ;?>
                        </tbody>
                    </table>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>












