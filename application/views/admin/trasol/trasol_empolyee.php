       <div class="col-sm-11 col-xs-12">
               <?php $this->load->view('admin/trasol/main_tab'); ?>
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details " style="background-color: #fff">
                        <div class="container r-cont">
                            <div class="col-md-4 col-sm-6">
                                <div class="r-stores">
                                    <a href="<?php echo base_url()."Sending"; ?>">
                                        <img src="<?php echo base_url()?>asisst/admin_asset/img/trasel/chat.png" alt="" class="center-block">
                                        <h3 class="text-center"> تراسل عبر sms</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="r-stores">
                                    <a href="">
                                        <img src="<?php echo base_url()?>asisst/admin_asset/img/trasel/email.png" alt="" class="center-block">
                                        <h3 class="text-center"> تراسل عبر email </h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="r-stores">
                                    <a href="<?php echo base_url()."Emails/inbox_table/emails_to_me"; ?>">
                                        <img src="<?php echo base_url()?>asisst/admin_asset/img/trasel/contact.png" alt="" class="center-block">
                                        <h3 class="text-center"> تراسل عبر النظام </h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-sm-9 col-xs-6"></div>
                        <div class="col-sm-3 col-xs-6">
                            <a href="<?php echo base_url()."Dashboard/trasol"?>" class="a-trasol"> <button class="btn r-trasel"> تراجع  </button> </a>
                        </div>
                    </div>
                </div>
            </div>
      