<?php
declare(strict_types=1);

class IndexController {
    public function handle(Closure $success): void {
	$success();
    }
}
?>
