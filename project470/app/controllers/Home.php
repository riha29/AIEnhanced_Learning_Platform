<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');
use \Core\Session;

class Home{
    use MainController;
    public function index()
    {
        // $user = new User;   instantiate specific models here
        // $result = $user->findAll();
        //echo "This is the home controller";
        $username = user('username');
        $ses = new Session;
        if(!$ses->is_logged_in()){
            redirect('login');
        }
        
        $data['username']= $username;
        
        $this->view('home', $data);
    }

}

