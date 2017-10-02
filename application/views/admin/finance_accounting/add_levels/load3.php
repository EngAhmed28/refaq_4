<?php $array_types=array(' قم بإختيار نوع الحساب ','أصول','خصوم','مصروفات','إرادات');?>
<div class="col-xs-12 inner-side r-data">
<div class="col-xs-6">
                    <h4 class="r-h4">نوع الحساب</h4>
                </div>

<div class="col-xs-6 r-input">
            <select name="types" id="types" class="form-control" >
            <?php for($x=0;$x<count($array_types);$x++):?>
                <option value="<?php echo $x;?>"><?php echo $array_types[$x];?></option>
            <?php  endfor;?>
        </select>
            </div>
</div>
<div class="col-xs-12 inner-side r-data">
<div class="col-xs-6">
                    <h4 class="r-h4">كود الحساب</h4>
                </div>

<div class="col-xs-6 r-input">
             <input type="number" class="r-inner-h4" id="code" name="code" value="<?php echo $new_code?>" readonly="" />
             <input type="hidden" name="level" value="<?php echo $level;?>" />
             <input type="hidden" name="id_from" value="<?php echo $id_from;?>" />
            </div>
</div>



















