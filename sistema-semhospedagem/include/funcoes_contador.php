<script type="text/javascript">

function trocaButton() {
	msg_oferta_expirada = '<span style="text-decoration: none; color: white; font-weight: bold; font-size: 10pt">Não perca a próxima! Assine já!</span>';
	$('#defaultCountdown').html(msg_oferta_expirada);
}

jQuery(document).ready(function() {

	jQuery('#defaultCountdown').countdown({
		until: '<? echo $left_day; ?>d<? echo $left_hour; ?>h<? echo $left_minute; ?>m<? echo $left_time; ?>s',
		format: 'hms',
		layout: '<table style="margin-left:30px;" width="85%" border="0"><tr> <td width="248" class="txt4">{hn}</td> <td width="242" class="txt4">{mn}</td>        <td width="211" class="txt4">{sn}</td>      </tr>          <tr>        <td width="248"  class="txt15"></td>        <td width="242"   class="txt15"></td>        <td width="211"   class="txt15"></td>      </tr> </table>',
		onExpiry: trocaButton
	});
});
	 

</script>