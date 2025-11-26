<?php

namespace App\services;

use Core\Controller;
use Core\Request;


use App\models\UserModel;
use App\repositories\UserRepository;

use Exception;

class UserService {
    
    public $userModel;

    public function prepare_to_register(array $post){
        try{
            $this->userModel = new UserModel($post);
        }catch(Exception $e){
            return $e;
        }
        $this->userModel->set_repository(new UserRepository());
        $this->userModel->check();
        $this->userModel->save();
        return null;
    }

    public function get_usermodel(){
        return $this->userModel;
    }

    
        
    

}