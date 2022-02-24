<?php
require("dbconnect.php");
$id=$_REQUEST["task_id"];
$sql="DELETE FROM `tasks` WHERE `task_id`=".$id;
$sql_connect -> query($sql);
$sql="DELETE FROM `user_tasks` WHERE `task_id`=".$id;
$sql_connect -> query($sql);
header("Location: /WebApps/");
?>
