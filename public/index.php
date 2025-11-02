<?php

use App\core\Application;
use App\controllers\SiteController;

require_once __DIR__.'/../Making_Php_Framework/vendor/autoload.php';


$app = new Application(__DIR__);


$app->router->get('/home', [SiteController::class, 'home']);
$app->router->post('/home', [SiteController::class, 'handleData' ]);

$app->run();