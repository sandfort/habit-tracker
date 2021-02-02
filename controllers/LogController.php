<?php
declare(strict_types=1);

class LogController {
    private mysqli $db;
    
    public function __construct(mysqli $db) {
	$this->db = $db;
    }
    
    public function handle(string $task, string $date, Closure $success, Closure $error): void {
	$query = "select date from task where name = \"$task\" order by date desc limit 1;";

	$result = $this->db->query($query);

	if (!$result) {
	    echo $this->db->error;
	    return();
	}

	$row = $result->fetch_row();
	$last_date = $row[0]; 

	$today = date("Y-m-d");

	if ($last_date == $today) {
	    $error("You've already completed this task on this date.");
	} else {
	    $result = $this->db->query("insert into task (name, date) values (\"$task\", \"$date\");");

	    if ($result) {
		$success($task);
	    } else {
		$error($this->db->error);
		return();
	    }
	}
    }
}
?>
