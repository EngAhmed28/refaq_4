            <div class="col-sm-11 col-xs-12">
                <!--  -->
                	<?php $this->load->view('admin/family/main_tabs'); ?>
                <!--  -->
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                      <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li><a href="<?php echo  base_url()."Family/basic/".$result['mother_national_num_fk'];?>"> البيانات الأساسية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_father/".$result['mother_national_num_fk'];?>"> بيانات الأب </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_mother/".$result['mother_national_num_fk'];?>">البيانات الزوجة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_family_members/".$result['mother_national_num_fk'];?>">أفراد الأسرة </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_house/".$result['mother_national_num_fk'];?>">بيانات السكن</a></li>
                            <li class="active"><a href="<?php echo  base_url()."Family/update_money/".$result['mother_national_num_fk'];?>"> البيانات المالية </a></li>
                            <li><a href="<?php echo  base_url()."Family/update_devices/".$result['mother_national_num_fk'];?>">  الأجهزة المنزلية</a></li>
                      <li><a href="<?php echo  base_url()."Family/researcher_opinion/".$result['mother_national_num_fk'];?>"> رأى الباحث الاجتماعى</a></li>
           
                        </ul>
                    </div>
                     
<!-------------------------------------------------------------------------------------------------------------------------->
<?php echo form_open_multipart('Family/update_money/'.$result['mother_national_num_fk'])?>

<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
     <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> مبلغ التقاعد </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" name="f_pension_amount" class="no-padding r-inner-h4" value="<?php echo $result['f_pension_amount']?>" required="required"/>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> مبلغ الممتلكات </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" name="f_owner_ship_amount" value="<?php echo $result['f_owner_ship_amount']?>" class="no-padding r-inner-h4" required="required"/>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> مقدار العادة السنوية </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" name="f_annual_amount" value="<?php echo $result['f_annual_amount']?>" class="no-padding r-inner-h4" required="required"/>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> عمالة </h4>
                </div>
                <div class="col-xs-3 r-input">
                    <select class="form-control no-padding " id="loan" name="f_workers_id_fk">
                       <?php if($result['f_workers_id_fk']==1){echo ' <option value="1" selected>نعم</option>
                        <option value="0">لا</option>';
                       }else{echo ' <option value="1" >نعم</option>
                        <option value="0" selected>لا</option>';}  ?>
                    </select>
              </div>
              <div class="col-xs-3 r-input">
                    <input type="number" name="f_workers_num" value="<?php echo $result['f_workers_num']?>" class="form-control  no-padding" placeholder="عدد العمال"  id="loan-cost" />

              </div>
              
              
              
            </div>

            <div class="col-xs-12">
            
                <div class="col-xs-6">

                    <h4 class="r-h4"> إسم البنك </h4>
                </div>

                <div class="col-xs-6 r-input">
                    <select class="form-control no-padding" id="f_bank_id_fk" name="f_bank_id_fk" >
                        <?php if($result['f_bank_id_fk']=="بنك الجزيرة"){
                            echo'
                       <option selected>بنك الجزيرة</option>
								<option>بنك البلاد</option>
								<option>سامبا</option>
								<option>الرياض</option>';
                        }elseif($result['f_bank_id_fk']=="بنك البلاد"){ echo'
                        <option >بنك الجزيرة</option>
								<option selected>بنك البلاد</option>
								<option>سامبا</option>
								<option>الرياض</option>';
                        }elseif($result['f_bank_id_fk']=='سامبا'){
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
                    <input type="text" name="f_official_account_name" value="<?php echo $result['f_official_account_name']?>" class="no-padding r-inner-h4" required="required"/>

                </div>
            </div>
        </div>

        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

            <div class="col-xs-12 ">
                <div class="col-xs-6">
                    <h4 class="r-h4"> مبلغ الضمان </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" class="no-padding r-inner-h4" value="<?php echo $result['f_warranty_amount']?>"  name="f_warranty_amount" required="required"/>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  مبلغ التأمين</h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" name="f_insurance_amount" value="<?php echo $result['f_insurance_amount']?>" class="no-padding r-inner-h4" required="required"/>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">  مبالغ أخرى    </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <input type="number" name="f_other_amount" value="<?php echo $result['f_other_amount']?>" class="no-padding r-inner-h4" required="required"/>

                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> نشاط تجارى </h4>
                </div>
                <div class="col-xs-6 r-input">
                    <select class="form-control no-padding " name="f_commerical_activity_id_fk">
                        <?php if($result['f_commerical_activity_id_fk']==1){echo'<option value="1" selected>نعم</option>
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
                    <input type="number" class="no-padding r-inner-h4" value="<?php echo $result['f_bank_account_num']?>" name="f_bank_account_num"/>

                </div>
            </div>


        </div>

             
<!--------------------------------------------------------------------------------------------------------------------------> 
                      
                    </div>
                    <!--3 -->
                    <div class="col-xs-12 r-inner-btn">
                       
                        <div class="col-md-4 col-sm-3 col-xs-6 inner-details-btn">
                     
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                         <a  href="<?php  echo base_url().'Family/update_house/'.$result['mother_national_num_fk']?>">
                            <button type="button" class="btn btn-info">عودة</button> </a> 
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6 inner-details-btn">
                       <input type="submit" role="button" name="update_money" class="btn btn-blue btn-next"  value="التالى" />
                        </div>
                      
                        <div class="col-md-3"></div>
                    </div>
                    <!--3 -->
                </div>
            </div>
    <?php echo form_close()?>
<script>
    document.getElementById("loan").onchange = function () {

        if (this.value == '1')
            document.getElementById("loan-cost").removeAttribute("readonly", "readonly");
        else{
            document.getElementById("loan-cost").setAttribute("readonly", "readonly");
            $("#loan-cost").val(""); 
        }
    };

</script>
