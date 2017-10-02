
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
     <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> مبلغ التقاعد </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" readonly="" name="f_pension_amount" class="no-padding r-inner-h4" value="<?php echo $result_money['f_pension_amount']?>" required="required"/>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> مبلغ الممتلكات </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" readonly=""  name="f_owner_ship_amount" value="<?php echo $result_money['f_owner_ship_amount']?>" class="no-padding r-inner-h4" required="required"/>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> مقدار العادة السنوية </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" readonly=""  name="f_annual_amount" value="<?php echo $result_money['f_annual_amount']?>" class="no-padding r-inner-h4" required="required"/>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> عمالة </h4>
                </div>
                <div class="col-xs-3 r-input">
                    <select class="form-control" id="loan" disabled="" name="f_workers_id_fk">
                       <?php if($result_money['f_workers_id_fk']==1){echo ' <option value="1" selected>نعم</option>
                        <option value="0">لا</option>';
                       }else{echo ' <option value="1" >نعم</option>
                        <option value="0" selected>لا</option>';}  ?>
                    </select>
              </div>
              <div class="col-xs-3 r-input">
                    <input type="number" readonly=""  name="f_workers_num" value="<?php echo $result_money['f_workers_num']?>" class="no-padding r-inner-h4" placeholder="عدد العمال"   id="loan-cost" />

              </div>
              
              
              
            </div>

            <div class="col-xs-12">
            
                <div class="col-xs-6">

                    <h4 class="r-h4"> إسم البنك </h4>
                </div>

                <div class="col-xs-6 r-input">
                    <select class="form-control" disabled="" id="f_bank_id_fk" name="f_bank_id_fk" >
                        <?php if($result_money['f_bank_id_fk']=="بنك الجزيرة"){
                            echo'
                       <option selected>بنك الجزيرة</option>
								<option>بنك البلاد</option>
								<option>سامبا</option>
								<option>الرياض</option>';
                        }elseif($result_money['f_bank_id_fk']=="بنك البلاد"){ echo'
                        <option >بنك الجزيرة</option>
								<option selected>بنك البلاد</option>
								<option>سامبا</option>
								<option>الرياض</option>';
                        }elseif($result_money['f_bank_id_fk']=='سامبا'){
                            echo'
                        <option >بنك الجزيرة</option>
								<option >بنك البلاد</option>
								<option selected>سامبا</option>
								<option>الرياض</option>';

                        }else{ echo'
                         <option >بنك الجزيرة</option>
								<option >بنك البلاد</option>
								<option >سامبا</option>
								<option selected>الرياض</option>';
                        } ?>

                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> الإسم المعتمد للحساب </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="text" name="f_official_account_name"  readonly=""  value="<?php echo $result_money['f_official_account_name']?>" class="no-padding r-inner-h4" required="required"/>

                </div>
            </div>
        </div>

        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

            <div class="col-xs-12 ">
                <div class="col-xs-6">
                    <h4 class="r-h4"> مبلغ الضمان </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" class="no-padding r-inner-h4"   readonly="" value="<?php echo $result_money['f_warranty_amount']?>"  name="f_warranty_amount" required="required"/>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  مبلغ التأمين</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" name="f_insurance_amount" readonly=""  value="<?php echo $result_money['f_insurance_amount']?>" class="no-padding r-inner-h4" required="required"/>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  مبالغ أخرى    </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" name="f_other_amount"  readonly="" value="<?php echo $result_money['f_other_amount']?>" class="no-padding r-inner-h4" required="required"/>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> نشاط تجارى </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select class="form-control" name="f_commerical_activity_id_fk" disabled="">
                        <?php if($result_money['f_commerical_activity_id_fk']==1){echo'<option value="1" selected>نعم</option>
                        <option value="0">لا</option>';}else{echo'<option value="1">نعم</option>
                        <option value="0" selected>لا</option>';} ?>

                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  رقم الحساب   </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number"  readonly=""  class="no-padding r-inner-h4" value="<?php echo $result_money['f_bank_account_num']?>" name="f_bank_account_num"/>

                </div>
            </div>


        </div>

       