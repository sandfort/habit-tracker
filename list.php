<?php
declare(strict_types=1);
require_once("config.php");
require_once("controllers/ListController.php");

$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$ctrl = new ListController($db);

// $taskLogs: array of Task objects
$success = function($taskLogs) {
    include("views/ListView.php");
};

$error = function($errorDescription) {
    include("views/ErrorView.php");
};

$ctrl->handle($success, $error);

$result = $db->query("select name, date from task;");
?>
