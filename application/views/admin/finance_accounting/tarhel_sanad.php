          <div class="col-sm-11 col-xs-12">
                 <!--  -->
                	<?php $this->load->view('admin/finance_accounting/sandat_tabs'); ?>
               <!--  --> 
                   <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#one" aria-controls="one" role="tab" data-toggle="tab">  ترحيل سند </a></li>
                            <li role="presentation"><a href="#two" aria-controls="two" role="tab" data-toggle="tab"> إلغاء ترحيل سند </a></li>
                            <li role="presentation"><a href="#three" aria-controls="three" role="tab" data-toggle="tab">  جميع السندات المرحلة  </a></li>
                         </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="one">
                                <div class="col-xs-12 r-inner-details r-inner-details-sanad">
                                    <table style="width:100%">
                                        <tr>
                                            <th>م </th>
                                            <th> رقم السند </th>
                                            <th>تاريخ تسجيل السند</th>
                                            <th> نوع السند </th>
                                            <th> الاجمالي  </th>
                                            <th> حساب المدين </th>
                                            <th> الاجراء  </th>
                                            <th> التفاصيل </th>
                                           </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>111 </td>
                                            <td> 2017-07-07 </td>
                                            <td>نقدي </td>
                                            <td> 212121.00	</td>
                                            <td> الصندوق الاول	 </td>
                                           <td class="edit-sanad2">ترحيل السند</td>
                                        <td>
                                            <a class="pop-manage-sanad" data-toggle="modal" data-target=".firstModal"> تفاصيل</a>
                                            <div class=" modal fade firstModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-manage">
                                                <h4 class="pop-manage-h4 text-center"> تفاصيل السند </h4>
                                                
                                                <table  style="width:98%" class="inner-pop-table">
                                                    <tr>
                                                        <th>م</th>
                                                        <th>مدين</th>
                                                        <th>دائن</th>
                                                        <th>إسم الحساب</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>212121</td>
                                                        <td>--</td>
                                                        <td>يحيى البكري - مؤسسة بئر العبد</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                         <td>--</td>
                                                        <td>212121</td>
                                                        <td>يحيى البكري - مؤسسة بئر العبد</td>
                                                    </tr>
                                                </table>
                                                <div class="modal-footer ">
                                                    <button type="button" class="btn manage-close-pop manage-close-pop-sanad" data-dismiss="modal">اغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                        
                                         </tr>  
                                        <tr>
                                            <td>1</td>
                                            <td>111 </td>
                                            <td> 2017-07-07 </td>
                                            <td>نقدي </td>
                                            <td> 212121.00	</td>
                                            <td> الصندوق الاول	 </td>
                                           <td class="edit-sanad2">ترحيل السند</td>
                                        <td>
                                            <a class="pop-manage-sanad" data-toggle="modal" data-target=".secondModal"> تفاصيل</a>
                                               <div class=" modal fade secondModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-manage">
                                                <h4 class="pop-manage-h4 text-center"> تفاصيل السند </h4>
                                                 <table  style="width:98%" class="inner-pop-table">
                                                    <tr>
                                                        <th>م</th>
                                                        <th>مدين</th>
                                                        <th>دائن</th>
                                                        <th>إسم الحساب</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>212121</td>
                                                        <td>--</td>
                                                        <td>يحيى البكري - مؤسسة بئر العبد</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                         <td>--</td>
                                                        <td>212121</td>
                                                        <td>يحيى البكري - مؤسسة بئر العبد</td>
                                                    </tr>
                                                </table>
                                                <div class="modal-footer ">
                                                    <button type="button" class="btn manage-close-pop manage-close-pop-sanad" data-dismiss="modal">اغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                     
                                        </td>
                                         </tr>  
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="two">
                             <div class="col-xs-12 r-inner-details r-inner-details-sanad">
                                    <table style="width:100%">
                                        <tr>
                                            <th>م </th>
                                            <th> رقم السند </th>
                                            <th>تاريخ تسجيل السند</th>
                                            <th> نوع السند </th>
                                            <th> الاجمالي  </th>
                                            <th> حساب المدين </th>
                                            <th> الاجراء  </th>
                                            <th> التفاصيل </th>
                                           </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>111 </td>
                                            <td> 2017-07-07 </td>
                                            <td>نقدي </td>
                                            <td> 212121.00	</td>
                                            <td> الصندوق الاول	 </td>
                                           <td class="edit-sanad1">إلغاء ترحيل السند</td>
                                           <td>
                                            <a class="pop-manage-sanad" data-toggle="modal" data-target=".sixModal"> تفاصيل</a>
                                              <div class=" modal fade sixModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-manage">
                                                <h4 class="pop-manage-h4 text-center"> تفاصيل السند </h4>
                                               <table  style="width:98%" class="inner-pop-table">
                                                    <tr>
                                                        <th>م</th>
                                                        <th>مدين</th>
                                                        <th>دائن</th>
                                                        <th>إسم الحساب</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>212121</td>
                                                        <td>--</td>
                                                        <td>يحيى البكري - مؤسسة بئر العبد</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                         <td>--</td>
                                                        <td>212121</td>
                                                        <td>يحيى البكري - مؤسسة بئر العبد</td>
                                                    </tr>
                                                </table>
                                                <div class="modal-footer ">
                                                    <button type="button" class="btn manage-close-pop manage-close-pop-sanad" data-dismiss="modal">اغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                            </td>
                                         </tr>  
                                       <tr>
                                            <td>1</td>
                                            <td>111 </td>
                                            <td> 2017-07-07 </td>
                                            <td>نقدي </td>
                                            <td> 212121.00	</td>
                                            <td> الصندوق الاول	 </td>
                                           <td class="edit-sanad1"> إلغاء ترحيل السند</td>
                                           <td>
                                            <a class="pop-manage-sanad" data-toggle="modal" data-target=".fiveModal"> تفاصيل</a>
                                              <div class=" modal fade fiveModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-manage">
                                                <h4 class="pop-manage-h4 text-center"> تفاصيل السند </h4>
                                               <table  style="width:98%" class="inner-pop-table">
                                                    <tr>
                                                        <th>م</th>
                                                        <th>مدين</th>
                                                        <th>دائن</th>
                                                        <th>إسم الحساب</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>212121</td>
                                                        <td>--</td>
                                                        <td>يحيى البكري - مؤسسة بئر العبد</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                         <td>--</td>
                                                        <td>212121</td>
                                                        <td>يحيى البكري - مؤسسة بئر العبد</td>
                                                    </tr>
                                                </table>
                                                <div class="modal-footer ">
                                                    <button type="button" class="btn manage-close-pop manage-close-pop-sanad" data-dismiss="modal">اغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        </td>
                                       </tr>  
                                    </table>
                             </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="three">
                                 <div class="col-xs-12 r-inner-details r-inner-details-sanad">
                                    <table style="width:100%">
                                        <tr>
                                            <th>م </th>
                                            <th> رقم السند </th>
                                            <th>تاريخ تسجيل السند</th>
                                            <th> نوع السند </th>
                                            <th> الاجمالي  </th>
                                            <th> حساب المدين </th>
                                            <th> التفاصيل </th>
                                           </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>111 </td>
                                            <td> 2017-07-07 </td>
                                            <td>نقدي </td>
                                            <td> 212121.00	</td>
                                            <td> الصندوق الاول	 </td>
                                          <td>
                                            <a class="pop-manage-sanad" data-toggle="modal" data-target=".nineModal"> تفاصيل</a>
                                                <div class=" modal fade nineModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-manage">
                                                <h4 class="pop-manage-h4 text-center"> تفاصيل السند </h4>
                                               <table  style="width:98%" class="inner-pop-table">
                                                    <tr>
                                                        <th>م</th>
                                                        <th>مدين</th>
                                                        <th>دائن</th>
                                                        <th>إسم الحساب</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>212121</td>
                                                        <td>--</td>
                                                        <td>يحيى البكري - مؤسسة بئر العبد</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                         <td>--</td>
                                                        <td>212121</td>
                                                        <td>يحيى البكري - مؤسسة بئر العبد</td>
                                                    </tr>
                                                </table>
                                                <div class="modal-footer ">
                                                    <button type="button" class="btn manage-close-pop manage-close-pop-sanad" data-dismiss="modal">اغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        </td>
                                        </tr>  
                                        <tr>
                                            <td>1</td>
                                            <td>111 </td>
                                            <td> 2017-07-07 </td>
                                            <td>نقدي </td>
                                            <td> 212121.00	</td>
                                            <td> الصندوق الاول	 </td>
                                          <td>
                                            <a class="pop-manage-sanad" data-toggle="modal" data-target=".tenModal"> تفاصيل</a>
                                              
                                                <div class=" modal fade tenModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-manage">
                                                <h4 class="pop-manage-h4 text-center"> تفاصيل السند </h4>
                                               <table  style="width:98%" class="inner-pop-table">
                                                    <tr>
                                                        <th>م</th>
                                                        <th>مدين</th>
                                                        <th>دائن</th>
                                                        <th>إسم الحساب</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>212121</td>
                                                        <td>--</td>
                                                        <td>يحيى البكري - مؤسسة بئر العبد</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                         <td>--</td>
                                                        <td>212121</td>
                                                        <td>يحيى البكري - مؤسسة بئر العبد</td>
                                                    </tr>
                                                </table>
                                                <div class="modal-footer ">
                                                    <button type="button" class="btn manage-close-pop manage-close-pop-sanad" data-dismiss="modal">اغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        </td>
                                        </tr>  
                                    </table>
                                 </div>
                           </div>
                         </div>
                    </div>
                  </div>
           
              </div>
  