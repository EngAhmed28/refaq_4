<style>
/*********** upload malti img ****/

.block {
    background-color: rgba(255, 255, 255, 0.5);
    margin: 0 auto;
    margin-bottom: 30px;
    text-align: center;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

label.button {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    background-color: #c72530;
    border: 1px solid #eee;
    color: #fff;
    padding: 7px 15px;
    margin: 5px 0;
    display: inline-block;
    -webkit-transition: all 200ms linear;
    -moz-transition: all 200ms linear;
    -ms-transition: all 200ms linear;
    -o-transition: all 200ms linear;
    transition: all 200ms linear;
}

label.button:hover {
    color: #c72530;
    background-color: #fff;
    border: 1px solid #ccc;
    cursor: pointer;
    -webkit-transition: all 200ms linear;
    -moz-transition: all 200ms linear;
    -ms-transition: all 200ms linear;
    -o-transition: all 200ms linear;
    transition: all 200ms linear;
}

input#images {
    display: none;
}

#multiple-file-preview {
    border: 1px solid #eee;
    margin-top: 10px;
    padding: 10px;
}

#files1 {
    border: 1px solid #eee;
    margin-top: 10px;
    padding: 10px;
}

#sortable {
    list-style-type: none;
    margin: 0;
    padding: 0;
    min-height: 110px;
}

#sortable li {
    margin: 3px 3px 3px 0;
    float: left;
    width: 100px;
    height: 104px;
    text-align: center;
    position: relative;
    background-color: #FFFFFF;
}

#sortable li,
#sortable li img {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

#sortable img {
    height: 104px;
}

.closebtn {   
    color: #c72530;
    font-weight: bold;
    position: absolute;
    right: -1px;
    border-radius: 4px;
    padding: 0px 5px 0px 5px;
    background-color: #fff;
}
.closebtn h6{
    font-size: 20px;
    margin: 0;
    
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

</style> 
<?php 
if(isset($result) && $result != null){
    $id = $result['id'];
    $forward = '';
    
    if(is_numeric($result['email_to']))
        $int = $users[$result['email_to']]->user_name;
    else
        $int = $result['email_to'];
    if($type == 'forward')
        $forward = '<b>---------- رسالة موجهه ----------<br>
                    من: '.$users[$result['email_from']]->user_name.'<br>
                    التاريخ: '.date("S, M d, Y at H:i A",$result['date_s']).'<br>
                    العنوان: '.$result['title'].'<br>
                    إلى: '.$int.'
                    </b><br><br>'.$result['content'].'';
    if($type == 'reply')
        $forward = '<br><div style="color: blue; background-color: ghostwhite;">'.$result['content'].'</div>';
    
    if($result['sent'] == 1 && ($result['file_attached'] == 1)){//($result['reply'] == 1 || $result['forward'] == 1)
        $this->db->select('*');
        $this->db->from('email_family_files');
        $array = array('email_id'=>$result['id']);
        $this->db->where($array);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $files[$row->id] = $row;
            }
        }
    }
}
else
    $id = 0;
    
$this->load->view('admin/email_family/main_tabs'); 
echo form_open_multipart('Emails_family/inbox/'.$type.'/'.$id.'',array('class'=>"myform",'id'=>'fileupload'))
?>
<input type="hidden" name="page_type" id="page_type" value="<?php echo $type ?>" />
<input type="hidden" name="page_id" id="page_id" value="<?php echo $id ?>" />
                        <div class="col-sm-10 r-message-left">
                            <h3> <span class="r-add-mes"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </span>إنشاء بريد جديد </h3>      
                            <select class="selectpicker" id="email_to" name="email_to[]" multiple data-actions-box="true" data-size="10" data-width="auto" data-live-search="true" title="إلى :" required>
                              <?php
                                if(isset($fetch_users))
                                    for ($i=0; $i < count($fetch_users) ; $i++) { 
                                        for ($x=0; $x < count($fetch_users[key($fetch_users)]) ; $x++){
                                            echo'<optgroup label="'.$allDep[key($fetch_users[key($fetch_users)])]->name.'">';
                                            for ($z=0; $z < count($fetch_users[key($fetch_users)][key($fetch_users[key($fetch_users)])]) ; $z++){
                                                $selected = '';
                                                if($fetch_users[key($fetch_users)][key($fetch_users[key($fetch_users)])][$z]->user_id == $_SESSION['user_id'])
                                                    continue;
                                                    
                                                if($type == 'reply')
                                                    if($result['email_from'] == $fetch_users[key($fetch_users)][key($fetch_users[key($fetch_users)])][$z]->user_id)
                                                        $selected = 'selected';
                                                        
                                                $subtext = 'data-subtext=" -- '.$allDep[$fetch_users[key($fetch_users)][key($fetch_users[key($fetch_users)])][$z]->dep_job_id_fk]->name.' -- "';
                                                
                                                echo'<option '.$subtext.' value="'.$fetch_users[key($fetch_users)][key($fetch_users[key($fetch_users)])][$z]->user_id.'" '.$selected.'>'.$fetch_users[key($fetch_users)][key($fetch_users[key($fetch_users)])][$z]->user_username.'</option>';
                                            }
                                            echo'</optgroup>';
                                            next($fetch_users[key($fetch_users)]);
                                        }
                                        next($fetch_users);
                                    }
                              ?>
                            </select>
                            <br /><br />
                            
                            <input type="text" value="<?php if(isset($result)) echo $result['title'] ?>" id="title" name="title" placeholder="الموضوع  :" required />
                            
                            
                            <div class="adjoined-bottom">
                                <div class="grid-container">
                                    <div class="grid-width-100">
                                        <textarea class="r-textarea" id="editor" name="content" required="required" >
                                        <?php 
                                        if(isset($result))
                                            echo $forward;
                                        ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 r-img-message">
                                <?php 
                                if(isset($result))
                                    if($result['file_attached'] == 1){
                                        echo '<h3><span><i class="fa fa-paperclip" aria-hidden="true"></i>
                                                </span> الملفات <span> ( '.count($files).' )</span></h3>
                                                <div class="col-xs-12">';
                                        foreach($files as $file){
                                            echo '<div class="col-md-2 col-sm-3 col-xs-4">
                                                        <a href="'.base_url().'Emails/downloads/'.$file->file_name.'/'.$result['id'].'"><img src="'.base_url().'uploads/images/'.$file->file_name.'" alt=""></a>
                                                    </div>';
                                        }
                                         echo '</div>';    
                                    }
                                ?>

                                </div>
                            
                            <br />
                            
                            <h3 style="padding-bottom: 0px; "> <span class="r-add-mes"><i class="fa fa-link" aria-hidden="true"></i>
                                    </span>إرفاق ملفات </h3>
                            
                            <div class="block col-xs-12">
                                    <div id="files1" class="col-xs-12 files">
                                        <ul id="sortable" class="fileList">
                                        <?php
                                        /*if(isset($result)){
                                            $i = 1;
                                            foreach($files as $file){
                                                //var_dump(filemtime(''.base_url().'uploads/images/'.$file->file_name.''));die;
                                                echo '<li class="ui-state-default" data-order=0 data-id="'.($result['date_s']+$i).'">
                                                        <img src="'.base_url().'uploads/images/'.$file->file_name.'" style="width:100%;"/><span class="removeFile closebtn" style="cursor: pointer" data-fileid="files1'.$i.'"><h6>x</h6></span>
                                                        </li>';
                                                $i++;
                                            }
                                        }*/
                                        ?>
                                        </ul>
                                        
                                    <label class="button" for="images"> رفع ملفات</label>
                                    <input type="file" id="images" name="files1" multiple="multiple" />
                                            
                                    </div>
                                    </div>
            
                            <div class="col-xs-2">
                                <input type="hidden" name="send" value="1" />
                                <button type="button" style="height: 35px;width: 78px;" id="uploadBtn" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> إرسال</button>
                            </div>
                            
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    