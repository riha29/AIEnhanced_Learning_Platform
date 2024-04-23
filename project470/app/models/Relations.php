<?php

namespace Model;
// $user = new \Model\User;

//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');

class Relations{
    use Model;

    protected $table = 'relations';
    protected $allowedColumns = [
 //eliminates columns that are not needed from post
        'sender_id',
        'receiver_id',
        'date',
        'status',
    ];

    //showing all sent requests
    public function sent_req($id){
        return $this->query("select * from relations inner join users on relations.receiver_id = users.id where sender_id=$id and status='pending' order by relations.date");
    }

    //showing all received requests
    public function received_req($id){
        return $this->query("select * from relations inner join users on relations.sender_id = users.id where receiver_id=$id and status='pending' order by relations.date");
    }

    //showing all accepted requests by me
    public function my_accepted_req($id){
        return $this->query("select * from relations inner join users on relations.sender_id = users.id where receiver_id=$id and status='friends' order by relations.date");
    }

    //showing all accepted requests by other
    public function other_accepted_req($id){
        return $this->query("select * from relations inner join users on relations.receiver_id = users.id where sender_id=$id and status='friends' order by relations.date");
    }



}