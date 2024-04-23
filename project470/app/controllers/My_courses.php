<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');
use \Model\User;
use \Model\Courses;
use \Core\Session;


class My_courses{
    use MainController;
    public function index()
    {
        $id = user('id');
        $ses = new Session;
        if(!$ses->is_logged_in()){
            redirect('login');
        }
        
        $user = new User;
        $course = new Courses;

        //returns data of current user
        $data['row']= $user->first(['id'=>$id]);
        $data1 = $data['row']->id;

        $data['course_list'] = [];
        if(($data['row']->course_list)!=null){
            $course_list = $data['row']->course_list;
            $courses_array = explode(", ", $course_list);
            foreach ($courses_array as $course_id){
                $data['course_list'][] = $course_id;
            }
        }

        //search bar
        $arr = [];
        $arr['find'] = $_GET['find'] ?? null;
        if($arr['find'])
        {
            $arr['find'] = "%".$arr['find'] ."%";
            $data['allrows'] = $course->query("select * from courses where title like :find || description like :find",$arr);       
        }
        else {

            //showing all users if search bar has nothing
            $data['allrows'] = $course->findAll();  
        }

        $removecourse = $_POST['remove_course'] ?? null;
        if($removecourse){
            if(($data['row']->course_list)!=null){
                $que1 = $user->query("UPDATE users SET course_list = REPLACE(course_list, ', $removecourse', '') WHERE id = '$data1'");
                $que2 = $user->query("UPDATE users SET course_list = REPLACE(course_list, '$removecourse, ', '') WHERE id = '$data1'");
                $que3 = $user->query("UPDATE users SET course_list = REPLACE(course_list, '$removecourse', '') WHERE id = '$data1'");
                redirect('my_courses'); 
            } 

        }
        
        $this->view('my_courses', $data);
    }

}