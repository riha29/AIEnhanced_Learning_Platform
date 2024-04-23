<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');
use \Model\User;
use \Core\Request;

class Signup{
    use MainController;
    public function index()
    {
        // echo "This is the signup controller";
        // show($_POST);
        $data = [];
        $req = new Request;
        if($req->posted()){
            $user = new User();
            if($user->validate($req->post())){
                //save to db
                $post_password = trim($req->post('password'));
                $password = password_hash($post_password, PASSWORD_DEFAULT);
                $req->set('password',$password);
                $user->insert($req->post());
                redirect('login');
            } 
            $data['errors'] = $user->errors;
            
        }

        
        $this->view('signup', $data);
    }


}