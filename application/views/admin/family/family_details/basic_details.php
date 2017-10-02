   <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="one">
                                <div class="col-xs-12 r-inner-details">
                                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">إسم المستخدم</h4>
                                            <h4 class="r-h4">رقم الجوال</h4>
                                            <h4 class="r-h4">حالة الاسرة </h4>
                                            <h4 class="r-h4"> أخر تعديل تم بواسطة </h4>
                                        </div>
                                        <div class="col-xs-6">
                                            <h4 class="r-inner-h4"><?php echo $basic_data[0]->user_name?></h4>
                                            <h4 class="r-inner-h4"><?php echo $basic_data[0]->mother_mob?></h4>
                                            <h4 class="r-inner-h4">حالة الاسرة </h4>
                                            <h4 class="r-inner-h4">أخر تعديل تم بواسطة</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> رقم السجل المدنى للام</h4>
                                            <h4 class="r-h4"> تغير كلمة المرور</h4>
                                            <h4 class="r-h4">  تاريخ التسجيل </h4>
                                            <h4 class="r-h4">تاريخ أخر تعديل </h4>
                                        </div>
                                        <div class="col-xs-6">
                                            <h4 class="r-inner-h4"><?php echo $basic_data[0]->mother_national_num?></h4>
                                            <h4 class="r-inner-h4"> تغير كلمة المرور</h4>
                                            <h4 class="r-inner-h4"><?php echo date("Y-m-d",$basic_data[0]->date_registration)?> </h4>
                                            <h4 class="r-inner-h4"><?php echo date("Y-m-d",$basic_data[0]->date)?></h4>
                                      
                                        </div>
                                    </div>
                                </div>

                            </div>
                         </div>