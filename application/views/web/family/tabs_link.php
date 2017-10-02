<h4 class="main-tilte"><?php if(isset($header_title)&& $header_title!=null){echo $header_title;}?></h4> <!-- active -->
<div class="tabs">
<a href="<?php echo  base_url()."web/basic" ?>" class="tab basic-info <?php if(isset($basic_active)&& $basic_active!=null){echo "active";}?>">البيانات الأساسية</a>
<a href="<?php if($all_links['father'] != false ){echo  base_url()."web/father";}else {echo "#";} ?>" class="tab father-info <?php if(isset($father_active)&& $father_active!=null){echo "active" ;}?>">بيانات الأب</a>
<a href="<?php if($all_links['mother'] != false ){echo  base_url()."web/mother";}else {echo "#";} ?>" class="tab wommen-info <?php if(isset($mother_active)&& $mother_active!=null){echo "active";}?>">البيانات الزوجة</a>
<a href="<?php if($all_links['f_members'] != false ){echo  base_url()."web/family_members";}else {echo "#";} ?>" class="tab family-info <?php if(isset($members_active)&& $members_active!=null){echo "active";}?>">أفراد الأسرة</a>
<a href="<?php if($all_links['houses'] != false ){echo  base_url()."web/house";}else {echo "#";} ?>" class="tab building-info <?php if(isset($house_active)&& $house_active!=null){echo "active";}?>">بيانات السكن</a>
<a href="<?php if($all_links['financial'] != false ){echo  base_url()."web/money";}else {echo "#";} ?>" class="tab money-info <?php if(isset($money_active)&& $money_active!=null){echo "active";}?>">البيانات المالية</a>
<a href="<?php if($all_links['devices'] != false ){echo  base_url()."web/devices";}else {echo "#";} ?>" class="tab devices-info <?php if(isset($device_active)&& $device_active!=null){echo "active";}?>">الأجهزة المنزلية</a>
<a href="<?php if(is_array($all_links['family_attach_files'])){echo  base_url()."web/attach_files";}else {echo "#";} ?>" class="tab file-info <?php if(isset($pdf_active)&& $pdf_active!=null){echo "active";}?>">رفع الوثائق</a>
</div>