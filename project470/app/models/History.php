<?php

namespace Model;
// $user = new \Model\User;

//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');

class History{
    use Model;

    protected $table = 'history';
    protected $allowedColumns = [
 //eliminates columns that are not needed from post
        'history_id',
        'player_one_id',
        'player_two_id',
        'player_one_points',
        'player_two_points',
        'status',
        'winner',
    ];

}