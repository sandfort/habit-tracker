<?php
require_once("config.php");

$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$result = $db->query("select name, date from task;");
?>
<!DOCTYPE html>
<html>
    <body>
	<table>
	    <tr>
		<th>name</th>
		<th>date</th>
	    </tr>
	    <?php if ($result) { ?>
		<?php while ($row = $result->fetch_row()) { ?>
		    <tr>
			<td><?php echo $row[0] ?></td>
			<td><?php echo $row[1] ?></td>
		    </tr>
		<?php } ?>
	    <?php } else { ?>
		Failed: <?php echo $db->error(); ?>
	    <?php } ?>
	</table>
	<a href="/index.php">back</a>
    </body>
</html>
