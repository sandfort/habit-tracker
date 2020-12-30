<?php
require_once("config.php");

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$result = mysqli_query($db, "insert into task (name, date) values (\"" . $_POST["task"] . "\", \"" . $_POST["date"] . "\");");

if ($result) {
    $rows = mysqli_query($db, "select date from task where name = \"" . $_POST["task"] . "\";");
} else {
    $error = mysqli_error($db);
}
?>

<!DOCTYPE html>
<html>
    <body>
	<?php if ($result) { ?>
	    Task: <?=$_POST["task"]?><br>
	    This task was performed on:
	    <ul>
		<?php while ($row = mysqli_fetch_row($rows)) { ?>
		    <li><?=$row[0]?></li>
		<?php } ?>
	    </ul>
	<?php } else { ?>
	    Failed: <?=$error?>
	<?php } ?>
	<a href="/index.php">back</a>
    </body>
</html>
