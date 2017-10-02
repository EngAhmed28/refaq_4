<style>
.r-message-detail {
    border: 1px solid #eee;
}

.r-message-detail h2 {
    font-size: 19px;
    margin: 0px;
    padding: 15px;
    border-bottom: 1px solid #eee;
}

.r-message-titel {
    padding: 30px 10px;
}

.r-message-titel img {
    width: 80%;
    height: 85px;
    border-radius: 50%;
}

.r-message-titel h3 {
    font-size: 15px;
    margin: 0;
    padding-top: 15px;
    padding-bottom: 10px;
}

.r-message-titel h4 {
    font-size: 15px;
    margin: 0;
}

.r-message-detail p {
    padding: 30px 20px;
    font-size: 16px;
    border-bottom: 1px solid #eee;
}

.r-img-message h2 {
    padding-top: 4px;
}

.r-img-message img {
    width: 100%;
    height: 75px;
    border-radius: 5px;
    margin-top: 20px;
    margin-bottom: 20px;
}

.r-message-textarea {
    padding: 15px;
}

.r-message-textarea p {
    border: 1px solid #eee;
}
</style>

<?php 
$this->load->view('admin/email_family/main_tabs'); 
echo form_open_multipart('Emails/inbox',array('class'=>"myform"));
if($result['sent'] == 1 && ($result['file_attached'] == 1)){//($result['reply'] == 1 || $result['forward'] == 1)
    $this->db->select('*');
    $this->db->from('email_files');
    $array = array('email_id'=>$result['id']);
    $this->db->where($array);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $files[$row->id] = $row;
        }
    }
}
?>
                            <div class="col-xs-10 r-message-detail">
                                <h2><?php if($result['title'] == '') echo 'بلا عنوان'; else{
                                    $before = '';
                                    if($result['reply'] == 1)
                                        $before = 'رد: ';
                                    if($result['forward'] == 1)
                                        $before = 'موجه: ';
                                    echo $before.$result['title'];} ?></h2>
                                <div class="col-xs-12 r-message-titel">
                                    <div class="col-md-2 col-sm-3 col-xs-5">
                                        <img src="<?php echo base_url().'uploads/images/'.$users[$result['email_from']]->user_photo ?>" alt="">
                                    </div>
                                    <div class="col-md-10 col-sm-9 col-xs-7">
                                        <h3><b>من: <?php echo $users[$result['email_from']]->user_name ?></b></h3>
                                        <small class="text-muted">الإيميل: <?php echo $users[$result['email_from']]->user_email ?></small>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <p><?php echo strip_tags( $result['content'] )?></p>
                                </div>
                                <div class="col-xs-12 r-img-message">
                                <?php 
                                if($result['file_attached'] == 1){
                                    echo '<h2><span><i class="fa fa-paperclip" aria-hidden="true"></i>
                                            </span> الملفات <span> ( '.count($files).' )</span></h2>
                                            <div class="col-xs-12">';
                                            
                                    foreach($files as $file){
                                        echo '<div class="col-md-2 col-sm-3 col-xs-4">
                                                    <img src="'.base_url().'uploads/images/'.$file->file_name.'" alt="">
                                                    <a href="'.base_url().'Emails/downloads/'.$file->file_name.'/'.$result['id'].'">تحميل</a>
                                                </div>';
                                    }
                                     echo '</div>';    
                                } 
                                ?>
                                    
                                    <div class="col-xs-12 r-message-textarea">
                                        <p class="p-text-area">
                                            اضغط هنا للرد
                                            <a href="<?php echo base_url().'Emails/inbox/reply/'.$result['id'].'' ?>">الرد</a> او
                                            <a href="<?php echo base_url().'Emails/inbox/forward/'.$result['id'].'' ?>">إعاده توجية</a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    