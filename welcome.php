<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'webby');
define('DB_PASSWORD', 'honk');
define('DB_NAME', 'habit_tracker');

global $db;

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$query = "insert into task (name, date) values (\"" . $_POST["task"] . "\", \"" . $_POST["date"] . "\");";

global $result;
$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html>
    <body>
	<?php if ($result) { ?>
	    Inserted with ID: <?php echo mysqli_insert_id($db) ?>
	<?php } else { ?>
	    Failed: <?php echo mysqli_error($db) ?>
	<?php } ?>
    </body>
</html>
