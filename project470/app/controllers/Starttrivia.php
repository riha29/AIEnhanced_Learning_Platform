<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');
use \Model\User;
use \Model\Relations;
use \Core\Session;


class Starttrivia{
    use MainController;
    public function index()
    {
        $id = user('id');
        $ses = new Session;
        if(!$ses->is_logged_in()){
            redirect('login');
        }
        
        $user = new User;
        $relation = new Relations;

        //returns data of current user
        $data['row']= $user->first(['id'=>$id]);
        $data1 = $data['row']->id;

        //showing all users
        $data['allrows'] = $user->findAll();
        //removing self profile from list of users
        $idx = 0;
        if($data['allrows']){
            foreach($data['allrows'] as $eachrow){
                $remove = null;
                if($data1 == $eachrow->id){
                    $remove = $idx;
                    array_splice($data['allrows'], $remove, 1);
                }
                $idx += 1;
            }

        }
        //picking random user
        $data['rando'] = $data['allrows'][array_rand($data['allrows'],1)];

        //showing all friends
        $data['friends'] = $relation->my_accepted_req($data1);
        $acc = $relation->other_accepted_req($data1);
        if($acc){
            foreach($acc as $a){ 
                $data['friends'][] = $a;
            }
        }

        $this->view('starttrivia', $data);
    }

}