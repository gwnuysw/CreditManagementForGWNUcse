<?php
	session_start();
	if(!isset($_SESSION['userid']))
	{
		header ('Location: ./login.html');
	} else {
		header ('Location: ./adminselect.html');
	}
?>