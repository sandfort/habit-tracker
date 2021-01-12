<?php
require_once("config.php");

$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$result = $db->query("select date from task where name = \"" . $_POST["task"] . "\" order by date desc limit 1;");
$row = $result->fetch_row();
$last_date = $row[0];

$today = date("Y-m-d");

if ($last_date == $today) {
    $error = "You've already completed this task on this date.";
} else {
    $result = $db->query("insert into task (name, date) values (\"" . $_POST["task"] . "\", \"" . $_POST["date"] . "\");");

    if ($result) {	
	$gap = date_diff(date_parse($today), date_parse($last_date));
    } else {
	$error = $db->error();
    }
}
?>

<!DOCTYPE html>
<html>
    <body>
	<?php if ($error) { ?>
	    Failed: <?=$error?><br>
	<?php } else { ?>
	    Task: <?=$_POST["task"]?><br>
	    Last completed on: <?=$last_date?><br>
	    Gap: <?=$gap?> day(s)<br>
	<?php } ?>
	<a href="/index.php">back</a>
    </body>
</html>
