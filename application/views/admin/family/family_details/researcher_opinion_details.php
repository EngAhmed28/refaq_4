
<?php 

$arr_in=array("",'نعم','نعم ولم تستطع مقابلتنا','نعم ولكن رفضضت مقابلتنا','لا');
$arr_op=array("",'متعاونة','متعاونة و تتهرب من بعض الاجابات','متعاونة و غير متقبلة الزيارة','متوفى');
$arr_home=array("",'نعم','لا','الى حد ما');
$arr_child=array("",'نعم','لا','الى حد ما');
$arr_type=array("",'أ','ب','ج','د','ه');
?>


<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
       <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4">هل الام متواجدة</h4>
                </div>
                <div class="col-xs-6 r-input">
            <select name="is_mother_present" class="form-control" disabled="">
            <option> اختر</option>
            <?php for($x=1;$x<sizeof($arr_in);$x++): 
            $selected='';
               if(isset($result_opinion)){
                if($x==$result_opinion['is_mother_present']){$selected='selected';}
               }
            
            ?>
            <option value="<?php echo $x?>" <?php echo $selected;?>  ><?php echo $arr_in[$x];?> </option>
            <?php endfor; ?>
            </select>
            
                </div>
            </div>
     <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> الاهتمام بنظافة المنزل </h4> 
                </div>
                <div class="col-xs-6 r-input">
               <select name="home_cleaning" class="form-control" disabled="">
                <option> اختر</option>
            <?php for($x=1;$x<sizeof($arr_home);$x++):
            $selected='';
               if(isset($result_opinion)){
                if($x==$result_opinion['home_cleaning']){$selected='selected';}
               }
             ?>
            <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_home[$x];?> </option>
            <?php endfor; ?>
            </select>  </div>
            </div>
            
            
            <div class="col-xs-12">  
            <div class="col-xs-6">
                    <h4 class="r-h4"> فئة الاسرة </h4> 
                </div>
                <div class="col-xs-6 r-input">
               <select name="family_type" class="form-control" disabled="">
                <option> اختر</option>
                <?php for($x=1;$x<sizeof($arr_type);$x++):
                 if(isset($result_opinion)){
                if($x==$result_opinion['family_type']){$selected='selected';}
               }
                ?>
                  <option value="<?php echo $x?>"  <?php echo $selected;?> ><?php echo $arr_type[$x]?></option>
                <?php endfor?>
                </select>  </div>
            </div> 
            
              
             <div class="col-xs-12">  
            <div class="col-xs-6">
                    <h4 class="r-h4">مرئيات  رئيس  قسم شؤون الاسر </h4> 
                </div>
                <div class="col-xs-6 r-input">
              <textarea name="video_family_leader"  class="r-textarea" disabled="">
              <?php if(isset($result_opinion['video_family_leader'])&& $result_opinion['video_family_leader']!=null){
                     echo $result_opinion['video_family_leader'];}?></textarea>
               </div>
            </div> 
            
            
</div>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

    <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> إنطباع الام عن الزيارة </h4>
                </div>
                <div class="col-xs-6 r-input">
                 <select name="mother_impression_visit" class="form-control" disabled="">
                  <option> اختر</option>
                  <?php for($x=1;$x<sizeof($arr_op);$x++): 
                   $selected='';
               if(isset($result_opinion)){
                if($x==$result_opinion['mother_impression_visit']){$selected='selected';}
               }?>
            <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_op[$x];?> </option>
            <?php endfor; ?>
           
            </select>   </div>
            </div>
     <div class="col-xs-12">
                <div class="col-xs-6">
                    <h4 class="r-h4"> الاهتمام بنظافة الابناء </h4>
                </div>
                <div class="col-xs-6 r-input">
                   <select name="child_cleanliness" class="form-control" disabled="">
                    <option> اختر</option>
            <?php for($x=1;$x<sizeof($arr_child);$x++): 
            $selected='';
               if(isset($result_opinion)){
                if($x==$result_opinion['child_cleanliness']){$selected='selected';}
               }?>
            <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_child[$x];?> </option>
            <?php endfor; ?>
            </select>  
              </div>
            </div>
         
            <div class="col-xs-12">  
            <div class="col-xs-6">
                    <h4 class="r-h4">مرئيات الباحث</h4> 
                </div>
                <div class="col-xs-6 r-input">
              <textarea name="videos_researcher" class="r-textarea" disabled="">
              <?php if(isset($result_opinion['videos_researcher'])&& $result_opinion['videos_researcher']!=null){echo $result_opinion['videos_researcher'];}?>
              
              </textarea>
               </div>
            </div> 
          
</div>         