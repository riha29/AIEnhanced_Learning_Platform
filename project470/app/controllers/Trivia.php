<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');
use \Model\User;
use \Model\Questions;
use \Model\History;
use \Core\Session;


class Trivia{
    use MainController;
    public function index()
    {
        $id = user('id');
        $ses = new Session;
        if(!$ses->is_logged_in()){
            redirect('login');
        }
        
        $user = new User;
        $question = new Questions;
        $history = new History;

        //returns data of current user
        $data['row']= $user->first(['id'=>$id]);
        $data1 = $data['row']->id;

        //challenge user id
        $data['challenged'] = $_POST['challenge'] ?? null;

        // Fetch 5 random questions from the database
        $sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 5";
        $data['questions'] = $question->query($sql);

        $ans = $_POST ?? null;
        $correct = 0;
        
        if($ans['time']){
            foreach($ans as $key => $value){
                if ($key != 'time' && $key != 'challenged' ){
                    $ansrow = $question->first(['question_id'=>$key]);
                    if ($ansrow->answer == $value){
                        $correct += 1;
                    } 
                } else if($key != 'challenged'){
                    $time = $value;
                } else {
                    $challenged = $value;
                }

            }
            $final_score = $correct * 1000 - $time*5;
            {
                $arr1['player_one_id'] = $data1;
                $arr1['player_two_id'] = $challenged;
                $arr1['player_one_points'] = $final_score;
                $arr1['status'] = 'pending';
                $que = $history->insert($arr1);
    
                //query returns false when insertion is done
                if($que){
                    
                } else {
                    redirect('triviahistory');
                } 
            }
        }



        $this->view('trivia', $data);
    }

}