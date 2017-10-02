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
            <h4> <span> <i class="fa fa-users" aria-hidden="true"></i></span> المخازن</h4>
        </div>
        <div class="col-sm-3">
            <h5> موظف استقبال </h5>
            <h5> اخر دخول : 27 / 5 / 2017</h5>
        </div>
    </div>


<div class="details-resorce">
    <div class="col-xs-12 r-inner-details " style="background-color: #fff">
        <div class="container r-cont">
            <div class="col-md-4 col-sm-6">
                <div class="r-stores">
                    <a href="<?php echo base_url()."dashboard/add_storage"?>">
                        <img src="<?php echo base_url()?>asisst/img/stores/shopping-cart%20(7).png" alt="" class="center-block">
                        <h3 class="text-center"> إعدادت المخازن</h3>
                    </a>
        
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="r-stores">
                    <a href="<?php echo base_url()."dashboard/add_unit"?>">
                        <img src="<?php echo base_url()?>asisst/img/stores/shopping-cart%20(5).png" alt="" class="center-block">
                        <h3 class="text-center"> إعدادت الاصناف</h3>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="r-stores">
                    <a href="<?php echo base_url()."Supplies_orders/index/0"?>">
                        <img src="<?php echo base_url()?>asisst/img/stores/shopping-cart.png" alt="" class="center-block">
                        <h3 class="text-center"> أوامر التوريد والصرف بالمخازن </h3>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="r-stores">
                    <a href="<?php echo base_url()."Products/standard/0"?>">
                        <img src="<?php echo base_url()?>asisst/img/stores/shopping-cart%20(3).png" alt="" class="center-block">
                        <h3 class="text-center">إدارة تركيبات الاصناف</h3>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="r-stores">
                    <a href="<?php echo base_url()."Reports/index/0"?>">
                        <img src="<?php echo base_url()?>asisst/img/stores/report%20(2).png" alt="" class="center-block">
                        <h3 class="text-center"> تقارير </h3>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="r-stores">
                    <a href="">
                        <img src="<?php echo base_url()?>asisst/img/stores/report%20(1).png" alt="" class="center-block">
                        <h3 class="text-center"> تقارير </h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>