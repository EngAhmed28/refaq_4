
<style>
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
        text-align: center;
        vertical-align: middle;
    }
    table.table-depart{
        width: 100%;
    }
    table .thead-details th{
        background-color: #ece8e8;
        padding: 5px 0px;
        color: #000;
    }
    table .thead-depart th{
        background-color: #ece8e8;
        padding: 5px 0px;
        color: #840000;
    }
    table .thead-depart-middle th{
        background-color: #fff;
        padding: 5px 0px;
        color: #000;
    }
    table.table-depart tbody tr td{
        padding: 5px 0px;
    }
</style>

<div class="col-sm-11 col-xs-12">
    <!--  -->
     <?php   $this->load->view('admin/administrative_affairs/main_tabs'); ?>
    <!--  -->
    <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
            <!-------------------------------------------------------------------------------------------------------------------------->
            <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <table class="table-bordered table-striped table-depart">
                            <?php
                                foreach ($records as $row):?>
                            <thead class="thead-depart">
                            <th colspan="5"><?php echo $row->name;?></th>
                            </thead>
                                    <?php
                                    $query2 = $this->db->query('SELECT * FROM `department_jobs` WHERE `from_id_fk`=' . $row->id);
                                    $arr = array();
                                    foreach ($query2->result() as $row2) {
                                        $arr[] = $row2;
                                    }
                                    ?>
                                    <?php foreach ($arr as $record):
                                        ?>
                                        <thead class="thead-depart-middle">
                                        <th colspan="5"><?php echo $record->name;?></th>
                                        </thead>
                                        <?php
                                        $query3 = $this->db->query('SELECT * FROM `employees` WHERE `department`=' . $record->id);
                                        $arr2 = array();
                                        foreach ($query3->result() as $row3) {
                                            $arr2[] = $row3;
                                        }
                                        if(!empty($arr2)):?>
                                        <thead class="thead-details">
                                        <th>م</th>
                                        <th>إسم الموظف</th>
                                        <th>رقم الهوية </th>
                                        <th>رقم الهاتف</th>
                                        <th>العنوان</th>
                                        </thead>
                                        <tbody>
                                        <?php $count=0;foreach ($arr2  as $emp):$count++;?>
                                            <tr>
                                                <td><?php echo $count;?></td>
                                                <td><?php echo $emp->employee;?></td>
                                                <td><?php echo $emp->id_num;?></td>
                                                <td><?php echo $emp->phone_num;?></td>
                                                <td><?php echo $emp->address;?></td>
                                            </tr>
                                        <?php endforeach; endif;?>
                                    <?php endforeach;?>
                            <?php endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------------------------->
        </div>
    </div>
</div>
<!----------------->
