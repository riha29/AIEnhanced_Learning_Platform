<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');
use \Core\Session;

class Logout{
    use MainController;
    public function index()
    {
        $ses = new Session;
        $ses->logout();
        redirect('login');
    }

}