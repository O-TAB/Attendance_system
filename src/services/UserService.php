<?php

namespace App\services;

use Core\Controller;
use Core\Request;


use App\models\UserModel;
use App\repositories\UserRepository;

use Exception;

class UserService {
    
    public $userModel;


    public function register(array $post): string | null {
        try{
            $this->userModel = new UserModel($post);
            $this->userModel->set_repository(new UserRepository());
            $this->userModel->check();
            $this->userModel->verify();
            $this->userModel->save();
        }catch(Exception $e){
            return $e->getMessage();
        }

        return null;
    }

    public function get_usermodel(){
        return $this->userModel;
    }

    
        
    

}