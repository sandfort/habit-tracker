<?php declare(strict_types=1);
require("lib/TaskFetcher.php");
class TaskFetcherTest extends \Codeception\Test\Unit {
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before() {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->db->query('TRUNCATE TABLE task;');
    }

    protected function _after() {
        $this->db->close();
    }

    // tests
    public function testAll() {
        $tf = new TaskFetcher($this->db);

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
