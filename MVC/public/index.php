<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../app/init.php';
require_once '../app/core/Config.php';
$req =  new Request();
// $lame = Request::getInstance() -> controller;
// echo $lame;
// $app = new App(Request::getInstance() -> controller, Request::getInstance() -> method, Request::getInstance() -> params);
$app = new App();
$app -> controllerCall();
