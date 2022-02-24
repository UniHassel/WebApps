<?php
	setcookie ("user_login", "", time() - 3600);
	setcookie ("user_pass", "", time() - 3600);
	header("Location: /WebApps/");	
?>
