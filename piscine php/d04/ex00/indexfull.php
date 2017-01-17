<?php
//session_id('id01');
session_start();
//affp($_SESSION['login']);
	$login = $_GET["login"];
	$passwd = $_GET["passwd"];
	$action = $_GET["action"];

	if (isset($_GET["login"]))
		$_SESSION['login'] = $login;
	if (isset($_GET["passwd"]))
		$_SESSION['passwd'] = $passwd;
	if (isset($_GET["action"]))
		$_SESSION['action'] = $action;

if ($action == "session_set")
{
	affp("set session");
	session_start();
}

if ($action == "session_inf")
{
	affp("info session");
	affp(session_name());
}

if ($action == "session_raz")
{
	affp("raz session");
	$_SESSION = array();
	unset($_SESSION);
	session_destroy();
}

if ($action == "cookie_set")
{
	setcookie('login', $login, time() + 3600 * 24 * 30);
	setcookie('passwd', $passwd, time() + 3600 * 24 * 30);
	affp("set cookie");
}

if ($action == "cookie_get")
{
	affh2("get cookie");
	affp("cookie : ".'login'." = ".$_COOKIE[$_GET['login']]);
	affp("cookie : ".'passwd'." = ".$_COOKIE[$_GET['passwd']]);
}


	echo "<html><body>\n";
    echo '<form action="index.php" method="get">';
    echo 'Identifiant: <input type="text" name="login" value="' . $_SESSION['login'] . '" />';
    echo "<br />\n";
    echo 'Mot de passe: <input type="password" name="passwd" value="' . $_SESSION['passwd'] . '" />';
    echo "<br />\n";
    echo 'Action: <input type="text" name="action" value="' . $_SESSION['action'] . '" />';
    echo "<br />\n";
    echo '<input type="submit" type="button" name="submit" value="OK"/>';
    echo "</form>\n";
    echo "</html></body>\n";




 function affp($var)
 {
 	echo "<p>".$var."</p>";
 }
  function affh2($var)
 {
 	echo "<h2>".$var."</h2>";
 }


/*
  	if ($login == "dlievre")
		aff("s : ".$_SESSION_NAME
			);*/  
?>