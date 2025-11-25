<?php

namespace App\controllers;

use Core\Controller;
use Core\Request;

use App\models\UserModel;

class RegisterController extends Controller{

    //@getmethod
    public function Get_register_user_page(){
        return $this->renderview('RegisterUser', 'AdmPainel');
    }

    public function Handle_register_user(Request $request){

        $post = $request->getBody();

        var_dump($post);
        // $data = [
        //     'telefone' => '94991239897'
        // ];

        // $userModel = new UserModel($data);
        // $params = [
        //     'telefone'=> $userModel->Getf_HTML('telefone')
        // ];

        return $this->renderview('RegisterUser', 'AdmPainel');
    }

}