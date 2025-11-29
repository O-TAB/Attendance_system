<?php

namespace App\controllers;

use Core\Controller;
use Core\Request;

use App\services\UserService;


class RegisterController extends Controller{

    //@getmethod
    public function Get_register_user_page(){
        return $this->renderview('RegisterUser', 'AdmPainel');
    }

    //@getmethod
    public function Get_register_NewStudent_page(){
        return $this->renderview('registerNewStudent', 'AdmPainel');
    }

    //@postmethod
    public function Handle_register_user(Request $request){

        $post = $request->getBody();
        $params = [];
        
        $userService = new UserService();

        $params['erro'] = $userService->register($post);
        
        if($params['erro'] === null){
            return $this->renderview('RegisterUser', 'AdmPainel');
        }
        
        $params['userModel'] = $userService->get_usermodel();

        return $this->renderview('RegisterUser', 'AdmPainel', $params);
    }

    //@postmethod
    public function Handle_register_NewStudent(Request $request){
        

    }

}