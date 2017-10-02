<div class="col-sm-11 col-xs-12">
    <div class="col-xs-12 r-side-table">
        <div class="col-sm-9">
            <h4> <span> <i class="fa fa-user-circle-o" aria-hidden="true"></i></span> إضافة مستخدم</h4>
        </div>
        <div class="col-sm-3">
            <h5> <?php echo $_SESSION['user_username']?> </h5>
            <h5> اخر دخول : <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
        </div>
    </div>
    
    <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
            <?php 
            $roll = array('مدير على النظام'=>1,'رئيس قسم'=>2,'موظف'=>3);
            if(isset($result)){
                $id = $result['user_id'];
                $required = '';
            }
            else{
                $id = 0;
                $required = 'required';
            }
            echo form_open_multipart('User/add_user/'.$id.'',array('class'=>"myform"));
            ?>
            <div class="col-xs-12">
    
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-3 col-xs-4">
                            <h4 class="r-h4 text-center"> إسم العضو </h4>
                        </div>
                        <div class="col-sm-9 col-xs-8 r-input">
                            <input type="text" class="r-inner-h4" onblur="return check_username($('#user_name').val());" id="user_name" name="user_name" placeholder="إسم العضو" value="<?php if(isset($result)) echo $result['user_name'] ?>" autocomplete="off" required>
                        </div>
                    </div>
    
                    <div class="col-xs-12">
                        <div class="col-sm-3 col-xs-4">
                            <h4 class="r-h4 text-center"> كلمه المرور </h4>
                        </div>
                        <div class="col-sm-9 col-xs-8 r-input">
                            <input type="password" class="r-inner-h4 " name="user_pass" onkeyup="return check_pass($('#user_pass').val(),$('#user_pass_validate').val())" id="user_pass" placeholder=" كلمه المرور " autocomplete="off" value="" <?php $required ?>>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-sm-3 col-xs-4">
                            <h4 class="r-h4 text-center"> البريد الالكتروني </h4>
                        </div>
                        <div class="col-sm-9 col-xs-8 r-input">
                            <input type="email" class="r-inner-h4 " name="user_email" placeholder=" البريد الالكتروني " value="<?php if(isset($result)) echo $result['user_email'] ?>" required>
                        </div>
                    </div>
    
                    <div class="col-xs-12">
                        <div class="col-sm-3 col-xs-4">
                            <h4 class="r-h4 text-center"> الدور الوظيفي </h4>
                        </div>
                        <div class="col-sm-9 col-xs-8 r-input">
                            <select name="role_id_fk" id="role_id_fk" onchange="return load_dep($('#role_id_fk').val(),<?php echo $id ?>);" required>
                                <option value="">--قم بإختيار الدور الوظيفي--</option>
                                <?php
                                foreach ($roll as $key => $value) {
                                    $select = '';
                                    if (isset($result) && $value == $result['role_id_fk'])
                                        $select = 'selected';
                                    echo'<option value="'.$value.'" '.$select.'>'.$key.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="col-sm-3 col-xs-4">
                            <h4 class="r-h4 text-center"> القسم </h4>
                        </div>
                        <div class="col-sm-9 col-xs-8 r-input" id="dep_job_id_fk">
                            <select name="dep_job_id_fk" id="dep_job_id" onchange="return load_emp($('#dep_job_id').val(),<?php echo $id ?>);" required>
                                <option value="">--قم بإختيار القسم--</option> 
                                <?php
                                foreach($deps as $dep){
                                    $select = '';
                                    if (isset($result) && $dep->id == $result['dep_job_id_fk'])
                                        $select = 'selected';
                                    echo'<option value="'.$dep->id.'" '.$select.'>'.$dep->name.'</option>';
                                }
                                ?>  
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-xs-12">
                        <div class="col-sm-3 col-xs-4">
                            <h4 class="r-h4 text-center"> الموظف </h4>
                        </div>
                        <div class="col-sm-9 col-xs-8 r-input" id="emp_code">
                            <select name="emp_code" required>
                                <option value="">--قم بإختيار الموظف--</option>    
                                <?php
                                if(isset($result)){
                                    echo '<option value="'.$result['emp_code'].'" selected>'.$all_emps[$result['emp_code']]->employee.'</option>';
                                    foreach($emps as $emp)
                                        echo'<option value="'.$emp->id.'">'.$emp->employee.'</option>';
                                }
                                ?>   
                            </select>
                            <?php
                            if(isset($result)){
                                echo'<input type="hidden" name="administration_id'.$result['emp_code'].'" value="'.$result['administration_id'].'" />';
                                if(isset($emps) && $emps != null)
                                    foreach($emps as $emp)
                                        echo'<input type="hidden" name="administration_id'.$emp->id.'" value="'.$emp->administration.'" />';
                            }
                            ?>
                        </div>
                    </div>
    
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-3 col-xs-4">
                            <h4 class="r-h4 text-center"> إسم المستخدم </h4>
                        </div>
                        <div class="col-sm-9 col-xs-8 r-input">
                            <input type="text" class="r-inner-h4 " name="user_username" placeholder="إسم المستخدم" value="<?php if(isset($result)) echo $result['user_username'] ?>" required>
                        </div>
                    </div>
    
                    <div class="col-xs-12">
                        <div class="col-sm-3 col-xs-4">
                            <h4 class="r-h4 text-center"> كلمه المرور </h4>
                        </div>
                        <div class="col-sm-9 col-xs-8 r-input">
                            <input type="password" class="r-inner-h4 " onkeyup="return check_pass($('#user_pass').val(),$('#user_pass_validate').val())" name="user_pass_validate" id="user_pass_validate" placeholder=" كلمه المرور " value="" <?php $required ?>>
                        </div>
                    </div>
    
                    <div class="col-xs-12">
                        <div class="col-sm-3 col-xs-4">
                            <h4 class="r-h4 text-center"> رقم التليفون </h4>
                        </div>
                        <div class="col-sm-9 col-xs-8 r-input">
                            <input type="text" class="r-inner-h4 " name="user_phone" placeholder=" رقم التليفون" value="<?php if(isset($result)) echo $result['user_phone'] ?>" required>
                        </div>
                    </div>
    
                    <div class="col-xs-12">
                        <div class="col-sm-3 col-xs-4">
                            <h4 class="r-h4 text-center"> الصوره </h4>
                        </div>
                        <div class="col-sm-9 col-xs-8 r-input">
                            <input type="file" class="r-inner-h4 " name="user_photo" <?php echo($required) ?>>
                            <?php if(isset($result)){ ?>
                            <img src="<?php if(isset($result)) echo(base_url().'uploads/images/'.$result['user_photo']) ?>" class="img-rounded" width="110" height="80">
                            <span class="alert-danger"><?php if(isset($result)) echo 'لعدم تغيير الصورة لا تقم بإختيار أي شيء'; ?></span>
                            <?php } ?>
                        </div>
                    </div>
    
                </div>
                <div class="col-xs-12">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3 col-xs-6">
                        <button name="add" value="add" type="submit" class="btn  r-manage-btn-1 "> حفظ </button>
                    </div>
                </div>
    
            </div>
        <?php echo form_close()?>
        </div>
    </div>
    <div class="col-xs-12">
    
        <div class="panel-body">
            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">م</th>
                            <th class="text-center">الاسم </th>
                            <th class="text-center">البريد الالكتروني </th>
                            <th class="text-center"> رقم التليفون </th>
                            <th class="text-center">التحكم </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $x = 0 ;
                        foreach($table as $record){
                            echo '<tr>
                                    <td>'.($x+1).'</td>
                                    <td>'.$record->user_name.'</td>
                                    <td>'.$record->user_email.'</td>
                                    <td>'.$record->user_phone.'</td>
                                    <td><a href="'.base_url().'User/add_user/'.$record->user_id.'">تعديل</a> <span class="r-user-span"></span><a href="'.base_url().'User/delete_user/'.$record->user_id.'">حذف</a></td>
                                </tr>';
                            $x++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
function check_pass(pass1, pass2){
    if(pass1 != pass2){
        document.getElementById("user_pass").style.color = "#E34234";
        document.getElementById("user_pass_validate").style.color = "#E34234";
    }
    else{
        document.getElementById("user_pass").style.color = "#000";
        document.getElementById("user_pass_validate").style.color = "#000";
    }       
}

function check_username(username){
    if(username){
        var dataString = 'username=' + username ;
        $.ajax({
            type:"post",
            url: "<?php echo base_url(); ?>User/check",
            data:dataString,
            success:function(response){
                alert(response);
               /* if (response === 0 ) {}
                else
                    alert('يوجد مستخدم بهذا الإسم .. برجاء تغييره'); */
            }
        });
        return false;
    }
}

function load_dep(rol_id, id)
{
    $('#dep_job_id_fk').html('<select name="dep_job_id_fk" required><option value="">--قم بإختيار القسم--</option></select>');
    $('#emp_code').html('<select name="emp_code" required><option value="">--قم بإختيار الموظف--</option></select>');
    if(rol_id){
        var dataString = 'rol_id=' + rol_id;
        
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>User/add_user/'+id,
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $('#dep_job_id_fk').html(html);
            }
        });
        return false;
    }
}

function load_emp(dep_id, id)
{
    $('#emp_code').html('<select name="emp_code" required><option value="">--قم بإختيار الموظف--</option></select>');
    if(dep_id){
        var dataString = 'dep_id=' + dep_id;
        
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>User/add_user/'+id,
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $('#emp_code').html(html);
            }
        });
        return false;
    }
}
</script>