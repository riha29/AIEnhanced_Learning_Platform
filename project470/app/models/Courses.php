<?php

namespace Model;
// $user = new \Model\User;

//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');

class Courses{
    use Model;

    protected $table = 'courses';
    protected $allowedColumns = [
 //eliminates columns that are not needed from post
        'id',
        'title',
        'description',
    ];

}