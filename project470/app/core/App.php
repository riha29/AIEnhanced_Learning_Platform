<?php
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');

class App {

    private $controller = "Home";
    private $method = "index";

    private function splitURL(){
        $URL = $_GET['url'] ?? 'home'; #if it /sumthin doesn't exist, imagine somebody wrote home.php
        $URL = explode("/", trim($URL, "/"));
        return $URL;
    }

    public function loadController(){
        $URL = $this-> splitURL();
        $filename = "../app/controllers/".ucfirst($URL[0]).".php";   #load the file which is at index 0 of url

        //select controllers
        if(file_exists($filename)){
            require $filename;
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        } else {
            $filename = "../app/controllers/_404.php"; 
            require $filename;
            $this->controller = '_404';
        }

        $mycontroller = '\Controller\\'.$this->controller;
        $controller = new $mycontroller;  #home = new Home
        #call_user_func_array([$home, 'index'], []);

        //select methods
        if(!empty($URL[1])){
            if(method_exists($controller, $URL[1])){
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }
        
        call_user_func_array(array($controller, $this->method), $URL);
    } 


}
