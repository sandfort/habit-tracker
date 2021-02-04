<!DOCTYPE html>
<html>
    <head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
	<table>
	    <tr>
		<th>name</th>
		<th>date</th>
	    </tr>
	    
	    <?php foreach ($taskLogs as $taskLog) { ?>
		<tr>
		    <td><?php echo $taskLog->getName() ?></td>
		    <td><?php echo $taskLog->getDate() ?></td>
		</tr>
	    <?php } ?>
	</table>
	<a href="/index.php">back</a>
    </body>
</html>
