<?php
if(isset($_POST['rol_id'])){
    echo'<select name="dep_job_id_fk" id="dep_job_id" onchange="return load_emp($(\'#dep_job_id\').val(),'.$id.');" required>
        <option value="">--قم بإختيار القسم--</option>';
    foreach($deps as $dep)
        echo'<option value="'.$dep->id.'">'.$dep->name.'</option>';
    echo'</select>';
}

if(isset($_POST['dep_id'])){
    echo'<select name="emp_code" required>
        <option value="">--قم بإختيار الموظف--</option>';
    foreach($emps as $emp)
        echo'<option value="'.$emp->id.'">'.$emp->employee.'</option>';
    echo'</select>';
    if(isset($emps) && $emps != null)
        foreach($emps as $emp)
            echo'<input type="hidden" name="administration_id'.$emp->id.'" value="'.$emp->administration.'" />';
}
?>