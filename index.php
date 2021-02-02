<?php
declare(strict_types=1);

require('controllers/IndexController.php');

$ctrl = new IndexController();

$success = function() {
    include('views/IndexView.php');
};

$ctrl->handle($success);

?>
