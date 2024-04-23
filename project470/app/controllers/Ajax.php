<?php
namespace Controller;
//put this line for any file you dont want access to directly
defined('ROOTPATH') OR exit('Access Denied!');
use \Core\Session;
use \Model\User;
use \Core\Request;
use \Model\Image;

class Ajax{
    use MainController;

    public function index()
    {

        $ses = new Session;
        if(!$ses->is_logged_in()){
            die;
        }

		$req = new Request;
		$user = new User();
		$info['success'] = false;
		$info['message'] = "";
        

		if($req->posted())
		{
			$data_type = $req->input('data_type');
			$info['data_type'] = $data_type;

			if($data_type == 'profile-image')
			{
				$image_row = $req->files('image');

				if($image_row['error'] == 0)
				{

					$folder = "uploads/";
					if(!file_exists($folder))
					{
						mkdir($folder,0777,true);
					}

					$destination = $folder . time() . $image_row['name'];
					move_uploaded_file($image_row['tmp_name'], $destination);

					$image_class = new Image;
					$image_class->resize($destination,1000);

					$id = user('id');
					$row = $user->first(['id'=>$id]);

					if(file_exists($row->image))
						unlink($row->image);

					$user->update($id, ['image'=>$destination]);
					$row->image = $destination;
					$ses->auth($row);

					$info['message'] = "Profile image changed successfully";
					$info['success'] = true;
				}
            }

            else if($data_type == 'profile-settings')
            {
                    
                $user_id = user('id');
                $username 	= $req->input('username');
                $email 	= $req->input('email');
                $age 	= $req->input('age');
                $country 	= $req->input('country');
                $password 	= $req->input('password');

                $user = new User;

                $row = $user->first(['id'=>$user_id]);

                if($row)
                {
                        
                        if($user->validate($req->post(), $user_id))
                        {

                            $arr = [];
                            $arr['username'] 	= $req->input('username');
                            $arr['email'] 		= $req->input('email');
                            $arr['age'] 		= $req->input('age');
                            $arr['country'] 		= $req->input('country');
                        

                            if(!empty($password))
                            $arr['password'] 		= password_hash($req->input('password'), PASSWORD_DEFAULT);
        
                        $user->update($user_id, $arr);

                        $info['message'] = "Profile edited successfully";
                        $info['success'] = true;
                        }else{
                        $info['message'] = "ERROR: " . implode(" & ", $user->errors);
                        $info['success'] = false;
                        }

                }
                
            }
    
            echo json_encode($info);
        }
    }
}
