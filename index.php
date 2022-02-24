		<?php
		require("header.html");
		if (isset($_COOKIE["user_login"]) && isset($_COOKIE["user_pass"])) {
			require("main.php");
		} else {
			require("reg.php");
		}
		?>
	</body>
<html>
