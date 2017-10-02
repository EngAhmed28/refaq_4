<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/general_assembly/main_tabs'); ?>

            <div class="details-resorce">

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












