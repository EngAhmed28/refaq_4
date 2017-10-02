<?php

if(!empty($get_data)):?>
 <input name="amount"  type="hidden" id="amount" value="<? echo $get_data[0]->amount?>"/>
    <input name="desc" type="hidden" id="desc" value="<? echo $get_data[0]->description?>"/>

<script>
  $('#guaranty_amount').val($("#amount").val());
  $('#guaranty_note').val($("#desc").val());
</script>
<?php endif;?>