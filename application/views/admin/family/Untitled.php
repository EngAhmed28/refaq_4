	<?php $yes_no=array('اختر','نعم','لا');?>
            <div class="col-sm-11 col-xs-12">
                <!--  -->
                	<?php $this->load->view('admin/family/main_tabs'); ?>
                <!--  -->
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                      <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="<?php echo  base_url()."Family/basic/".$result['mother_national_num_fk'];?>"> البيانات الأساسية </a></li>
                            <li><a href="details.html"> بيانات الأب </a></li>
                            <li><a href="details1.html">البيانات الزوجة </a></li>
                            <li><a href="details2.html">أفراد الأسرة </a></li>
                            <li><a href="details3.html">بيانات السكن</a></li>
                            <li><a href="details4.html"> البيانات المالية </a></li>
                            <li><a href="details5.html">  الأجهزة المنزلية</a></li>
                        </ul>
                    </div>
                     
<!-------------------------------------------------------------------------------------------------------------------------->



             
<!--------------------------------------------------------------------------------------------------------------------------> 
                      
                    </div>
                    <!--3 -->
                    <div class="col-xs-12 r-inner-btn">
                       
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                            <button class="btn center-block">إضافة </button>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                          <a href=""> <button class="btn  center-block"> عودة </button> </a>  
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                            <button class="btn center-block"> التالى </button>
                        </div>
                      
                        <div class="col-md-3"></div>
                    </div>
                    <!--3 -->
                </div>
            </div>
  