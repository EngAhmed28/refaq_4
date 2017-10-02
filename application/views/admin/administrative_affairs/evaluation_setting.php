<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result) && $result!=null && !empty($result)){
                        $out['title']=$result['title'];
                        $out['grade']=$result['grade'];
                        $out['input']='<input type="submit" role="button" name="UPDATE" value="تعديل" class="btn pull-right">';
                        $out['form']='Administrative_affairs/UpdateEvaluationSetting/'.$result['id'];
                    }else{
                        $out['title']='';
                        $out['grade']='';
                        $out['input']='<input type="submit" role="button" name="ADD" value="حفظ" class="btn pull-right">';
                        $out['form']='Administrative_affairs/EvaluationSetting';
                    }
                    ?>
                    <?php  echo form_open_multipart($out['form']);?>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">عنصر التقييم </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text" class="r-inner-h4" name="title" value="<?php echo $out['title'];?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">درجة النهاية العظمى  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="number" class="r-inner-h4" name="grade" value="<?php echo $out['grade'];?>" />
                            </div>
                        </div>
                    </div>



                    <div class="col-xs-12 r-inner-btn">
                        <div class="col-xs-3"> </div>
                        <div class="col-xs-3"><?php echo  $out['input']?></div>
                        <div class="col-xs-2"></div>
                    </div>
                    <?php echo form_close()?>
                </div>
            </div>
            <!---table------>
            <?php if(isset($records)&& $records!=null && !empty($records) ):?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                    <th class="text-center">عنصر التقييم</th>
                                    <th class="text-center">درجة النهاية العظمى</th>
                                    <th class="text-center">الاجراء</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php
                                $a=1;
                                foreach ($records as $record ):?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <td><? echo $record->title;?></td>
                                        <td><? echo $record->grade;?></td>
                                        <td><!-- <a href="<?php  echo base_url().'Administrative_affairs/DeleteEvaluationSetting/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                   <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span>-->  <a href="<?php echo base_url().'Administrative_affairs/UpdateEvaluationSetting/'.$record->id ?>">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                    </tr>
                                    <?php
                                    $a++;
                                endforeach;  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php  endif; ?>
            <!---table------>
        </div>
    </div>
</div>