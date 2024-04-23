<?php 

session_start();
//Valid PHP Version?
$minPHPVersion = '8.0';
if (phpversion() < $minPHPVersion){
    die("Your PHP version must be {$minPHPVersion} or higher");
}

//path to this file
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);

require "../app/core/init.php";

DEBUG ? ini_set('display_error',1) : ini_set('display_error',0);

$app = new App;
$app-> loadController();

