<?php declare(strict_types=1);
require("Task.php");

class TaskFetcher {
    private mysqli $db;
    
    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    public function all(): array {
        $result = $this->db->query('select name, date from task;');

        $tasks = [];
        
        while ($row = $result->fetch_row()) {
            $tasks[] = new Task($row[0], $row[1]);
        }

        return $tasks;
    }

    public function create(Task $task): void {
        $name = $task->getName();
        $date = $task->getDate();
        
        $result = $this->db->query("INSERT INTO task (name, date) VALUES (\"$name\", \"$date)\");");

        if (!$result) {
            $error = $this->db->error;
            throw new Exception("Create failed: $error");
        }
    }
}
?>
