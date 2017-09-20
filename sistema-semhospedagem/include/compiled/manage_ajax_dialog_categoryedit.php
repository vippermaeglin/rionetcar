<style>
 
#dialog {
 
    left: 188.5px;
    top: 166.35px;
    
}

</style>
<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script> 
<script type="text/javascript">
	tinyMCE.init({
		// General options
    language : "pt",
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,


		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
	// content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
    file_browser_callback : "tinyBrowser",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:868px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">fechar</span><?php echo $category?'Editar':'Nova'; ?> <?php echo $zone[1]; ?></h3>
	<div style="overflow-x:hidden;padding:10px;">
	<p>Categoria: Requer classificação unica</p>
<form method="post" action="/vipmin/category/edit.php" class="validator">
	<input type="hidden" name="id" value="<?php echo $category['id']; ?>" />
	<input type="hidden" name="zone" value="<?php echo $zone[0]; ?>" />
	<table width="96%" class="coupons-table">
		<tr><td width="80" nowrap><b>Nome:</b></td><td><input type="text" name="name" value="<?php echo $category['name']; ?>" require="true" datatype="require" class="f-input" /></td></tr>
		<tr><td nowrap><b>Repita o nome:</b></td><td><input type="text" name="ename" value="<?php echo $category['ename']; ?>" require="true" datatype="english" class="f-input" style="text-transform:lowercase;" /></td></tr>
		<tr style="display:none;"><td nowrap><b>Primeira letra:</b></td><td><input type="text" name="letter" value="<?php echo $category['letter']; ?>" maxLength="1" require="true" datatype="english" class="f-input" style="text-transform:uppercase;" /></td></tr>
		<tr style="display:none;"><td nowrap><b>Categoria:</b></td><td><input type="text" name="czone" value="<?php echo $category['czone']; ?>" class="f-input" /></td></tr>
		<tr><td nowrap><b>Mostrar(Y/N):</b></td><td><input type="text" name="display" value="<?php echo $category['display']; ?>" class="f-input" style="text-transform:uppercase;"/>
		<span style="font-size: 12px; color:#303030;"> Se for 'N' esta categoria não irá aparecer no menu de navegação, porém, isso pode ser útil, caso você queira criar uma categoria apenas para agrupar ofertas de um mesmo tipo, por ex: máquinas digitais e associar a um banner <a href="/vipmin/system/bulletin.php">Clique aqui</a> para criar um banner</span>
						
		</td></tr>
		<tr><td nowrap><b>Ordernar (descendente):</b></td><td>
		<input type="text" name="sort_order" value="<?php echo intval($category['sort_order']); ?>" class="f-input" />
		<span style="font-size: 12px; color:#303030;"> Ex: categoria de ordem 10 ficará na frente da categoria de ordem 9</span>
		</td></tr>
		<tr><td colspan="2"> Banner da categoria  
		<span style="font-size: 12px; color:#303030;">  -  Este banner irá aparecer somente quando o usuário clicar nesta categoria </span><br>
		<span style="font-size: 12px; color:#303030;"> Para inserir o banner clique no ícone <img src="/media/css/i/imagemupload.jpg"> e depois no ícone <img src="/media/css/i/imagemprocurar.jpg"> a primeira aba que aparece é a listagem de todas as imagens enviadas, clique a aba upload para enviar uma nova </span>
		<br><span style="font-size: 12px; color:#303030;">Dimensão ideal 941px de largura por 140px de altura, você também pode colocar um código html clicando no ícone HTML</span>
		</td></tr>
		<tr><td colspan="2">
			<textarea cols="45" rows="5" name="bannercategoria" id="bannercategoria" class="f-textarea editor"><?=$category['bannercategoria']?></textarea> <span class="inputtip"></span>
		</td></tr>
		<tr><td colspan="2" height="10">&nbsp;</td></tr>
		<tr><td></td><td><input type="submit" value="salvar" class="formbutton" /></td></tr>
	</table>
</form>
	</div>
</div>
