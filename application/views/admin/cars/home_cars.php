
<style>
    /************** مخازن ***************/

    .r-cont {
        width: 95%;
    }

    .r-stores {
        /* border-top: 1px dashed #dcdbdb;*/
        margin-bottom: 60px;
        background: linear-gradient(to bottom, #eee 0%, #fff 100%);
        border-radius: 10px;
    }

    .r-stores img {
        padding-top: 15px;
        width: 46%;
        height: auto;
    }

    .r-stores h3 {
        font-size: 18px;
        color: #0c1e56;
        padding-bottom: 15px;
        margin-top: 15px;
    }

    .r-stores a {
        text-decoration: none;
        outline: none;
    }

    .store-btn {
        width: auto;
        outline: none;
    }

    .store-btn1 {
        width: 59px;
        height: 35px;
        background-color: #123456;
        color: #fff;
        outline: none;
    }

    .store-btn1:hover {
        background-color: #123456;
        color: #123456;
    }

    @media (max-width:768px) {
        .r-stores tr {
            display: table-row !important;
        }
    }

    @media (max-width:400px) {
        .r-cont {
            padding: 0;
        }
    }


    .modal1{
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1050;
        display: none;
        overflow: hidden;
        -webkit-overflow-scrolling: touch;
        outline: 0;
    }


</style>
<div class="col-sm-11 col-xs-12">
                <div class="col-xs-12 r-side-table">
                    <div class="col-sm-9">
                        <h4> <span> <i class="fa fa-taxi" aria-hidden="true"></i></span> السيارات والصيانة</h4>
                    </div>
                    <div class="col-sm-3">
                        <h5> <?php echo $_SESSION['user_username']?> </h5>
                        <h5> اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
                    </div>
                </div>
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details " style="background-color: #fff">
                        <div class="container r-cont">
                            <div class="col-md-4 col-sm-6">
                                <div class="r-stores">
                                    <a href="<?php echo base_url().'dashboard/add_car' ?>">
                                        <img src="<?php echo base_url()?>asisst/admin_asset/img/sitteng/repairing.png" alt="" class="center-block">
                                        <h3 class="text-center"> إعدادت العامة</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="r-stores">
                                    <a href="<?php echo base_url().'dashboard/add_driver' ?>">
                                        <img src="<?php echo base_url()?>asisst/admin_asset/img/sitteng/delivery-man.png" alt="" class="center-block">
                                        <h3 class="text-center"> السائقين </h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="r-stores">
                                    <a href="<?php echo base_url().'dashboard/add_orders_car' ?>">
                                        <img src="<?php echo base_url()?>asisst/admin_asset/img/sitteng/auto.png" alt="" class="center-block">
                                        <h3 class="text-center"> أمر شغل </h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="r-stores">
                                    <a href="<?php echo base_url().'dashboard/add_car_violation' ?>">
                                        <img src="<?php echo base_url()?>asisst/admin_asset/img/sitteng/traffic-sign.png" alt="" class="center-block">
                                        <h3 class="text-center"> مخالفات السيارات </h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="r-stores">
                                    <a href="<?php echo base_url().'dashboard/car_crash/0' ?>">
                                        <img src="<?php echo base_url()?>asisst/admin_asset/img/sitteng/car-tire-change.png" alt="" class="center-block">
                                        <h3 class="text-center"> صيانة السيارات </h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="r-stores">
                                    <a href="<?php echo base_url().'dashboard/R_drivers' ?>">
                                        <img src="<?php echo base_url()?>asisst/admin_asset/img/sitteng/car-repair.png" alt="" class="center-block">
                                        <h3 class="text-center"> التقارير </h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>