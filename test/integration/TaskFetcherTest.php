<?php declare(strict_types=1);
require("lib/TaskFetcher.php");
use PHPUnit\Framework\TestCase;

class TaskFetcherTest extends TestCase {
    private static mysqli $db;

    public static function setUpBeforeClass(): void {
        self::$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }

    public function setUp(): void {
        self::$db->query('TRUNCATE TABLE task;');
    }
    
    public function testCanFetchAllTasks(): void {
        $tf = new TaskFetcher(self::$db);

        $tf->create(new Task('bingus', '2021-01-04'));
        $tf->create(new Task('bingus', '2021-01-05'));
        $tf->create(new Task('bingus', '2021-01-06'));

        $tasks = $tf->all();

        $this->assertSame(3, count($tasks));

        $this->assertSame('bingus', $tasks[0]->getName());
        $this->assertSame('bingus', $tasks[1]->getName());
        $this->assertSame('bingus', $tasks[2]->getName());

        $dates = array_map(fn(Task $t) => $t->getDate(), $tasks);

        $this->assertContains('2021-01-04', $dates);
        $this->assertContains('2021-01-05', $dates);
        $this->assertContains('2021-01-06', $dates);
    }
}
?>
