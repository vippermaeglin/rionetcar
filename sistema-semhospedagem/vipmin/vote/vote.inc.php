<?php
function mcurrent_vote($selector='index'){
	$a = array(
		'/vipmin/vote/index.php' => 'Home',
		'/vipmin/vote/feedback.php' => 'Feedback',
		'/vipmin/vote/question.php' => 'Questions',
	);
	$l = "/vipmin/vote/{$selector}.php";
	return current_link($l,$a,true);
}
