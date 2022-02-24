<?php
	require("header.html");
	require("dbconnect.php");
	if (isset($_REQUEST["send"])) {
		$task_title = $_REQUEST["task_title"];
		$task_desc = $_REQUEST["task_desc"];
		$sql = "INSERT INTO tasks (task_title, task_desc) VALUES ('$task_title', '$task_desc')";
		$sql_connect -> query($sql);
		$task_id = $sql_connect -> insert_id;
		$sql = "INSERT INTO user_tasks (user_id, task_id) VALUES ('".$_COOKIE["user_id"]."', '$task_id')";
		$sql_connect -> query($sql);
		header("Location: /WebApps/");
	}
?>
	<main>
		<form id="cr_task" class="task">
			<div class="mb-3">
				<label for="task_title" class="form-label">Название</label> 
				<input class="form-control" type="text" name="task_title" required>
			</div>	
			<div class="mb-3">
				<label for="task_desc" class="form-label">Описание</label> 
				<textarea oninput = "document.querySelector('input#id').value = this.value;" class="form-control task_desc-text" rows="10" name="task_desc" required></textarea>
			</div>
			<input class="btn btn-primary" type="submit" name="send" class="btn" value="Создать">
		</form>
	</main>
</body>
