<?php
declare(strict_types=1);

class Task {
    private string $name;
    private string $date;
    
    public function __construct(string $name, string $date) {
        $this->name = $name;
        $this->date = $date;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDate(): string {
        return $this->date;
    }
}
?>
