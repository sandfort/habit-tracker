<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTaskTable extends AbstractMigration {

    public function up(): void {
        $this->execute('DROP TABLE IF EXISTS task;');
        
        $this->execute(<<<DDL
CREATE TABLE task (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(140) NOT NULL,
  date date NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY unique_index (name, date)
);
DDL
        );
    }

    public function down(): void {
        $this->execute('DROP TABLE IF EXISTS task;');
    }
}
