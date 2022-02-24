<?php
require("dbconnect.php");
if ( isset($_GET['user_login'])&&isset($_GET['user_pass']) ) {
	$user_login = $_GET['user_login'];
	$user_pass = $_GET['user_pass'];

	if (isset($_REQUEST["reg"])) {
		$sql = "SELECT user_login FROM users WHERE user_login = '$user_login'";
		$check = $sql_connect -> query($sql);
		if (mysqli_fetch_array($check) == null) {
			$sql = "INSERT INTO users (user_login, user_pass) VALUES ('$user_login', '$user_pass')";
			$sql_connect -> query($sql);
			$sqlid = "SELECT user_id FROM users WHERE user_login = '$user_login'";
			$user_id = $sql_connect -> query($sqlid);		

			setcookie("user_login", "".$user_login);
			setcookie("user_pass", "".$user_pass);
			setcookie("user_id", "".mysqli_fetch_array($user_id)[0]);
			header("Location: /WebApps/");
		} else { header("Location: /WebApps/"); }
	}	

	if (isset($_REQUEST["login"])) {
		$sqllogin = "SELECT user_login FROM users WHERE user_login = '$user_login'";
		$sqlpass = "SELECT user_pass FROM users WHERE user_login = '$user_login'";
		$sqlid = "SELECT user_id FROM users WHERE user_login = '$user_login'";		
		$bdlogin = $sql_connect -> query($sqllogin);
		$bdpass = $sql_connect -> query($sqlpass);
		$user_id = $sql_connect -> query($sqlid);		
		if ($sql_connect -> connect_errno) { echo $sql_coonect -> error; }

		if (mysqli_fetch_array($bdlogin) != null && mysqli_fetch_array($bdpass)[0]==$user_pass) {
			setcookie("user_login", "".$user_login);
			setcookie("user_pass", "".$user_pass);
			setcookie("user_id", "".mysqli_fetch_array($user_id)[0]);
			header("Location: /WebApps/");	
		} else { header("Location: /WebApps/"); }
	}
}
?>
<main>
	<form method="get" action="reg.php" class="log-form">
		<div class="mb-3">
			<label for="login" class="form-label">Логин</label>
			<input type="text" name="user_login" id="user_login" class="form-control" required>
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Пароль</label>
			<input type="password" name="user_pass" id="user_pass" class="form-control" required>
		</div>
		<input type="submit" value="Зарегестрироваться" class="btn btn-primary" name="reg">
		<input type="submit" value="Войти" class="btn btn-primary" name="login">
	</form>
</main>
