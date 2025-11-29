<?php

use Core\Application;
use App\controllers\SiteController;
use App\controllers\RegisterController;

require_once __DIR__.'/../Making_Php_Framework/vendor/autoload.php';


$app = new Application(__DIR__);


$app->router->get('/', [SiteController::class, 'home']);
$app->router->post('/home', [SiteController::class, 'handleData' ]);

$app->router->get('/cadastro', [RegisterController::class, 'Get_register_user_page']);
$app->router->post('/cadastro', [RegisterController::class, 'Handle_register_user']);

$app->router->get('/cadastrar_aluno', [RegisterController::class, 'Get_register_NewStudent_page']);
$app->run();