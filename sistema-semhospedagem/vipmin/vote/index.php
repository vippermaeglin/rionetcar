<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();		//Need to be admin
need_auth('admin');

$daytime = strtotime(date('d-m-Y'));

require_once('vote.inc.php');

//Today, visitors surveyed
$vote_feedback_today_count = Table::Count('vote_feedback', array(
	"addtime > {$daytime}",
));

//All people surveyed
$vote_feedback_all_count = Table::Count('vote_feedback');

//Is the number of survey questions
$vote_question_show_count =  Table::Count('vote_question', array(
	"is_show = 1",
));

//The number of all survey questions
$vote_question_all_count = Table::Count('vote_question');

include template('manage_vote_index');
