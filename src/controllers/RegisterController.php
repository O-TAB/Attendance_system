<?php

namespace App\controllers;

use Core\Controller;
use Core\Request;

use App\models\UserModel;

class RegisterController extends Controller{

    //@postmethod
    public function HandleNewSdudentData(Request $request){

        $data = [
            'telefone' => '94991239897'
        ];
        $params = [ 
            'userModel' => new UserModel($data)
        ];

        return $this->renderview('RegisterUser', 'AdmPainel', $params);
    }

}