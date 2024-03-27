<?php 
namespace Controller;
#all functions common to all controllers will be here
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');

Trait MainController {
    
    public function view($name, $data = []){
    if(!empty($data)){
        extract($data);
    }
    $filename = "../app/views/".$name.".view.php";   #load the file which is at index 0 of url

    if(file_exists($filename)){
        require $filename;
    } else {
        $filename = "../app/views/404.view.php"; 
        require $filename;
    }
    }
}