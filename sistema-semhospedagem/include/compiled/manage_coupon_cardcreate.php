<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_coupon('cardcreate'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>Novo cupom</h2>
				</div>
                <div class="sect">
                    <form id="login-user-form" method="post" class="validator">
					<input type="hidden" name="id" value="<?php echo $card['id']; ?>" />
                        <div class="field">
                            <label>ID do Parceiro</label>
                            <input type="text" size="30" name="partner_id" id="card-create-partner" class="number" value="<?php echo abs(intval($card['partner_id'])); ?>" require="true" datatype="number" /><span class="inputtip">O ID do parceiro pode ser copiado do menu Parceiro.</span>
							<span class="hint">0 - significa aplicavel a todos os parceiros.</span>
                        </div>
                        <div class="field">
                            <label>Valor do cupom</label>
                            <input type="text" size="30" name="money" id="card-create-money" class="number" value="<?php echo $card['money']; ?>" datatype="number" require="true" /><span class="inputtip">Valores em <?php echo $currency; ?></span>
                        </div>
                        <div class="field">
                            <label>Quantidade</label>
                            <input type="text" size="30" name="quantity" id="card-create-quantity" class="number" value="<?php echo abs(intval($card['quantity'])); ?>" datatype="number" require="true" /><span class="inputtip"> máximo: 1000 cupons. Esta operação pode ser repetida.</span>
                        </div>
                        <div class="field">
                            <label>Inicio</label>
                            <input type="text" size="30" name="begin_time" id="card-create-begintine" class="number" value="<?php echo date('d-m-Y', $card['begin_time']); ?>" datatype="date" require="true" />
						</div>
                        <div class="field">
                            <label>Expira em</label>
                            <input type="text" size="30" name="end_time" id="card-create-endtime" class="number" value="<?php echo date('d-m-Y', $card['end_time']); ?>" datatype="date" require="true" />
						</div>
                        <div class="field">
                            <label>Simbolo</label>
                            <input type="text" size="30" name="code" id="card-create-code" class="number" value="<?php echo $card['code']; ?>" datatype="require" require="true" /><span class="inputtip">Para maior comodidade do registro e contabilidade.</span>
                        </div>
                        <div class="act">
                            <input type="submit" value="salvar" name="commit" id="partner-submit" class="formbutton"/>
                        </div>
					</form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

<div id="sidebar">
</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->


