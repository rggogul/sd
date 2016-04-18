<?php
date_default_timezone_set('Asia/kolkata');
$TODAY_DATE=date("Y-m-d");
//date_default_timezone_set('America/Chicago');
$MOVEUP_FOLDER = "../";
$ROOT_FOLDER_RELATIVE_PATH="/sample";
$ROOT_FOLDER="http://gogul/sample/";
$CURRENTDATE=date("Y-m-d");


function getConnection()
{
	return mysql_connect("localhost","root","");
}

function getDB()
{
	$con = getConnection();
	if(!($con))
	{
		die("connection could not be made");
	}
	 mysql_select_db("sample_db",$con); // local DB 
	//mysql_select_db("anondb_0820",$con);  // online DB
}

function redirect($url)
{
	if(!(headers_sent()))
	{
		header('Location:'.$url);
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
	}
}

function selectit($a,$b)
{
	if($a==$b)
	{
		echo 'selected="selected"';
	}
	else
	{
		echo "";
	}
}


?>