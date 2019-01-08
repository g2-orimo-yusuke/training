<?php

use classes\exception\pageNotFound;

define('ROOT_PATH', '/Applications/MAMP/htdocs/');
include_once(ROOT_PATH . 'autoLoad.php');

// mysqliの例外をスローさせるための記述
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// ホスト名-ローカルホスト
define('LOCAL_HOST', 'localhost');

$param = explode('/', $_GET['c']);
$func = '';
$view = '';

if (count($param) >= 2) {
    $func = $param[0];
    $view = $param[1];
} else {
    throw new pageNotFound();
}

try {
    $refClass = new ReflectionClass('controller\\' . $func . '\\' . $view);
    $controllerInstance = $refClass->newInstance();
    $controllerInstance->action();
} catch (Exception $e) {
    throw new Exception();
}


