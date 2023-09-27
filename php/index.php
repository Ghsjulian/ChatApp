<?php
/*
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
*/
require_once 'database/__DB__.php';
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$DB = new __database__ ();
print_r($DB->__conn__);
?>