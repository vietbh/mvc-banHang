<?php

session_start();
require_once ('config.php');

spl_autoload_register(fn ($class) => require "controller/" . $class . ".php");

$baseDir = "/MVC-banHang/";

include 'router.php';

call_user_func( $action );


?>

