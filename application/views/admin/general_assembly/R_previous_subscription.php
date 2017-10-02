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
                            <th >عدد الإشتراكات</th>
                            <th >القيمة</th>
                        </tr></thead>
                        <tbody>
                      <?php  $serial = 0;
                      $total=0;
                        foreach($records as $record):
                            $serial++; ?>
                                <tr>
                                    <td><?php echo $serial;?></td>
                                  <td><?php
                                      if (!empty($name[$record->member_id])):
                                          echo $name[$record->member_id][0]->name;
                                      endif;
                                      ?></td>
                                  <td><?php
                                      if (!empty($count[$record->member_id])):
                                          echo sizeof($count[$record->member_id]);
                                      endif;
                                      ?></td>
                            <td><?php if (!empty($count[$record->member_id])):
                                $total=0;
                                foreach ($count[$record->member_id]  as  $row):
                                    $total +=$row->value;
                               endforeach;
                                echo $total;
                            endif;?></td>
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
