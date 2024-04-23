<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');
use \Model\User;
use \Model\History;
use \Core\Session;


class Triviahistory{
    use MainController;
    public function index()
    {
        $id = user('id');
        $ses = new Session;
        if(!$ses->is_logged_in()){
            redirect('login');
        }
        
        $user = new User;
        $history = new History;

        //returns data of current user
        $data['row']= $user->first(['id'=>$id]);
        $data1 = $data['row']->id;

        //return history of current user
        $data['history'] = $history->query("select winner, history_id, status, player_one_id, player_two_id, t2.username as uname_1, t3.username as uname_2 from history as t1 inner join users as t2 on t1.player_one_id = t2.id inner join users as t3 on t1.player_two_id = t3.id where player_one_id like $data1 || player_two_id like $data1 order by datetime DESC");
        $data['ranks'] = $user->query("select * from users order by score DESC");
        $this->view('triviahistory', $data);
    }

}