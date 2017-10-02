

   <div class="col-sm-11 col-xs-12"> 
         
  <?php $this->load->view('admin/finance_accounting/sandat_qabd_tabs'); ?>


     

<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span> 
    
    
      <div class="col-md-12">
    <?php $array_paid_typy=array('','نقدي','تحويل بنكي','شيك');?>
<!-------------------------------------------------------------------------------------->  
<?php   if(isset($deposit_sheck)&&$deposit_sheck!=null):?>
<table class="table table-bordered table-hover table-striped hidden-print" style="direction: rtl;">
				<thead>
    		      <tr> 
                    <th style="text-align: right;" width="">المسلسل </th>
                    <th style="text-align: right;" width="">رقم السند</th>
                    <th style="text-align: right;" width="">إسم البنك</th> 
                    <th style="text-align: right;" width="">الإجراء </th>
                    <th style="text-align: right;" width="">التفاصيل </th>
                 </tr>    
    		   </thead>    
    	   	<tbody>
         <?php $x=1; foreach($deposit_sheck as $row):?>   
         <tr>
         <td><?php echo $x++?></td>
         <td><?php echo $row->vouch_num;?></td>
         <td><?php echo $account_group[$row->maden]->name?></td>
         <td>
          <button type="button" class="btn btn-sm btn-success "  onClick="return go(<?php echo $row->vouch_num?>);" >
                   <span class="glyphicon glyphicon-envelope"></span> إيداع بالبنك </button>
         </td>
         <td>
         <button type="button" class="btn btn-sm btn-info " data-toggle="modal" 
         data-target="#myMooodal<?php echo $row->vouch_num?>">
                   <span class="glyphicon glyphicon-plus"></span> التفاصيل </button>
         
         </td>
         </tr>   
         
           <?php endforeach;?>
            </tbody></table>

<div id="optionearea3"></div>

 </div>

   <?php else :?>
   
   
 <div class="alert alert-danger" >
     لا توجد شيكات للإيداع
          </div>
<?php endif ;?>         

   

<!-----------------  التفاصيل ---------------------------------------------------->
<?php include($details_page.'.php');?>
  
<script>
  function go(values)
    {
        if(values)
        {
            var type=4;
            var dataString = 'vouch_num=' + values ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>admin/finance_accounting/kabd_deport_sheck',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea3').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea3').html('');
            return false;
        }
    }
</script>

    
    
    
    
</script>
               
            
            
            
            