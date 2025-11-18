<?php

namespace App\controllers;

use Core\Controller;
use Core\Request;
use Core\Application;
use Core\Data;
use App\repositories\ClassRepository;
use App\repositories\ClassmatesRepository;


use App\models\ClassModel;


class SiteController extends Controller{
    public Application $app;

    public function home(){
        $data = new Data();
        $diasemana = $data->getDiaSemanaAtual();
        $data = $data->getDataString();
        
        $connection = Application::$DatabaseConnetion;
        
        $classmatesrepository = new ClassmatesRepository($connection);
        $classRepository = new ClassRepository($connection);
        $turmas = $classmatesrepository->findAllBy('dia_sem', $diasemana );
        $aulas = $classRepository->findAllby(        'data_', $data      );

        $aulas_turmas_ragistradas = array_column($aulas, 'id_turma');

        $params = [
            'turmas' => $turmas,
            'data' => $data,
            'ocorrencias' => $aulas_turmas_ragistradas
        ];
        
        return $this->renderview('today_class', 'AdmPainel', $params);
    }

    public function teste(){
        $connection = Application::$DatabaseConnetion;
        $instance = new ClassRepository($connection);
        
        $classmodel = new ClassModel($instance);
        var_dump($classmodel);

    }

    public function handleData(Request $request){

        $body = $request->getBody();

        var_dump($body);

    }
    
}