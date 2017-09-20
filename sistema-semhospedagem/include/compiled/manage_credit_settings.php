<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_credit('settings'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>normas de crédito</h2></div>
                <div class="sect">
                    <form method="post">
						<div class="wholetip clear"><h3>1. as regras basicas</h3></div>
						<input type="hidden" name="action" value="settings" />
                        <div class="field">
                            <label>Registration</label>
                            <input type="text" size="30" name="credit[register]" class="number" value="<?php echo $INI['credit']['register']; ?>"/>
                            <label>User login</label>
                            <input type="text" size="30" name="credit[login]" class="number" value="<?php echo $INI['credit']['login']; ?>"/>
						</div>
                        <div class="field">
                            <label>Invitation</label>
                            <input type="text" size="30" name="credit[invite]" class="number" value="<?php echo $INI['credit']['invite']; ?>"/>
                            <label>Buy goods</label>
                            <input type="text" size="30" name="credit[buy]" class="number" value="<?php echo $INI['credit']['buy']; ?>"/>
                        </div>
                        <div class="field">
                            <label>Pay & credit</label>
                            <input type="text" size="30" name="credit[pay]" class="number" value="<?php echo $INI['credit']['pay']; ?>"/>
                            <label>topup & credit</label>
                            <input type="text" size="30" name="credit[charge]" class="number" value="<?php echo $INI['credit']['charge']; ?>"/>
							<span class="hint">Ao comprar ou topuping online, você poderá obter crédito de acordo com a soma do seu pagamento</span>
                        </div>
						<div class="act">
                            <input type="submit" value="Save" name="commit" class="formbutton" />
                        </div>
                    </form>

                    <form method="post">
						<div class="wholetip clear"><h3>1、User credit topup</h3></div>
						<input type="hidden" name="action" value="charge" />
                        <div class="field">
                            <label>username</label>
                            <input type="text" size="30" name="username" class="number" value="0"/>
                            <label>topup credits</label>
                            <input type="text" size="30" name="credit" class="number" value="0"/>
                            <input type="submit" value="Topup" name="commit" class="formbutton" />
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


