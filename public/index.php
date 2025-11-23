<?php

use Core\Application;
use App\controllers\SiteController;
use App\controllers\RegisterController;

require_once __DIR__.'/../Making_Php_Framework/vendor/autoload.php';


$app = new Application(__DIR__);


$app->router->get('/home', [SiteController::class, 'home']);
$app->router->post('/home', [SiteController::class, 'handleData' ]);

$app->router->get('/cadastro', [RegisterController::class, 'HandleNewSdudentData']);

$app->run();