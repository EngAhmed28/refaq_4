
            <div class="col-sm-11 col-xs-12">
               
               <!--  -->
                	<?php $this->load->view('admin/finance_accounting/sandat_tabs'); ?>
               <!--  -->     
                <div class="details-resorce">
                    <div class="col-md-6 r-sanad-col-md">
                        <div class="col-xs-12 r-inner-details">
                            <div class="col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  رقم السند  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " value="">
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  تاريخ السند  </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" name="date" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الحساب المدين  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select>
                                        <option> - اختر - </option>
                                        <option> رأس مال </option>
                                        <option> الخصوم </option>
                                        <option> الموردين </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> القيمة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " value="">
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  البيان </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " value="">
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> طرق الدفع </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select id="r-style-resours" onchange="sanad($('#r-style-resours').val());">
                                        <option value=""> - اختر - </option>
                                        <option value="1"> نقدي </option>
                                        <option value="2"> تحويل بنكي</option>
                                        <option value="3"> شيك </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data r-style-sanad">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  إسم الصندوق </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select>
                                        <option> - اختر - </option>
                                        <option> الصندوق الاول</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data r-style-sanad1">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> إختيار إسم البنك </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select>
                                        <option> - اختر - </option>
                                        <option>البنك العربي مكرر </option>
                                        <option> الرياض </option>
                                        <option> مصرف راجحي </option>
                                        <option> مصرف الانماء </option>
                                        <option> بنك الجزيرة </option>
                                        <option> بنك البلاد </option>
                                        <option> السعودي الفرنسي </option>
                                        <option> الاهلي التجاري</option>
                                        <option> ساب </option>
                                        <option> سامبا </option>
                                        <option> السعودي البريطاني </option>
                                        <option> السعودي الهولندي </option>
                                        <option> السعودي الاستثمار </option>
                                        <option> العربي الوطني</option>
                                        <option> الجزيرة مكرر</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data r-style-sanad2">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الشيك</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " value="">
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data r-style-sanad3">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  تاريخ الايداع  </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" name="date" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data r-style-sanad4">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  تاريخ الاستحقاق  </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" name="date" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 r-input">
                                <button class="btn center-block r-manage-btn "> إضافة حساب </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 r-sanad-col-md  r-show-sanad-data">
                        <div class="col-xs-12 r-inner-details r-inner-details-bord">
                            <div class="col-xs-12 r-sanads">
                                <ul id="menu-group-1" class="nav">
                                    <li class="parent parent-bottom">
                                        <a class="" href="#">
                                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-1" class="sign"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            <span class="lbl"> المستوي الاول</span>
                                        </a>
                                        <ul class="collapse" id="sub-item-1">
                                            <li class="parent active">
                                                <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-5" class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                <span class="lbl"> المجموعة الاولي </span>
                                                <button class="btn btn-danger sanad-btn pull-right"> <i class="fa fa-trash-o " aria-hidden="true"></i></button>
                                                <button class="btn btn-success sanad-btn pull-right"> <i class="fa fa-plus " aria-hidden="true"></i></button>

                                                <ul class="collapse" id="sub-item-5">
                                                    <li class="parent active">
                                                        <span class="sign1"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                                                        <span class="lbl">تفاصيل المجموعة الاولي </span>
                                                        <button class="btn btn-danger sanad-btn pull-right"> <i class="fa fa-trash-o " aria-hidden="true"></i></button>
                                                        <button class="btn btn-success sanad-btn pull-right"> <i class="fa fa-plus " aria-hidden="true"></i></button>
                                                    </li>
                                                </ul>


                                            </li>
                                        </ul>
                                    </li>
                                    <li class="parent parent-bottom">
                                        <a class="" href="#">
                                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-2" class="sign"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            <span class="lbl">المستوي الثاني </span>
                                        </a>
                                        <ul class="collapse" id="sub-item-2">
                                            <li class=" parent">
                                                <span class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                <span class="lbl"> المجموعة الاولي </span>
                                                <button class="btn btn-danger sanad-btn pull-right"> <i class="fa fa-trash-o " aria-hidden="true"></i></button>
                                                <button class="btn btn-success sanad-btn pull-right"> <i class="fa fa-plus " aria-hidden="true"></i></button>

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="parent parent-bottom">
                                        <a class="" href="#">
                                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-3" class="sign">
                                                               <i class="fa fa-plus" aria-hidden="true"></i></span>
                                            <span class="lbl">المستوي الثالث </span>
                                        </a>
                                        <ul class="collapse" id="sub-item-3">
                                            <li class=" parent">
                                                <span class="sign"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                <span class="lbl"> المجموعة الاولي </span>
                                                <button class="btn btn-danger sanad-btn pull-right"> <i class="fa fa-trash-o " aria-hidden="true"></i></button>
                                                <button class="btn btn-success sanad-btn pull-right"> <i class="fa fa-plus " aria-hidden="true"></i></button>

                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       