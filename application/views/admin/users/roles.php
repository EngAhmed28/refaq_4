<?php  $this->load->view('admin/requires/header');
       $this->load->view('admin/requires/sidebar'); ?>


<style>
    ul {
        list-style: none;
        padding-right: 20px;
    }

    .treeview li>input {
        height: 16px;
        width: 16px;
    }

</style>

<?php if(isset($user_data)):
    $out['form']='dashboard/UpdateCreateRole/'.$user_data['user_id'];
    $out['user_id']=$user_data["user_id"];
    $out['DES']='disabled="disabled"';//user_permations
    $user_per=$user_permations;
    $out['hidden']=' <input type="hidden" name="user_id" value="'.$user_data['user_id'].'">';
    $out['input']='<input type="submit" name="edit_role" value="تعديل" class="btn center-block" />';
else:
    $out['form']='dashboard/CreateRole';
    $out['user_id']="";
    $out['DES']='';
    $out['hidden']='';
    $user_per=array(0);
    $out['input']='<input type="submit" name="add_role" value="حفظ" class="btn center-block" />';
endif;?>

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
                            <select name="user_id" class="form-control"  <?php echo $out['DES'];?> required="required" >
                                <?php foreach ($users as $user) {
                                    $select="";   if(isset($user_data)){
                                        if($user->user_id ==  $out['user_id'] ){$select='selected="selected"';}
                                    }
                                    if(isset($user_in)){
                                        if(in_array( $user->user_id,$user_in )) {continue;}
                                    }
                                    ?>
                                    <option value="<?php echo $user->user_id?>"  <?php echo $select?>  > <?php echo $user->user_username?></option>
                                <?php }?>
                                <?php  echo $out['hidden'];?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php    foreach ($results_main as $main_row):
                    $main_checked="";  if(in_array($main_row->page_id ,$user_per)){ $main_checked='checked="checked"';}
                    ?>
                    <div class=" col-md-3  pull-right">
                        <div class="panel panel-success ">
                            <div class="panel-heading">
                                <h3 class="panel-title">		<?php  echo  $main_row->page_title?> </h3>
                            </div>
                            <div class="panel-body">
                                <div id="page-wrap">
                                    <ul class="treeview">
                                        <li>
                                            <input type="checkbox" name="select-all[]" value="<?php  echo  $main_row->page_id."-".$main_row->level?>" <?php  echo  $main_checked?> >
                                            <label for="tall" class="custom-unchecked"><?php echo  $main_row->page_title?> </label>
                                            <?php if(sizeof($main_row->sub) >0){?>
                                                <ul>
                                                    <?php foreach ($main_row->sub as $sub_row ){
                                                        $sub_checked="";  if(in_array($sub_row->page_id ,$user_per)){ $sub_checked='checked="checked"';}    ?>
                                                        <li>
                                                            <input type="checkbox" name="select-all[]" value="<?php echo $sub_row->page_id."-".$sub_row->level?>" <?php  echo  $sub_checked?> >
                                                            <label for="tall-2" class="custom-unchecked"><?php echo  $sub_row->page_title?></label>
                                                            <?php if(sizeof($sub_row->sub) >0){ ?>
                                                                <ul>
                                                                    <?php foreach ($sub_row->sub as $sub_sub_row ){
                                                                        $sub_sub_checked="";  if(in_array($sub_row->page_id ,$user_per)){ $sub_sub_checked='checked="checked"';}         ?>
                                                                        <li>
                                                                            <input type="checkbox"name="select-all[]" value="<?php echo $sub_sub_row->page_id."-".$sub_sub_row->level?>" <?php  echo  $sub_sub_checked?> >
                                                                            <label for="tall-2-1" class="custom-unchecked" ><?php echo  $sub_sub_row->page_title?></label>
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php } ?>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <!-------------------------------------------------------------------------------------------------------------->


            <?php echo form_close()?>



        </div>
    </div>
</div>


<?php  $this->load->view('admin/requires/footer'); ?>

<script>
    $(function() {

        $('input[type="checkbox"]').change(checkboxChanged);

        function checkboxChanged() {
            var $this = $(this),
                checked = $this.prop("checked"),
                container = $this.parent(),
                siblings = container.siblings();

            container.find('input[type="checkbox"]')
                .prop({
                    indeterminate: false,
                    checked: checked
                })
                .siblings('label')
                .removeClass('custom-checked custom-unchecked custom-indeterminate')
                .addClass(checked ? 'custom-checked' : 'custom-unchecked');

            checkSiblings(container, checked);
        }

        function checkSiblings($el, checked) {
            var parent = $el.parent().parent(),
                all = true,
                indeterminate = false;

            $el.siblings().each(function() {
                return all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
            });

            if (all && checked) {
                parent.children('input[type="checkbox"]')
                    .prop({
                        indeterminate: false,
                        checked: checked
                    })
                    .siblings('label')
                    .removeClass('custom-checked custom-unchecked custom-indeterminate')
                    .addClass(checked ? 'custom-checked' : 'custom-unchecked');

                checkSiblings(parent, checked);
            } else if (all && !checked) {
                indeterminate = parent.find('input[type="checkbox"]:checked').length > 0;

                parent.children('input[type="checkbox"]')
                    .prop("checked", checked)
                    .prop("indeterminate", indeterminate)
                    .siblings('label')
                    .removeClass('custom-checked custom-unchecked custom-indeterminate')
                    .addClass(indeterminate ? 'custom-indeterminate' : (checked ? 'custom-checked' : 'custom-unchecked'));

                checkSiblings(parent, checked);
            } else {
                $el.parents("li").children('input[type="checkbox"]')
                    .prop({
                        indeterminate:false ,
                        checked: true
                    })
                    .siblings('label')
                    .removeClass('custom-checked custom-unchecked custom-indeterminate')
                    .addClass('custom-indeterminate');
            }
        }
    });

</script>