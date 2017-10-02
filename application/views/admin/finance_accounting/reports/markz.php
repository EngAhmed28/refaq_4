


   <div class="col-sm-11 col-xs-12">

   

	<?php $this->load->view('admin/finance_accounting/reports_tabs'); ?>


<?php if(isset($table)):?>
 <?php $array_types=array('-','أصول','خصوم','مصروفات','إرادات');?>
<table  id="no-more-tables" class="table table-bordered text-right" role="table">
  <thead>
    <tr>
	  <th class="text-right"> كود الحساب</th>
      <th class="text-right">إسم الحساب</th>
     
       <th class="text-right">دائن</th> 
     <th class="text-right">مدين</th> 
      <th class="text-right">قيمة الحساب</th>
	</tr>
  </thead>
<tbody>
  <?php foreach($table as $record=>$value):?>
  <tr>
   <td class="text-right"><?php echo $table[$record]->code ?></td>
   <td class="text-right"><?php echo $table[$record]->name ?></td>
  
  <?php
     $p_cost_maden = 0;
   $query = $this->db->query('SELECT * FROM all_deports where madeen = '.$table[$record]->code);
    foreach ($query->result() as $row)
    {
         $p_cost_maden += $row->p_cost;  
    }
     $p_cost_maden; 
    
    
     $p_cost_dayen = 0;
   $query = $this->db->query('SELECT * FROM all_deports where dayen = '.$table[$record]->code);
    foreach ($query->result() as $row)
    {
         $p_cost_dayen += $row->p_cost;  
    }
     $p_cost_dayen;  
    
    
  
  ?>
  
   <td class="text-right"><?= $p_cost_maden ?></td> 
     <td class="text-right"><?= $p_cost_dayen ?></td> 
   <td class="text-right">
   
   
   <?php
   

    
   echo $total = $p_cost_maden - $p_cost_dayen;
    
    
   ?>
   
   
   
   
   
   </td>
  </tr>
  <?php endforeach?>
</tbody>
</table>


</div>

<?php endif?>
<style>
.btn-mobileSelect-gen {
display:none!important;
}

#branch {
display:block!important;
}

</style>
<script type="text/javascript">
    $('.selectpicker').selectpicker({
      });
    </script>
  <style>

.bootstrap-select{
    width: 100% !important;
}

</style>
<script>
    function get_code(code_post){

  if(code_post != 'nothing'){
      var dataString = 'code_post='+ code_post ;
      $.ajax({
          type:'post',
          url: '<?php echo base_url() ?>/dashboard/add_level',
          data:dataString,
          dataType: 'html',
          cache:false,
          success: function(html){
              $("#optionearea1").html(html);
          }
      });
  }

    }
</script>
<script>
    function get_rased(rased){

          var dataString = 'rased='+ rased ;
          $.ajax({
              type:'post',
              url: '<?php echo base_url() ?>/dashboard/add_level',
              data:dataString,
              dataType: 'html',
              cache:false,
              success: function(html){
                  $("#optionearea2").html(html);
              }
          });
    }
</script>





  
  
  
  