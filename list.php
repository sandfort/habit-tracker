<?php
require_once("config.php");

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$query = "select name, date from task;";

$result = mysqli_query($db, $query);
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
		<?php while ($row = mysqli_fetch_row($result)) { ?>
		    <tr>
			<td><?php echo $row[0] ?></td>
			<td><?php echo $row[1] ?></td>
		    </tr>
		<?php } ?>
	    <?php } else { ?>
		Failed: <?php echo mysqli_error($db); ?>
	    <?php } ?>
	</table>
    </body>
</html>
