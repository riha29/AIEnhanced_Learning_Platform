<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');
use \Model\User;
use \Model\Relations;
use \Core\Session;


class Friends{
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

        $data['fstatus'] = [];
        $data['allrows'] = [];
        $data['sent_req'] = [];
        $data['received_req'] = [];
        $data['accepted_req'] = [];

        //search bar
		$arr = [];
		$arr['find'] = $_GET['find'] ?? null;
		if($arr['find'])
		{
			$arr['find'] = "%".$arr['find'] ."%";
			$data['allrows'] = $user->query("select * from users where username like :find || email like :find || country like :find",$arr);       
		}
        else {

            //showing all users if search bar has nothing
            $data['allrows'] = $user->findAll();  
        }

        //showing all sent requests
        $data['sent_req'] = $relation->sent_req($data1);

        //showing all received requests
        $data['received_req'] = $relation->received_req($data1);

        //showing all accepted requests, accepted by me and sent by me->accepted by others
        $data['accepted_req'] = $relation->my_accepted_req($data1);
        $acc = $relation->other_accepted_req($data1);
        if($acc){
            foreach($acc as $a){ 
                $data['accepted_req'][] = $a;
            }
        }


        //checking friendship status
        if($data['allrows']){
            foreach($data['allrows'] as $eachrow){
                
                $que = $relation->query("select * from relations where (sender_id = $data1 and receiver_id = $eachrow->id) || (receiver_id = $data1 and sender_id = $eachrow->id)");
                
                if($que){
                    if($que[0]->status == 'pending'){
                        $data['fstatus'][] = "pending";   
                    } else {
                        $data['fstatus'][] = "yes";
                    }
                } else {
                    
                    $data['fstatus'][] = "no";
                }
            }
        }

        //removing self profile from list of users
        $idx = 0;
        
        if($data['allrows']){
            foreach($data['allrows'] as $eachrow){
                $remove = null;
                if($data1 == $eachrow->id){
                    $remove = $idx;
                    array_splice($data['allrows'], $remove, 1);
                    array_splice($data['fstatus'], $remove, 1);
                }
                $idx += 1;
            }

        }
         
        //send friend request
        $id_send_req = $_GET['send_req'] ?? null;
		if($id_send_req != null)
		{
            $arr1['sender_id'] = $data1;
            $arr1['receiver_id'] = $id_send_req;
            $arr1['status'] = 'pending';
            $que = $relation->insert($arr1);

            //query returns false when insertion is done
            if($que){
                
            } else {
                redirect('friends');
            }
            
		}

        //accept friend request
        $id_accept_req = $_GET['accept_req'] ?? null;
		if($id_accept_req){
            $que = $relation->query('update relations set status = "friends" where sender_id = '.$id_accept_req.' and receiver_id = '.$data1);
            if($que){
                
            } else {
                redirect('friends');
            }
		}

        //reject friend request
        $id_reject_req = $_GET['reject_req'] ?? null;
        if($id_reject_req){
            $que = $relation->query('delete from relations where sender_id = '.$id_reject_req.' and receiver_id = '.$data1);
            if($que){
                
            } else {
                redirect('friends');
            }
        }


        $this->view('friends', $data);
    }

}