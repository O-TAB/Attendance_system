<?php

namespace App\controllers;

use Core\Controller;
use Core\Request;

use App\models\UserModel;
use App\services\UserService;
use Exception;

class RegisterController extends Controller{

    //@getmethod
    public function Get_register_user_page(){
        return $this->renderview('RegisterUser', 'AdmPainel');
    }

    public function Handle_register_user(Request $request){

        $post = $request->getBody();
        $params = [];
        
        $userService = new UserService();

        $erro = $userService->prepare_to_register($post);
        $params['erro'] = $erro;
        
        if($erro === null){
            return $this->renderview('RegisterUser', 'AdmPainel');
        }
        
        $userModel = $userService->get_usermodel();
        $params['userModel'] = $userModel;
        return $this->renderview('RegisterUser', 'AdmPainel', $params);
    }

}