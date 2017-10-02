<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
          
           
           
      
                  <?php if(isset($result)):?>
                  
<div class="details-resorce">
<div class="col-xs-12 r-inner-details">

     <?php  echo form_open_multipart('Administrative_affairs/edit_administrative_affairs_setting/'.$result[0]->id)?>
<div class="col-xs-12 ">
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">


<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> إسم المجموعة  </h4>
</div>
<div class="col-xs-6 r-input">
<input type="text" class="r-inner-h4" value="<?php echo $result[0]->set_name ?>" name="set_name" required="required" />
</div>
</div>

<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> عدد الأذونات خلال الشهر </h4>
</div>

<div class="col-xs-3 r-input">
<input type="num" class="r-inner-h4" value="<?php echo $result[0]->ozon_num ?>" name="ozon_num" placeholder="إذن " required="required" />

</div>


<div class="col-xs-3 r-input">  
<input type="num" class="r-inner-h4" value="<?php echo $result[0]->ozon_num_extra ?>" name="ozon_num_extra" placeholder="إذن إستثنائي" required="required" />
</div>
</div>







<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> عدد الأجازات خلال العام  </h4>
</div>

<div class="col-xs-6 r-input">
<input type="num" class="r-inner-h4" name="holiday_num"  value="<?php echo $result[0]->holiday_num ?>"  placeholder="أجازات " required="required"/>

</div>



</div>


</div>

</div>


<div class="col-xs-12 r-inner-btn">
<div class="col-xs-3">
</div>
<div class="col-xs-3">
<input type="submit" role="button" name="edit" value="حفظ" class="btn pull-right">

</div>
<?php echo form_close()?>
<div class="col-xs-2">
</div>
</div>
</div>
</div>                  
                  
                  
                  
                    <?php else: ?>
      
<div class="details-resorce">
<div class="col-xs-12 r-inner-details">
<?php  echo form_open_multipart('Administrative_affairs/administrative_affairs_setting')?>
<div class="col-xs-12 ">
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">


<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> إسم المجموعة  </h4>
</div>
<div class="col-xs-6 r-input">
<input type="text" class="r-inner-h4"  name="set_name" required="required" />
</div>
</div>

<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> عدد الأذونات خلال الشهر </h4>
</div>

<div class="col-xs-3 r-input">
<input type="num" class="r-inner-h4" name="ozon_num" placeholder="إذن " required="required" />

</div>


<div class="col-xs-3 r-input">  
<input type="num" class="r-inner-h4" name="ozon_num_extra" placeholder="إذن إستثنائي" required="required" />
</div>
</div>







<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> عدد الأجازات خلال العام  </h4>
</div>

<div class="col-xs-6 r-input">
<input type="num" class="r-inner-h4" name="holiday_num" placeholder="أجازات " required="required"/>

</div>



</div>


</div>

</div>


<div class="col-xs-12 r-inner-btn">
<div class="col-xs-3">
</div>
<div class="col-xs-3">
<input type="submit" role="button" name="add" value="حفظ" class="btn pull-right">

</div>
<?php echo form_close()?>
<div class="col-xs-2">
</div>
</div>
</div>
</div>





            <!---table------>
                <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12 r-inner-details">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">إسم المجموعة</th>
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                   

                                    <?php
                                    $a=1;
                                    foreach ($records as $record ):?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td><? echo $record->set_name;?></td>
                                            <td> <a href="<?php echo base_url('Administrative_affairs/delete_administrative_affairs_setting').'/'.$record->id?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span>  <a href="<?php echo base_url('Administrative_affairs/edit_administrative_affairs_setting').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                        </tr>
                                        <?php
                                        $a++;
                                    endforeach;  ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php  endif; endif; ?>
<!---table------>







</div>
</div>