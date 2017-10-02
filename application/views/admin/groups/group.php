<?php if(isset($result_id) && !empty($result_id) && $result_id!=null ):
$out['form']='dashboard/UpdateGroupsPages/'.$result_id['page_id'];
$out['page_id']=$result_id["page_id"];
$out['page_title']=$result_id["page_title"];
$out['page_link']=$result_id["page_link"];
$out['page_order']=$result_id["page_order"];
$out['page_icon_code']=$result_id["page_icon_code"];
$out['page_image']=$result_id["page_image"];
$out['input']='<input type="submit" name="edit_groupe" value="تعديل" class="btn center-block" /> ';
else:
$out['form']='dashboard/GroupsPages';
$out['page_id']="";
$out['page_title']="";
$out['page_link']="#";
$out['page_order']="";
$out['page_icon_code']="";
$out['page_image']="";
$out['input']='<input type="submit" name="add_groupe" value="إضافة" class="btn center-block" />';
endif?>



<div class="col-sm-11 col-xs-12">
<div class="col-xs-12 r-side-table">
<div class="col-sm-9">
<h4> <span> <i class="fa fa-user-circle-o" aria-hidden="true"></i></span>إضافة مستخدم</h4>
</div>
<div class="col-sm-3">
<h5> <?php echo $_SESSION['user_username']?></h5>
<h5>   اخر دخول  : 27 / 5 / 2017</h5>
</div>
</div>

<?php echo form_open_multipart($out['form'])?>
<div class="details-resorce">
<div class="col-xs-12 r-inner-details">
<!-------------------------------------------------------------------------------------------------------------------------->
<div class="row">
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">إسم المجموعة</h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="text" name="page_title" value="<?php echo $out['page_title']; ?>" class="form-control col-xs-6"  required="required"/>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">ترتيب المجموعة</h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="number" name="page_order" value="<?php echo $out['page_order']; ?>" class="form-control col-xs-6"  required="required"/>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">لوجو المجموعة</h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="file" name="page_image" value="" class="form-control col-xs-6"  />
        </div>
    </div>




</div>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">رابط المجموعة</h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="text" name="page_link" value="<?php echo $out['page_link']; ?>" class="form-control col-xs-6"  required="required"/>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">إختر أيقونة</h4>
        </div>
        <div class="col-xs-6 r-input">
            <select style="font-family: 'FontAwesome', Helvetica;" id="page_icon_code" name="page_icon_code" class="form-control">
                <option value=""> إختر أيقونة  </option>
                <?php foreach ($font_icon as $icone):
                    $select=""; if(isset($result_id) ){
                    $ceck=explode("fa ",$out['page_icon_code']);
                    if($icone->name ==$ceck[1]  ){$select='selected="selected"';}
                } ?>
                    <option value="fa <?php echo $icone->name?>" <?php echo $select?> > <?php echo $icone->name ?> <?php echo $icone->code_name?> </option>
                <?php endforeach;?>
            </select>


        </div>
    </div>

    <?php if(isset($out['page_image']) && !empty($out['page_image']) && $out['page_image']!=null ): ?>
    <div class="col-xs-12">
        <div class="col-xs-6">
            <img src="<?php echo base_url()."uploads/images/".$out['page_image']?>"  style="width: 300px;height: 300px"/>
        </div>
    </div>
   <?php endif; ?>
</div>
</div>


<div class="row">
    <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
        <?php echo $out['input']?>
    </div>
    <div class="col-md-4 col-sm-3 col-xs-6 inner-details-btn"></div>
</div>
<?php echo form_close()?>

<!-------------------------------------------------------------------------------------------------------------------------->





<?php if(isset($groups_table ) && $groups_table!=null && !empty($groups_table)):?>
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <caption class="text-right text-success"></caption>
            <thead>
            <tr>
                <th width="">#</th>
                <th width="" class="">العنوان</th>
                <th width="" class="">الرابط</th>
                <th width="" class="">الترتيب</th>
                <th width="" class="">الايقونة</th>
                <th> لوجو المجموعة</th>
                <th width="" class="">التحكم</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $x = 0;
            foreach($groups_table as $group):
                $x++;
                ?>
                <tr>
                    <td data-title="#"><span class="badge"><?php echo $x?></span></td>
                    <td data-title="العنوان"> <?php echo $group->page_title?> </td>
                    <td data-title="الرابط"><?php echo $group->page_link?></td>
                    <td data-title="الترتيب"><?php echo $group->page_order?></td>
                    <td data-title="الايقونة" ><i class="<?php echo $group->page_icon_code.' fa-2x'?>"></i></td>

                 <?php if(!empty($group->page_image)  && $group->page_image !="0"){
                     $image= '<img src="'.base_url().'uploads/images/'.$group->page_image.'" style="width: 100px;height: 70px">';
                 }else{ $image="لم يتم الاضافة "; }
                 ?>

                  <td><?php echo $image ?> </td>

                    <td data-title="التحكم" class="text-center">
                        <a href="<?php echo base_url().'dashboard/UpdateGroupsPages/'.$group->page_id?>" class="btn btn-warning btn-xs "><i class="fa fa-pencil"></i> تعديل</a>
                    <!--    <a  href="<?php echo base_url().'dashboard/DeleteGroupsPages/'.$group->page_id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs "><i class="fa fa-trash"></i> حذف</a>
                     --> </td>
                </tr>
            <?php endforeach ;?>
            </tbody>
        </table>
    <?php endif;?>
</div>
</div>
</div>



