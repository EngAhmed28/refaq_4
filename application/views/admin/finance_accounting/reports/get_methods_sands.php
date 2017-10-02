<?php

$method =$_POST['method'];
if($method){
       foreach($box_tables as $row):
           $query =$this->db->query('SELECT * FROM '.$box_table[3]->name.' WHERE `from_id`='.$row->id);
           $arr=array();
           foreach ($query->result() as  $row2) {
               $arr[] =$row2;
           }
endforeach;
//==================================================================== //condition 1
if($method==1) {

    echo' <div class="col-sm-6">
         <div class="form-group">
          <label for="inputUser" class="col-lg-3 control-label">طريقة الدفع</label>
          <div class="col-lg-12 input-grup">
        <select name="vouch_type" id="vouch_type" onchange="return rent($(\'#vouch_type\').val());" class="form-control " >
                          <option value="">قم بإختيار طريقة الدفع</option>';

    if($method==1){
        echo ' <option value="1" selected="selected">نقدي</option>
                          
                        <option value="2" >تحويل بنكي</option>
                          
                          <option value="3" >شيك</option>';
    }elseif($method==2){

        echo ' <option value="1" >نقدي</option>
                          
                          <option value="2" selected="selected">اجل</option>
                          
                          <option value="3" >شيك</option>';

    }elseif($method==3){

        echo ' <option value="1" >نقدي</option>
                          
                          <option value="2" >تحويل بنكي</option>
                          
                          <option value="3" selected="selected">شيك</option>';

    }

    echo '</select> </div></div></div>';



    echo'            <div class="col-sm-6">
         <div class="form-group">
           <label for="inputUser" class="col-lg-3 control-label">إسم الصندوق</label>
           <div class="col-lg-12 input-grup">
                 <select name="box_name"  id="box_name" required class="form-control btn-success"  >
            <option value="">قم باختيار إسم الصندوق  </option>
            ';
             if(isset($all_boxs)&&$all_boxs!=null):
 foreach($all_boxs as $row)
    {
        echo '<option value="'.$row->code.'">'.$row->name.'</option>';
    }
endif;
    echo'    
            </select></div></div> </div><br/><br/> <br/> <br/>';
//==============================================================//condition 2
}
elseif($method==2){

    echo'     <div class="col-sm-3">
         <div class="form-group">
  	          <label for="inputUser" class="col-lg-6 control-label">طريقة الدفع</label>
              <div class="col-lg-12 input-grup">
  	          <select name="vouch_type" id="vouch_type" onchange="return rent($(\'#vouch_type\').val());" class=" form-control" >
				        
             <option value="">قم بإختيار طريقة الدفع</option>';

    if($method==1){
        echo ' <option value="1" selected="selected">نقدي</option>
                          
                         <option value="2" >تحويل بنكي</option>
                          
                          <option value="3" >شيك</option>';
    }elseif($method==2){

        echo ' <option value="1" >نقدي</option>
                          
                          <option value="2" selected="selected">تحويل بنكي</option>
                          
                          <option value="3" >شيك</option>';

    }elseif($method==3){

        echo ' <option value="1" >نقدي</option>
                          
                           <option value="2" >تحويل بنكي</option>
                          
                          <option value="3" selected="selected">شيك</option>';

    }

    echo '</select></div></div></div>';



    echo ' <div class="col-sm-3" >
         <div class="form-group">
           <label for="inputUser" class="col-lg-6 control-label"> إسم البنك </label>
           <div class="col-lg-12 input-grup">
                   <select name="bank_name"  id="bank_name" class="form-control btn-success" required > 
            <option value="">قم باختيار إسم البنك  </option> ';
         if(isset($all_banks)&&$all_banks!=null):
 foreach($all_banks as $row)
    {
        echo '<option value="'.$row->code.'">'.$row->name.'</option>';
    }
endif;

    echo '  </select></div></div></div>
              
                 <div class="col-sm-3" >
         <div class="form-group">
          <label for="inputUser" class="col-lg-6 control-label"> رقم الشيك </label>
          <div class="col-lg-12 input-grup">
                    <input type="number" required name="check_num" id="check_num"  placeholder="رقم الشيك"   class="form-control">
               </div></div> </div>
                      
                 <div class="col-sm-3" >
         <div class="form-group">
          <label for="inputUser" class="col-lg-6 control-label"> تاريخ الإيداع</label>
          <div class="col-lg-12 input-grup">
                    <input type="date" required name="recive_date" id="recive_date" class="form-control btn-warning">
          </div></div> </div>    ';

//==============================================================================================
}elseif($method==3){

    echo'  <div class="col-sm-3">
         <div class="form-group">
          <label for="inputUser" class="col-lg-6 control-label">طريقة الدفع</label>
          <div class="col-lg-12 input-grup">
     <select name="vouch_type" id="vouch_type" onchange="return rent($(\'#vouch_type\').val());" class=" form-control" >
				        
                          <option value="">قم بإختيار طريقة الدفع</option>';

    if($method==1){
        echo ' <option value="1" selected="selected">نقدي</option>
                          
                           <option value="2" >تحويل بنكي</option>
                          
                          <option value="3" >شيك</option>';
    }elseif($method==2){

        echo ' <option value="1" >نقدي</option>
                          
                          <option value="2" selected="selected">تحويل بنكي</option>
                          
                          <option value="3" >شيك</option>';

    }elseif($method==3){

        echo ' <option value="1" >نقدي</option>
                          
                            <option value="2" >تحويل بنكي</option>
                          
                          <option value="3" selected="selected">شيك</option>';

    }

    echo '</select></div></div></div>';




    echo '<div class="col-sm-3">
         <div class="form-group"  >
           <label for="inputUser" class="col-lg-6 control-label"> إسم البنك </label>
           <div class="col-lg-12 input-grup">
                   <select name="bank_name"  id="bank_name" class="form-control btn-success" required > 
            <option value="">قم باختيار إسم البنك  </option> ';
    if(isset($all_banks)&&$all_banks!=null):
 foreach($all_banks as $row)
    {
        echo '<option value="'.$row->code.'">'.$row->name.'</option>';
    }
endif;

    echo '  </select></div></div></div>
              
                 <div class="col-sm-3">
         <div class="form-group">
          <label for="inputUser" class="col-lg-6 control-label"> رقم الشيك </label>
          <div class="col-lg-12 input-grup">
                    <input type="number" required name="check_num" id="check_num" placeholder="رقم الشيك"   class="form-control">
               </div></div> </div>
                      
                 <div class="col-sm-3" >
         <div class="form-group">
          <label for="inputUser" class="col-lg-7 control-label"> تاريخ الاستحقاق</label>
          <div class="col-lg-12 input-grup">
                    <input type="date" required name="recive_date"  id="recive_date" class="form-control">
          </div></div>  </div>   ';


}
//============================================================================================== // end condition 3
}else{
    echo'  <div class="col-sm-12">
         <div class="form-group">
                  <label for="inputUser" class=" control-label">طريقة الدفع</label>
                	   <select name="vouch_type" id="vouch_type" onchange="return rent($(\'#vouch_type\').val());" class="form-control" >
											<option value="">قم بإختيار طريقة الدفع</option>
                                            
                                         
                                         <option value="1" >نقدي</option>
                                          <option value="2" >تحويل بنكي</option>
                                            <option value="3" >شيك</option>
                 </select>
              </div></div>
               ';


}

?>

