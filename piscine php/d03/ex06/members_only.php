<?php
/*https://fr.wikipedia.org/wiki/Authentification_HTTP*/
/* http://www.hsc.fr/ressources/breves/http_digest.html.fr */
if ($_SERVER["PHP_AUTH_USER"] == "zaz" && $_SERVER["PHP_AUTH_PW"] == "jaimelespetitsponeys") {
	echo "<html><body>\n";
	echo "Bonjour Zaz<br/>\n";
	$mime_type = mime_content_type("../img/42.png"); /* image/png  */
	echo "<img src='data:image/png;base64," . base64_encode(file_get_contents("../img/42.png")) . "'>\n";
	echo "</body></html>\n";
} else
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
?>