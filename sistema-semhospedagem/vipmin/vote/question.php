<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();		//have to be admin
need_auth('admin');

$daytime = strtotime(date('d-m-Y'));

require_once('vote.inc.php');

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'list-is_show-1';

//List
if ($action == 'list-all' || $action == 'list-is_show-1') {
	$condition = array();
	if ($action == 'list-is_show-1') {
		$condition[] = "`is_show` = 1";
	}

	$count = Table::Count('vote_question', $condition);
	list($pagesize, $offset, $pagestring) = pagestring($count, 20);

	$question_list = DB::LimitQuery('vote_question', array(
		'condition' => $condition,
		'order' => 'ORDER BY `order` ASC',
		'size' => $pagesize,
		'offset' => $offset,
	));

	include template('manage_vote_question_list');
	exit;

//Change the status hidden
} elseif ($action == 'change_show') {
	$question['id'] = isset($_GET['id']) ? $_GET['id'] : '0';
	$question['is_show'] = isset($_GET['value'])&&$_GET['value'] ? 1 : 0;

	$question_check = Table::Count('vote_question', array(
		"id = '{$question['id']}'",
	));
	if (!$question_check) {
		Session::Set('error', 'This question does not exist, please add.');
		redirect( WEB_ROOT . '/vipmin/vote/question.php?action=add');
		exit;
	}

	$table = new Table('vote_question', $question);
	$up_array = array('is_show');
	$flag = $table->update( $up_array );
	if ( $flag ) {
		Session::Set('notice', 'Modified');
	} else {
		Session::Set('error', 'Failed to modify');
	}

	redirect( WEB_ROOT . '/vipmin/vote/question.php?action=list-all');
	exit;

//??
} elseif ($action == 'del') {
	$question['id'] = isset($_GET['id']) ? $_GET['id'] : '0';

	$flag = Table::Delete('vote_question', $question['id']);
	if ( $flag ) {
		Session::Set('notice', 'Deleted successfully');
	} else {
		Session::Set('error', 'Falha na exclusão');
	}

	redirect( WEB_ROOT . '/vipmin/vote/question.php?action=list-all');
	exit;


//Edit question
} elseif ($action == 'edit') {
	$id = isset($_GET['id'])&&is_numeric($_GET['id']) ? $_GET['id'] : 0;

	$question = Table::Fetch('vote_question', $id);
	if (!$question) {
		Session::Set('error', 'This question does not exist, please add.');
		redirect( WEB_ROOT . '/vipmin/vote/question.php?action=add');
		exit;
	}

	include template('manage_vote_question_edit');
	exit;


//Edit a question, submit data
} elseif ($action == 'edit_submit') {
	$question['id'] = isset($_POST['question']['id']) ? $_POST['question']['id'] : '0';
	$question['title'] = isset($_POST['question']['title']) ? addslashes(htmlspecialchars($_POST['question']['title'])) : '';
	$question['type'] = isset($_POST['question']['type']) && $_POST['question']['type']=='radio' ? 'radio' : 'checkbox';
	$question['is_show'] = isset($_POST['question']['is_show']) && $_POST['question']['is_show'] ? 1 : 0;
	$question['order'] = isset($_POST['question']['order'])&&is_numeric($_POST['question']['order']) ? $_POST['question']['order'] : '0';

	$question_check = Table::Count('vote_question', array(
		"id = '{$question['id']}'",
	));
	if (!$question_check) {
		Session::Set('error', 'This question does not exist, please add.');
		redirect( WEB_ROOT . '/vipmin/vote/question.php?action=add');
		exit;
	}

	$title_check = Table::Count('vote_question', array(
		"id != '{$question['id']}' AND `title` = '{$question['title']}'",
	));
	if ($title_check) {
		Session::Set('error', '“'.$question['title'].'“Already exists, for a title');
		redirect( WEB_ROOT . '/vipmin/vote/question.php?action=edit&id='.$question['id']);
		exit;
	}

	$table = new Table('vote_question', $question);
	$up_array = array(
			'title', 'type', 'is_show', 'order',
			);
	$flag = $table->update( $up_array );
	if ( $flag ) {
		Session::Set('notice', 'The question of amending the success');
	} else {
		Session::Set('error', 'Failed to modify the question');
	}

	redirect( WEB_ROOT . '/vipmin/vote/question.php?action=edit&id=' . $question['id']);
	exit;


} elseif ($action == 'add') {
	$question['type'] = 'radio';
	$question['is_show'] = 1;
	$question['order'] = 0;
	include template('manage_vote_question_edit');
	exit;

//Add problem, data processing
} elseif ($action == 'add_submit') {
	$question['title'] = isset($_POST['question']['title']) ? addslashes(htmlspecialchars($_POST['question']['title'])) : '';
	$question['type'] = isset($_POST['question']['type']) && $_POST['question']['type']=='radio' ? 'radio' : 'checkbox';
	$question['is_show'] = isset($_POST['question']['is_show']) && $_POST['question']['is_show'] ? 1 : 0;
	$question['order'] = isset($_POST['question']['order'])&&is_numeric($_POST['question']['order']) ? $_POST['question']['order'] : '0';

	$table = new Table('vote_question', $question);

	$title_check = Table::Count('vote_question', array(
		"title = '{$question['title']}'",
	));
	if ($title_check) {
		Session::Set('error', '“'.$question['title'].'”Already exists, for a title.');
		redirect( WEB_ROOT . '/vipmin/vote/question.php?action=add');
		exit;
	}

	$table->addtime = time();
	$table->insert(array(
		'title', 'type', 'is_show', 'addtime', 'order',
	));

	Session::Set('notice', 'Successfully added survey questions');
	redirect( WEB_ROOT . '/vipmin/vote/question.php?action=list-all');
	exit;
}

if ($action == 'add' || $action == 'edit') {
	include template('manage_vote_question_edit');
} else {
	include template('manage_vote_question_list');
}
