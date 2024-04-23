<?php

namespace Model;
// $user = new \Model\User;

//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');

class User{
    use Model;

    protected $table = 'users';
    protected $allowedColumns = [
 //eliminates columns that are not needed from post
        'email',
        'password',
        'username',
        'age',
        'date',
        'image',
        'country',
    ];

    public function validate($data){
        $this->errors = [];
        if(empty($data['email'])){
            $this->errors['email'] = 'Email is required';
        } else {
            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $this->errors['email'] = 'Email is not valid';
            }
        }

        if(empty($data['email'])){
            $this->errors['email'] = 'Email is required';
        } else {
            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $this->errors['email'] = 'Email is not valid';
            }
        }

        if(empty($data['password'])){
            $this->errors['password'] = 'Password is required';
        }

        if(empty($data['username'])){
            $this->errors['username'] = 'Username is required';
        } else {
            if(!preg_match("/^[a-zA-Z]+$/", $data['username'])){
                $this->errors['username'] = "Username can only have letters with no spaces!";
            }
        }

        if(empty($data['age'])){
            $this->errors['age'] = 'Age is required';
        } 


        if(empty($this->errors)){
            return true;
        }
        return false;
    }

}