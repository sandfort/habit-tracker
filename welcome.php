<?php
require_once("config.php");

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$result = mysqli_query($db, "insert into task (name, date) values (\"" . $_POST["task"] . "\", \"" . $_POST["date"] . "\");");

if ($result) {
    $result = mysqli_query($db, "select date from task where name = \"" . $_POST["task"] . "\" order by date desc limit 1;");
    $row = mysqli_fetch_row($result);
    $last_date = $row[0];
} else {
    $error = mysqli_error($db);
}
?>

<!DOCTYPE html>
<html>
    <body>
	<?php if ($result) { ?>
	    Task: <?=$_POST["task"]?><br>
	    This task was last performed on: <?=$last_date?><br>
	<?php } else { ?>
	    Failed: <?=$error?>
	<?php } ?>
	<a href="/index.php">back</a>
    </body>
</html>
