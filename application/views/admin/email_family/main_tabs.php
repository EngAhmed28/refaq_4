<style>
/************** message *************/

.r-message-right {
    border: 1px solid #eee;
}

.r-message-right h3 {
    padding: 10px;
    background-color: #c72530;
    color: #fff;
    font-weight: bold;
    font-size: 15px;
    border-radius: 7px;
}

.r-message-right h4 {
    font-size: 15px;
    margin-top: 30px;
    margin-bottom: 40px;
    font-weight: bold;
}

.r-message-right h4 .r-numb {
    color: #fff;
    padding: 5px 6px;
    background-color: #34b55e;
    margin-top: -4px;
    /*float: left;*/
    border-radius: 5px;
}

.r-message-right .r-ms-icon {
    font-size: 16px;
    padding-left: 5px;
}

.r-message-left h3 {
    font-size: 20px;
    font-weight: bold;
    padding-bottom: 20px;
}

.r-message-left input {
    padding: 10px;
    margin-bottom: 30px;
    height: auto;
    font-size: 16px;
}

.r-add-mes {
    padding-left: 10px;
}
.nashwa{
    color:rgb(87, 87, 87); 
}
.nashwa:link{
    text-decoration: none;
}
.nashwa:visited {
    color: rgb(87, 87, 87);
}
.nashwa:hover {
    color: rgb(87, 87, 87);
}

</style>

<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <div class="col-xs-12 r-side-table">
                <div class="col-sm-9">
                    <h4> <span> <i class="fa fa-envelope-o" aria-hidden="true"></i></span>  البريد الوارد </h4>
                </div>
                <div class="col-sm-3">
                 <h5> <?php echo $_SESSION['user_username']?></h5>
                 <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
                </div>
            </div>
            <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details " style="background-color: #fff">
                        <div class="col-md-2 r-message-right">
                            <br />
                            <a class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light" href="<?php echo base_url()?>Emails_family/inbox/new/0">
                                إنشاء 
                            </a>
                            <h4>
                                <a class="nashwa" href="<?php echo base_url().'Emails_family/inbox_table/emails_to_me' ?>">
                                <span class="r-ms-icon"> <i class="fa fa-envelope-square" aria-hidden="true"></i></span> البريد الوارد 
                                <?php if(isset($this->email_count[0])) if($this->email_count[0]->to_me > 0){ ?> <span class="r-numb badge badge-success ml-auto">  <?php echo $this->email_count[0]->to_me ?>  </span> <?php } ?>
                                </a>
                            </h4>
                            <h4>
                                <a class="nashwa" href="<?php echo base_url().'Emails_family/inbox_table/emails_sent' ?>">
                                <span class="r-ms-icon"> <i class="fa fa-paper-plane" aria-hidden="true"></i></span> البريد المرسل
                                </a>
                            </h4>
                            <h4>
                                <a class="nashwa" href="<?php echo base_url().'Emails_family/inbox_table/deleted' ?>">
                                <span class="r-ms-icon"> <i class="fa fa-trash" aria-hidden="true"></i></span> المحذوفات 
                                <?php if(isset($this->email_count[0]))if($this->email_count[0]->deleted > 0){ ?><span class="r-numb badge badge-success ml-auto">  <?php echo $this->email_count[0]->deleted ?>  </span> <?php } ?>
                                </a> 
                            </h4>
                            <h4>
                                <a class="nashwa" href="<?php echo base_url().'Emails_family/inbox_table/starred' ?>">
                                <span class="r-ms-icon"> <i class="fa fa-star" style="color: #ffbc34;" aria-hidden="true"></i></span> البريد المفضل 
                                <?php if(isset($this->email_count[0]))if($this->email_count[0]->starred > 0){ ?><span class="r-numb badge badge-success ml-auto">  <?php echo $this->email_count[0]->starred ?>  </span> <?php } ?>
                                </a> 
                            </h4>
                        </div>