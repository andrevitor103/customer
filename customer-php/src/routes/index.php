<?php
namespace src\routes;

require_once './src/config.php';

use Slim\Factory\AppFactory;
use src\controller\ControllerTest;
use src\controller\CustomerCreateController;
use src\controller\CustomerDeleteById;
use src\controller\CustomerGetAll;
use src\controller\CustomerGetByIdController;
use src\controller\CustomerUpdateController;
use src\controller\middleware\JsonBodyParserMiddleware;

$app = AppFactory::createFromContainer($container);

$app->get('/', ControllerTest::class . ':sayHello');

$app->get('/customer', CustomerGetAll::class . ':execute');

$app->post('/customer', CustomerCreateController::class . ':execute')->add(new JsonBodyParserMiddleware());

$app->get('/customer/{id}', CustomerGetByIdController::class . ':execute');

$app->delete('/customer/{id}', CustomerDeleteById::class . ':execute');

$app->patch('/customer/{id}', CustomerUpdateController::class . ':execute')->add(new JsonBodyParserMiddleware());

$app->run();
