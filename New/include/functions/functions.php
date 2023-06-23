<?php

/*
**title function v1.0
**title function that echo the page in case the page
**has the $pagetitle and echo defult for other pages
*/

function gettitle()
{

	global $pagetitle;

	if (isset($pagetitle)) {

		echo $pagetitle;
	} else {
	}
}

/*
**home Redirect function v2.0
**this function accept parameters
**$themsg=echo the message [Error | Success | Warning]
**$url link tou want to redirect to
**$seconds=seconds befor redirecting
*/
function redirectHome($themsg, $url = null, $seconds = 3)
{

	if ($url === null) {

		$url = 'members.php';
		$link = 'Homepage';
	} else {


		if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {

			$url = $_SERVER['HTTP_REFERER'];

			$link = 'previoud page';
		} else {

			$url = 'index.php';
			$link = 'Homepage';
		}
	}

	echo $themsg;

	echo "<div class='alert alert-info'>You Redirected to $link After $seconds seconds.</div>";

	header("refresh:$seconds;url=$url");

	exit();
}
/*
**check items function v1 .0
**function to check item in database [function eccept parameters]
**$select = the item to select [Example:user,item,category]
**$from = the table to select from [Example:users,items,categories]
**$value = the value of select [Example:osama,box,Electronics]
*/
function checkitem($select, $from, $value)
{

	global $con;

	$statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

	$statement->execute(array($value));

	$count = $statement->num_rows();

	return $count;
}

function getItem($select, $from, $value)
{
	// return details form database
	global $con;

	$statement = $con->prepare("SELECT * FROM $from WHERE $select = $value");

	$statement->execute();

	return $statement->fetchAll();
}

/*
** count number of items function v1.0
**function to count number of items rows
**$item = the item to count
**$table = the table to choose from
*/
function countitems($item, $table)
{

	global $con;

	$stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");

	$stmt2->execute();

	return $stmt2->fetchColumn();
}
/*
**get latest function v1.0
**function to get items from database [users,items,comments]
**$select = field to select
**$table table to choose from
**$order= the desc ordering
**$limit =number of records to get
*/

function getlatest($select, $table, $order, $limit = 5)
{

	global $con;

	$getstmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");

	$getstmt->execute();

	$rows = $getstmt->fetchAll();

	return $rows;
}
