<?php
declare(strict_types=1);

require_once("config.php");
require_once("controllers/LogController.php");

$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$ctrl = new LogController($db);

$success = function(string $task) {
    include("views/LogView.php");
};

$error = function(string $errorDescription) {
    include("views/ErrorView.php");
};

// handle the request
$ctrl->handle($_POST["task"], $_POST["date"], $success, $error);

?>

