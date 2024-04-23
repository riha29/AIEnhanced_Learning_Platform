<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');
use \Model\User;
use \Core\Session;


class My_profile{
    use MainController;
    public function index()
    {
        $id = user('id');
        $ses = new Session;
        if(!$ses->is_logged_in()){
            redirect('login');
        }
        $user = new user;
        
        $data['row']= $user->first(['id'=>$id]);
        $this->view('my_profile', $data);
    }

}