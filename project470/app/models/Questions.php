<?php

namespace Model;
// $user = new \Model\User;

//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');

class Questions{
    use Model;

    protected $table = 'questions';
    protected $allowedColumns = [
 //eliminates columns that are not needed from post
        'question_id',
        'category',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'answer',
        'question',
    ];

}