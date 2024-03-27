<?php
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');


if($_SERVER['SERVER_NAME'] == 'localhost') {
    define ('DBNAME','project470');
    define ('DBHOST','localhost');
    define ('DBUSER','root');
    define ('DBPASS','');
    define ('DBDRIVER','');
    define ('ROOT', 'http://localhost/project470/public');
}
else {
    define ('DBNAME','my_db');
    define ('DBHOST','project470');
    define ('DBUSER','root');
    define ('DBPASS','');
    define ('DBDRIVER','');
    define ('ROOT', 'https://website.com');
}

define('APP_NAME', "My Website");
define('APP_DESC', "Yay");
define('DEBUG', true); //true will show errors