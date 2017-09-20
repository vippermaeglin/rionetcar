<script src="http://malsup.github.com/jquery.form.js"></script> 
<div title="Alterar Imagem" id="alterar-imagem">
	<center>
		<form id="form-upload" enctype="multipart/form-data" method="POST" action="uploadimagens.php">
			<input type="file" name="img_nova" id="img_nova" />
			<input type="hidden" name="img_original" id="img_original" />
			<br /><br />
			<input type="submit" value="Enviar Nova Imagem" id="enviar" />
		</form>
	</center>
	<script type="text/javascript">
		$(function(){
			$('#form-upload').ajaxForm({
				success: function(){
					$('#img_nova').val('');
					var img_original = $('#img_original', '#form-upload').val();
					$.post('getimg.php', {img:img_original}, function(data) {
						var elem = 'td[name="'+img_original+'"] img';
						var elem2 = 'td[name="'+img_original+'"]';
						$(elem2).append('<br /> <small>Imagem Alterada Recarregue a tela!</small>');
						$('#alterar-imagem').dialog('close');
					});
				}
			});
		});
	</script>
</div>