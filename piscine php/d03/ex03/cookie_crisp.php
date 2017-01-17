<?php
if ($_GET['action'] == "set")
   setcookie($_GET['name'], $_GET['value'], time() + 3600 * 24 * 30);
else if ($_GET['action'] == "get")
{
	$cookieval = $_COOKIE[$_GET['name']];
	if ($cookieval)
	   echo $cookieval."\n";
}
else if ($_GET['action'] == "del")
	 setcookie($_GET['name'], "", time() - 5);
?>