<?php

require_once(dirname(dirname(__FILE__)). '/app.php');
 
$per_page = 48;
$sql = "select * from partner where tipo='Revenda' tipo='Concessionaria' order by id DESC";
$rsd = mysql_query($sql);

$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

?>
<div style="text-align:center;">
 
  <div id="paging_button" style="text-align:center;">
    <ul>
 
    <?php
    //Show page links
    for($i=1; $i<=$pages; $i++)
    {
      echo '<li id="'.$i.'">'.$i.'</li>';
    }?>
 
    </ul>
  </div>
</div>

<script>
  J("#paging_button li").click(function(){
    showLoader();
    
    J("#paging_button li").css({'background-color' : ''});
    J(this).css({'background-color' : '#D8543A'}); 
    return false;
  });
</script>