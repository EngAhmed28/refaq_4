<section class="family">
	<div class="container">
	
		<?php $this->load->view('web/family/tabs_link'); ?>

		<div class="content">
<?php echo form_open_multipart('web/attach_files',array('class'=>"form-horizontal",'role'=>"form" ))?>

<!--------------------------------------------------------------------------------------------------------->
   <div class="col-xs-12 panel-body ">
            <table class="table table-bordered" >
                <tr>
                    <th>م </th>
                    <th>إسم الملف </th>
                    <th>إرفاق </th>
                </tr>
                <tr >
                    <td>  </td>
                    <td>شهادة الوفاة</td>
                    <td>
                     <input type="file" name="death_certificate"  value="" /> 
                 <!--      	<input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class=" col-xs-3 no-padding browse"/>
						<input type="file" id="browse" name="death_certificate" style="display: none" onChange="Handlechange();" class=" col-xs-3 no-padding"/>
                   --> </td>
                </tr>
                <tr >
                    <td>  </td>
                    <td> كارت العائلة </td>
                    <td>
                     <input type="file" name="family_card"   /> 
                       <!--     	<input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class=" col-xs-3 no-padding browse"/>
					    	<input type="file" id="browse" name="family_card" style="display: none" onChange="Handlechange();" class=" col-xs-3 no-padding"/>
				 --> 	</td>
                </tr>
                <tr >
                    <td>  </td>
                    <td> صك حرث الارث </td>
                    <td>
                     <input type="file" name="plowing_inheritance"   /> 
                     <!--    	<input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class=" col-xs-3 no-padding browse"/>
					    <input type="file" id="browse" name="plowing_inheritance" style="display: none" onChange="Handlechange();" class=" col-xs-3 no-padding"/>
                  -->  </td>
                </tr>
                <tr >
                    <td>  </td>
                    <td> صك الولاية</td>
                    <td>
                     <input type="file" name="instrument_agency_with_orphans"   /> 
                   <!--      <input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class=" col-xs-3 no-padding browse"/>
					   <input type="file" id="browse" name="instrument_agency_with_orphans" style="display: none" onChange="Handlechange();" class=" col-xs-3 no-padding"/>
                  -->  </td>
                </tr>
                <tr >
                    <td>  </td>
                    <td> شهادات الميلاد</td>
                    <td>
                     <input type="file" name="birth_certificate"   /> 
                     <!--    <input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class=" col-xs-3 no-padding browse"/>
					   <input type="file" id="browse" name="birth_certificate" style="display: none" onChange="Handlechange();" class=" col-xs-3 no-padding"/>
                  -->     </td>
                </tr>
                <tr >
                    <td>  </td>
                    <td> صك ملكية السكن أو عقد الايجار </td>
                   
                    <td>
                     <input type="file" name="ownership_housing"   /> 
                     <!--    <input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class=" col-xs-3 no-padding browse"/>
					   <input type="file" id="browse" name="ownership_housing" style="display: none" onChange="Handlechange();" class=" col-xs-3 no-padding"/>
                 -->   </td>
                </tr>
                <tr >
                    <td>  </td>
                    <td> تعريف من المدرسة بجميع الأبناء و البنات</td>
                    <td>
                     <input type="file" name="definition_school"   /> 
                     <!--    <input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class=" col-xs-3 no-padding browse"/>
					   <input type="file" id="browse" name="definition_school" style="display: none" onChange="Handlechange();" class=" col-xs-3 no-padding"/>
                  -->  </td>
                </tr>
                 <tr >
                    <td>  </td>
                    <td>بطاقة الضمان  الاجتماعى</td> 
                    <td>
                     <input type="file" name="social_security_card"   /> 
                     <!--     <input type="button" value="ارفاق ملف" id="fakeBrowse" onclick="HandleBrowseClick();" class=" col-xs-3 no-padding browse"/>
					    <input type="file" id="browse" name="social_security_card" style="display: none" onChange="Handlechange();" class=" col-xs-3 no-padding"/>
                  -->  </td>
                </tr>
               
               
               <!--  <tr >
                    <td>  </td>
                    <td> نسخة من مصلحة التقاعد</td>
                    <td>
                     <input type="file" name="retirement_department"   /> 
                      </td>
                </tr>
                 <tr >
                    <td>  </td>
                    <td> مستند من التأمينات الاجتماعية</td>
                    <td>
                     <input type="file" name="social_insurance"   /> 
                     </td>
                </tr>
                -->
                
                   <tr >
                    <td>  </td>
                    <td> الحساب البنكي ( رقم الأيبان )</td>
                    <td>
                     <input type="file" name="bank_statement"   /> 
                     
              
                    </td>
                </tr>
            </table>
        </div>
<!--------------------------------------------------------------------------------------------------------->	
<div class="form-group">
					<a href="<?php echo base_url().'Web/devices' ?>"> <button type="" class="btn btn-blue btn-previous" >السابق </button> </a>	
						<input type="submit" class="btn btn-blue btn-next"  name="ADD" value="حفظ إنهاء" />
					</div>
				

		
<?php echo form_close()?>

		</div>

	</div>
</section>

<script>
function HandleBrowseClick()
{
    var fileinput = document.getElementById("browse");
    fileinput.click();
}

function Handlechange()
{
    var fileinput = document.getElementById("browse");
    var textinput = document.getElementById("filename");
    textinput.value = fileinput.value;
}

</script>
