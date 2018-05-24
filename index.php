<?php
include 'Controller.php';

$controller = new Controller;
$action = isset($_GET['action']) ? $_GET['action'] : "createGame";
$controller->$action();