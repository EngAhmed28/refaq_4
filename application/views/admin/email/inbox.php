<style>
/****************** other page in message ********
*************************************************/

.r-message-right h3 a {
    color: #fff;
    text-decoration: none;
}

.r-message-right h4 a {
    color: #575757;
    text-decoration: none;
}

.r-message-left-1 h6 {
    margin: 3px 0 0;
    color: #000;
}

.r-message-left-1 .r-check-message {
    display: inline-block;
    font-size: 16px;
    height: 15px;
    padding-right: 15px;
}

.r-xs-padding {
    padding: 0;
}

.r-message-left-1 p {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-size: 14px;
    margin-bottom: 0;
}

.r-message-left-1 p a {
    text-decoration: none;
    color: #333;
}

.r-message-inbox {
    padding-top: 13px;
    padding-bottom: 13px;
}

.r-main-message {
    color: #ffc400
}

.r-message-inbox:nth-child(odd) {
    background-color: #eee;
}

.r-message-inbox:nth-child(even) {
    background-color: #fff;
}

.r-delet-mes {
    border-bottom: 2px solid #eee;
}

.r-delet-mes1 {
    border: 1px solid #eee;
    font-size: 20px;
    padding: 7px;
}

.r-delet-mes1 a {
    color: #575757;
}
 
.text-warning{
    color: #575757;
}

.checkbox input[type="checkbox"] {
    cursor: pointer;
    margin-right: 3px;
    position: absolute;
}

.fa-style {
    font-size: 120%;
    margin-top: 12px;
}

.fa-star {
    cursor: pointer;
}

.fa-paperclip {
    color: black;
}

.table {
    border-top:0px !important;
    border-left:0px !important;
    border-right:0px !important;
    border-bottom:0px !important;
}
.table td {
    border: 10px ;
}
.fixed-table-container {
    border:0px !important;
}

.table .max-texts {
    text-align: right;
    padding-top: 16px;
    font-size: 16px;
    font-weight: 600;
}

.message-delet-btn {
    background-color: transparent;
    width: 100%;
}
.n-btn{
    background-color: #fff;
    border: none;
}
.nashwa2{
    position: absolute;
    top: 26px;
    right: 30px;
}
.r-check{
    height: 51px;
}
.r-check #all{
    margin-top: 12px;
}

.r-drop h3 {
    font-size: 15px;
    margin-top: 5px;
}

.r-drop h4 {
    font-size: 15px;
    font-weight: bold;
    margin-top: 5px;
}

.dropdown-menu {
    padding: 0;
}

.dropdown-toggle {
    border: 1px solid #ddd;
    padding: 0 5px;
}
</style> 
<?php 
$this->load->view('admin/email/main_tabs'); 
echo form_open_multipart('Emails/inbox_table/'.$status.'',array('class'=>"myform",'id'=>'formInbox'))
?>
                            
<div class="col-sm-10 r-message-left-1 r-xs-padding">
    <?php
    $to = '';
    $font = '';
    if($status == 'emails_to_me')
        $table = $emails_to_me;
    if($status == 'emails_sent'){
        $table = $emails_sent;
        $to = 'إلى: ';
    }
    if($status == 'deleted'){
        $table = $deleted;
    }
    if($status == 'starred'){
        $table = $starred;
    }
    
    if(isset($table) && $table != null){
    ?>
    <div class="col-xs-12 r-delet-mes">
        <div class="col-xs-1">
            <h5 class="text-center r-delet-mes1 r-check">
                <input type="checkbox"  id="all" name="all" value="0" style="float: center" >
            </h5>
        </div>
        
        <div class="col-xs-1" id="delet" style="display: none;">
            <h5 class="text-center r-delet-mes1">
                 
                 <input value="" type="submit" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="n-btn" title="حذف ما تم إختياره">
            <i class="fa fa-trash nashwa2" aria-hidden="true"></i>
            </h5>
        </div>
    </div>
    <?php
        $fa = 'star';
        echo '<div class="col-xs-12">
                <table class="table table-hover no-wrap">
                    <tbody>';
        foreach($table as $msg){
            if($msg->readed == 1)
                $font = 'style="font-weight: 500;"';
            else
                $font = 'style="font-weight: 600;"';
                
            if($status == 'starred'){
                if($msg->email_id == null)
                    $from = 'me';
                else
                    $from = $users[$msg->email_to]->user_name;
            }
            
            if($status == 'emails_sent'){
                if($to != ''){
                    $e = explode(',',$msg->email_to);
                    if(isset($e[1]))
                        $from = '<div>
                          <div class="col-xs-7" style="padding :0">
                                '.$to.$e[0].'
                                </div>
                                    <div class="col-xs-5">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li class="r-drop">
                                            <div class="col-xs-2">
                                                <h4> من: </h4>
                                            </div>
                                            <div class="col-xs-9">
                                                <h3>'.$users[$msg->email_from]->user_name.'</h3>
                                            </div>
                                        </li>
                                        <li class="r-drop">
                                            <div class="col-xs-2">
                                                <h4> إلى: </h4>
                                            </div>
                                            <div class="col-xs-9">
                                                <h3>'.$msg->email_to.'</h3>
                                            </div>
                                        </li>
                                        <li></li>
                                    </ul>
                                </div>
                                
                                </div>
                                ';
                    else
                        $from = $to.$msg->email_to;
                }
                else
                    $from = $users[$msg->email_from]->user_name;
            }
            
            if($status == 'deleted'){
                $fa = 'trash';
                if($msg->email_id == null)
                    $from = 'me';
                else
                    $from = $users[$msg->email_to]->user_name;
            }
            
            if($status == 'emails_to_me')
                $from = $users[$msg->email_from]->user_name;
                
            if($msg->starred == 1 && $status != 'deleted')
                $color = "#ffbc34";
            else
                $color = "#575757";
            if($msg->file_attached == 1)
                $file_attached = "<i class=\"fa fa-paperclip fa-style\"></i>";
            else
                $file_attached = "";
            if($msg->date == strtotime(date("Y-m-d")))
                $date = date("h:i A",$msg->date_s);
            else
                $date = date("M d",$msg->date);
            
            if($msg->reply == 1 || $msg->forward == 1){
                if($msg->reply == 1)
                    $symbol = '<span><i style="color: rgb(87, 87, 87); " class="fa fa-mail-reply"></i></span> رد: ';
                if($msg->forward == 1)
                    $symbol = '<span><i style="color: rgb(87, 87, 87); " class="fa fa-mail-forward"></i></span> موجه: ';
            }
            else
                $symbol = '';
            echo '<input type="hidden" id="hide'.$msg->id.'" name="hide'.$msg->id.'" value="'.$msg->starred.'" />
                  <input type="hidden" id="status" name="status" value="'.$status.'" />
                    <tr class="unread text-center">
                        <td class="fa-style" style="width:40px">
                            <div class="checkbox" style="text-align: center;">
                                <input type="checkbox" value="'.$msg->id.'" name="check[]" class="cc">
                            </div>
                        </td>
                        
                        <td style="width:50px; text-align: center;" class="hidden-xs-down">
                            <i id="star'.$msg->id.'" name="star'.$msg->id.'" onclick="return change_color('.$msg->id.',$(\'#hide'.$msg->id.'\').val())" class="fa fa-'.$fa.' fa-style" style="color: '.$color.';"></i>
                        </td>
                        
                        <td style="width: 18%" class="max-texts" '.$font.'>
                           '.$from.'
                        </td>
                        
                        <td class="max-texts" '.$font.'> 
                            <a class="nashwa" href="'.base_url().'Emails/reading/'.$msg->id.'">
                            '.$symbol.' '.$msg->title.' - '.strip_tags(word_limiter($msg->content,6)).'..</a>
                        </td>
                        
                        <td class="hidden-xs-down">'.$file_attached.'</td>
                        
                        <td class="max-texts" '.$font.' style="text-align: center">
                            '.$date.' 
                         </td>
                    </tr>';
        } 
        echo '</tbody>
                </table>
                    </div>';
    }
    ?>                       
</div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
function change_color(i,a){
    id = "star"+i;
    hid = "#hide"+i;
    if(a == 0){
        document.getElementById(id).style.color = "#ffbc34";
        a = 1;
        $(hid).val(a);
    }
    else{
        document.getElementById(id).style.color = "#575757";
        a = 0;
        $(hid).val(a);
    }
    code = 'starred=' + a + '&id=' + i;
    $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Emails/inbox_table',
                data:code,
                dataType: 'html',
                cache:false,
                success: function(data){
                }
            });
}
</script>