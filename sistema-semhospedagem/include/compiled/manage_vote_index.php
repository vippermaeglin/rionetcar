<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="help">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_vote('index'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>home </h2>
				</div>
                <div class="sect">
					<div class="wholetip clear"><h3>Informações de retorno</h3></div>
					<div style="margin:0 20px;">
						<p>Pessoas que responderam a pesquisa hoje：<?php echo $vote_feedback_today_count; ?></p>
						<p>Número total de pessoas pesquisadas：<?php echo $vote_feedback_all_count; ?></p>
					</div>

					<div class="wholetip clear"><h3>Informações sobre as questões</h3></div>
					<div style="margin:0 20px;">
						<p>Número de questões respondidas：<?php echo $vote_question_show_count; ?></p>
						<p>Número de questões respondidas em todas as pesquisas：<?php echo $vote_question_all_count; ?></p>
					</div>
				</div>
			</div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
