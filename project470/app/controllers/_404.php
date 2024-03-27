<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');

class _404
{
    use MainController;
    public function index()
    {
        //echo "Error 404: Page not found";
        $this->view('404');
    }
}