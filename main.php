<?php 
	require("dbconnect.php");
	if (isset($_COOKIE['user_id'])) {}
	$sql = "SELECT task_id FROM user_tasks WHERE user_id = ".$_COOKIE['user_id'];	
	$task_ids = $sql_connect -> query($sql);	
?>

<main>
	<div class='main__box'> 
	<?php
	while($task_id = mysqli_fetch_array($task_ids)) {
		$sql = "SELECT * FROM tasks WHERE task_id=".$task_id['task_id'];
		$task = mysqli_fetch_array($sql_connect -> query($sql));
		$task_title = $task['task_title'];
		$task_desc = $task['task_desc'];
	?>
		<div class='task'>
			<p class='task__title'> <?php echo $task_title ?> </p>
			<p class='task_desc'> <?php  echo $task_desc ?> </p>
			<a class="task__button" href="update.php?task_id=<?php print($task_id['task_id']) ?>">Редактировать</a>
			<a class="task__button" href="delete.php?task_id=<?php print($task_id['task_id']) ?>">Удалить</a>
		</div>
	<?php } ?>
		<a class="button" href="create.php">Создать</a>
		<a class="button" href="quit.php">Выйти</a>
	</div>
</main>
