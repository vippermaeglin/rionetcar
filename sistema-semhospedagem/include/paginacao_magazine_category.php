<?php

require_once(dirname(dirname(__FILE__)). '/app.php');

/* É verificado a quantidade de resultados que são retornados do banco, para criar a paginação. */
$sql = "select title, subtitle, image_cover from magazine_article where id_category = " . $idcategoria . " and status = 'Y'";
$rsp = mysql_query($sql);
$count = mysql_num_rows($rsp);
$pages = ceil($count/$per_page);

?>
<div style="text-align:center;">
 
  <div id="paging_category" style="text-align:center;margin-top:50px;">
    <ul>
 
    <?php
    //Show page links
    for($i=1; $i<=$pages; $i++)
    {
    ?>
		<li><a href="<?php echo $ROOTHPATH; ?>/index.php?idcategoria=<?php echo $idcategoria; ?>&pagination=<?php echo $i; ?>"><?php echo $i; ?></a></li>
	<?php
    }
	?>
 
    </ul>
  </div>
</div>