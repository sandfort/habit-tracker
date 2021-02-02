<?php
declare(strict_types=1);
require_once("models/Task.php");

class ListController {
    private mysqli $db;
    
    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    public function handle(Closure $success, Closure $error): void {
        $result = $this->db->query('select name, date from task order by date desc;');

	if (!$result) {
	    $error($this->db->error);
	    return;
	}

        $tasks = [];
        
        while ($row = $result->fetch_row()) {
            $tasks[] = new Task($row[0], $row[1]);
        }

        $success($tasks);
    }
}
?>
