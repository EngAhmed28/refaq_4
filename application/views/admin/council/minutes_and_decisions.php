
<div class="col-sm-11 col-xs-12">
<!--  -->
<?php $this->load->view('admin/council/main_tabs'); ?>
<!--  -->
<!---table------>
<?php if(isset($records)):?>
<div class="col-xs-12">
<div class="panel-body">

    <div class="fade in active">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center">م</th>
                    <th class="text-center">تاريخ الجلسة</th>
                    <th class="text-center">بنود الجلسة </th>
                    <th class="text-center">الحضور</th>
                    <th class="text-center">القرارات</th>
                    <th class="text-center">الاجراء</th>
                </tr>
            </thead>
            <tbody class="text-center">
            <?php if(isset($records)&&$records!=null):?>

            <?php
            $a=1;
            foreach ($records as $record ):?>
<tr>
<td><?php echo $a ?></td>
<td><?php echo date('d-m-Y',$record->session_date) ?></td>
<td><a href="<?php echo base_url().'admin/Directors/items_decisions/'.$record->id.'/minutes_and_decisions'?>"><button type="button" class="btn btn-info btn-md"  ><i class="fa fa-list"></i> عرض </button></a></td>
<td>
<!----------------------------------------------------------------->
<button type="button" class="btn center-block button" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > عرض</button>
<div class="modal fade modal-style modal-bg-table-style" style="height: 500px; padding: 0" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-bg-table-1" id="printablediv<?php echo $record->id ?>" >
    <div id="modal-table-1"  class="center-block">
        <div class="details-resorce" >
            <div class="col-xs-12 r-inner-details" style="margin-top: 150px">
                <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer">
                            <h4 class="r-table-text text-left"> التوقيعات : </h4>
                            <thead><tr>
                                <th style="color:#0c72ca; ">م</th>
                                <th style="color:#0c72ca; ">إسم العضو</th>
                                <th style="color:#0c72ca; ">المسمي الوظيفي</th>
                            </tr></thead>
                            <tbody>
                        <?php if(!empty($all_members[$record->id])):
                             $a=1;
                             foreach ($all_members[$record->id] as $row):
                            ?>
                         <tr>
                             
                        <td><?php  echo $a ;?></td>
                        <td> <?php echo $get_job_title[$row->members_nums]->member_name?></td>
                        <td> <?php echo $job_title[$get_job_title[$row->members_nums]->job_title_id_fk]->name?></td>
                       </tr>
                        <?php  $a++;  endforeach; endif;?>
                        </tbody>
                        </table>
                    </div>
        </div>
    </div>
</div>
</div>
<!----------------------------------------------------------------->

</td>
                    <td><a href="<?php echo base_url().'admin/Directors/add_decisions/'.$record->id?>"><button type="button" class="btn center-block button "> إضافة</button></a></td>
                    <td> <a href="<?php echo base_url().'admin/Directors/delete_decision/'.$record->id?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
            </span>  <a href="<?php echo base_url().'admin/Directors/add_decisions/'.$record->id.'/edit' ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                </tr>
                <?php
                $a++;
            endforeach;  ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<?php endif; ?>

</div>
</div>

<script>
function lood(num){
if(num>0 && num != '')
{
var id = num;
var dataString = 'band_num=' + id ;
$.ajax({
    type:'post',
    url: '<?php echo base_url() ?>/admin/Directors/add_time_table',
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
