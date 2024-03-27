<?php
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');

spl_autoload_register(function($classname){
    $classname = explode("\\", $classname);
    $classname = end($classname);
    require $filename = "../app/models/".ucfirst($classname).".php";
});

require 'config.php';
require 'functions.php';
require 'Database.php';  #capital because classes
require 'Model.php';
require 'Controller.php';
require 'App.php'; #run when everything else is loaded