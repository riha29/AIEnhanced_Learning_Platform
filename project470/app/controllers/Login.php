<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');
use \Model\User;
use \Core\Request;
use \Core\Session;

class Login{
    use MainController;
    public function index()
    {

        //echo "This is the login controller";
        $data = [];
        $req = new Request;
        
        if($req->posted()){
            $user = new User();
            $email = $req->post('email');
            $password = $req->post('password');
            $password = trim($password);
            if($row = $user->first(['email'=>$email])){
                if(password_verify($password, $row->password)){                
                    $ses = new Session;
                    $ses->auth($row);
                    redirect('home');
                } else {
                    show('false');
                }
                $user->errors['email'] = "Wrong email or password";
                
            }
            $data['errors'] = $user->errors;
        }
  
        $this->view('login', $data);
    }

}
