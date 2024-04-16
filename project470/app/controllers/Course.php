<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');
use \Model\User;
use \Model\Sections;
use \Core\Session;


class Course{
    use MainController;
    public function index()
    {
        $id = user('id');
        $ses = new Session;
        if(!$ses->is_logged_in()){
            redirect('login');
        }
        
        $user = new User;
        $section = new Sections;

        //returns data of current user
        $data['row']= $user->first(['id'=>$id]);
        $data1 = $data['row']->id;

        $getinfo = $_GET['viewcourse'] ?? null;
        $getinfo = explode('-',$getinfo);
        $course_id = $getinfo[0];
        $section_priority = $getinfo[1];
        if($course_id != null)
		{
            $data['allsections'] = $section -> query("select * from sections where course=$course_id order by priority");
		}
        if($section_priority != null)
		{
            $data['onesection'] = $section -> query("select * from sections where course=$course_id and priority=$section_priority");
		}


        
        $this->view('course', $data);
    }

}