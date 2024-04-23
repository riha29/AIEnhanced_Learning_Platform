<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');
use \Model\User;
use \Model\Questions;
use \Model\History;
use \Core\Session;


class Triviaresponse{
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

        //challenge history id
        $data['history'] = $_POST['history'] ?? null;

        // Fetch a random question from the database
        $sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 5";
        $data['questions'] = $question->query($sql);

        $ans = $_POST ?? null;
        $correct = 0;
        
        if($ans['time']){
            foreach($ans as $key => $value){
                if ($key != 'time' && $key != 'history' ){
                    
                    $ansrow = $question->first(['question_id'=>$key]);
                    if ($ansrow->answer == $value){
                        $correct += 1;
                    } 
                } else if($key != 'history'){
                    $time = $value;
                } else {
                    $his_id = $value;
                }

            }
            
            $final_score = $correct * 1000 - $time*5;
            
            $que = $history->query("UPDATE history SET player_two_points = '$final_score', status = 'complete', datetime=NOW() WHERE history_id = '$his_id'");
            if (!$que){
                $info = $history->first(['history_id'=>$his_id]);
                show($info);
                if($info->player_one_points > $info->player_two_points){
                    $winner = $info->player_one_id;
                    $winpoint = $info->player_one_points;
                } else if($info->player_one_points < $info->player_two_points){
                    $winner = $info->player_two_id;
                    $winpoint = $info->player_two_points;
                } else {
                    $winner = 'Tie';
                    $winpoint = 0;
                }
                show($winner);
                $que2 = $history->query("UPDATE history SET winner='$winner', datetime=NOW() WHERE history_id = '$his_id'");
                $que3 = $user->query("UPDATE users SET score=score + '$winpoint' WHERE id = '$winner'");
                if (!$que2){
                    redirect('triviahistory');
                }

            }
        }



        $this->view('triviaresponse', $data);
    }

}