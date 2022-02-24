<?php
	require("header.html");
	require("dbconnect.php");
	$sql = "SELECT * FROM tasks WHERE task_id=".$_REQUEST["task_id"];
	$task = mysqli_fetch_array($sql_connect -> query($sql));
	if (isset($_REQUEST["send"])) {
		$task_title = $_REQUEST["task_title"];
		$task_desc = $_REQUEST["task_desc"];
		$sql = "UPDATE tasks SET task_title='$task_title', task_desc='$task_desc' WHERE task_id=".$_REQUEST["task_id"];
		$sql_connect -> query($sql);
		header("Location: /WebApps/");
	}
?>
	<main>
		<form class="task">
		<input hidden type="text" value="<?php print($_REQUEST['task_id']) ?>" name="task_id">
			<div class="mb-3">
				<label for="task_title" class="form-label">Название</label> 
				<input value="<?php print($task['task_title']) ?>" class="form-control" type="text" name="task_title" required>
			</div>	
			<div class="mb-3">
				<label for="task_desc" class="form-label">Описание</label> 
				<textarea value="" oninput = "document.querySelector('input#id').value = this.value;" class="form-control task_desc-text" rows="10" name="task_desc" required><?php print($task['task_desc']) ?></textarea>
			</div>
			<input class="btn btn-primary" type="submit" name="send" class="btn" value="Создать">
		</form>
	</main>
</body>
