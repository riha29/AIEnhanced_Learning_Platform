<?php

namespace Model;
// $user = new \Model\User;

//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');

class Sections{
    use Model;

    protected $table = 'sections';
    protected $allowedColumns = [
 //eliminates columns that are not needed from post
        'id',
        'name',
        'course',
        'content',
        'priority',
    ];

}